<?php

namespace App\Http\Requests\Api\Accounts;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Api\Accounts\WithHashedPassword;

class RegisterRequest extends FormRequest
{
    use WithHashedPassword;

    /**
     * Determine if the supervisor is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_name' => 'required|string|max:100',
            'address1' => 'required|string',
            'address2' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'phone_no1' => 'required|unique:clients,phone_no1',
            'phone_no2' => 'sometimes|unique:clients,phone_no1',
            'zip' => 'required',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:4', 'confirmed'],
            'phone' => 'required|unique:users,phone',
        ];
    }
}
