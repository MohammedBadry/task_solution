<?php

namespace App\Http\Resources\Api\Accounts;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Customer */
class RegisterApiResource extends JsonResource
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
        return [
            'name' => $this->client_name,
            'address1' => $this->address1,
            'address12' => $this->address1,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'zipCode' => $this->zip,
            'phoneNo1' => $this->phone_no1,
            'phoneNo2' => $this->phone_no2,
            'user' => [
                'firstName' => $request->first_name,
                'lastName' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'passwordConfirmation' => $request->password_confirmation,
                'phone' => $request->phone,
            ],
        ];
    }
}
