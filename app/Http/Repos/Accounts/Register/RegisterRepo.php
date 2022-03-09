<?php

namespace App\Http\Repos\Accounts\Register;

use App\Http\Repos\Accounts\Register\RegisterInterface;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Resources\Api\Accounts\AccountApiResource;
use App\Http\Resources\Api\Accounts\RegisterApiResource;
use Illuminate\Support\Facades\Redis;
use DB;

class RegisterRepo implements RegisterInterface
{

    public function store($request)
    {
        //check the location in redis cache
        $cachedlocation = Redis::get('location_'.$request->address.$request->city.$request->country);
        if(isset($cachedlocation)) {
            //If exists get it from redis
            $location = json_decode($cachedlocation, true);
            $request['latitude'] = $location['lat'];
            $request['longitude'] = $location['lng'];
        } else {
            $location = $this->location($request->address, $request->city, $request->country);
            $result = json_decode($location['body'], true);
            $cords = $result['results'][0]['geometry']['location'];
            if ($location['status'] == 200) {
                $request['latitude'] = $cords['lat'];
                $request['longitude'] = $cords['lng'];
                //Save the location in redis cache
                Redis::set('location_'.$request->address.$request->city.$request->country, json_encode(['lat' => $cords['lat'], 'lng' => $cords['lng']]));
            } else {
                return response()->json([
                    'error' => true,
                    'data' => [],
                    'message' => "Address is invalid",
                ], 422);
            }
        }
        DB::beginTransaction();
            $request['client_name'] = $request->client_name;
            $start_validity = Carbon::now();
            $end_validity = Carbon::now()->addDays(15);
            $request['start_validity'] = $start_validity;
            $request['end_validity'] = $end_validity;
            $client = Client::create($request->all());
            $request['client_id'] = $client->id;
            $user = User::create($request->allWithHashedPassword());
        DB::commit();

        return new RegisterApiResource($client);

    }

    public function location($address, $city, $country)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . ',' . $city . ',' . $country . '&key=AIzaSyCk_JwMqI1Gszq_p6HNmDasTlcm18dwd-Y');

        return [
            'status' => $response->getStatusCode(),
            'body' => $response->getBody()->getContents()
        ];
    }

    public function account($filter)
    {
        $clients = Client::filter($filter)->paginate(10);

        return AccountApiResource::collection($clients);
    }
}
