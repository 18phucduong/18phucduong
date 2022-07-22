<?php

namespace App\Http\Requests\Client\Auth;
use App\Http\Requests\BaseRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ForgotPasswordRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                Rule::exists('users')->where(function ($query) {
                    return $query->where('email_verified_at', '<>', null);
                }),
            ]
        ];
    }
}
