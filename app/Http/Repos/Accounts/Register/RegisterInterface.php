<?php

namespace App\Http\Repos\Accounts\Register;

interface RegisterInterface
{

    public function store($request);

    public function location($address, $city, $country);

    public function account($filter);
}
