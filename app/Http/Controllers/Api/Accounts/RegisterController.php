<?php

namespace App\Http\Controllers\Api\Accounts;

use Illuminate\Routing\Controller;
use App\Http\Requests\Api\Accounts\RegisterRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Repos\Accounts\Register\RegisterInterface;
use App\Http\Filters\Accounts\ClientFilter;

class RegisterController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    protected $registerInterface;

    public function __construct(RegisterInterface $registerInterface)
    {
        $this->registerInterface = $registerInterface;
    }

    public function register(RegisterRequest $request)
    {
        return $this->registerInterface->store($request);
    }

    public function account(ClientFilter $filter)
    {
        return $this->registerInterface->account($filter);
    }
}
