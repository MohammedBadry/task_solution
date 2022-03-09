<?php

namespace App\Http\Resources\Api\Accounts;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

/** @mixin \App\Models\Customer */
class AccountApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @throws \Laracasts\Presenter\Exceptions\PresenterException
     * @return array
     */
    public function toArray($request)
    {
        $all_users = User::get()->count();
        $active_users = User::where('status', 'Active')->get()->count();
        $inactive_users = User::where('status', 'Inactive')->get()->count();

        return [
            'id' => $this->id,
            'name' => $this->client_name,
            'address1' => $this->address1,
            'address12' => $this->address1,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'zipCode' => $this->zip,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'phoneNo1' => $this->phone_no1,
            'phoneNo2' => $this->phone_no2,
            'totalUser' => [
                "all" => $all_users,
                "active" => $active_users,
                "inactive" => $inactive_users,
            ],
            'startValidity' => $this->start_validity,
            'endValidity' => $this->end_validity,
            'status' => $this->status,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
