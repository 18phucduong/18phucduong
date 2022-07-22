<?php

namespace App\Http\Requests\Client\Auth;

use App\Enums\MailTokenType;
use App\Http\Requests\BaseRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'token' => [
                'required',
                Rule::exists('email_token')->where(function ($query) {
                    return $query->where('type', '=', MailTokenType::RESET_PASSWORD->value);
                })
            ],
            'password' => 'required|min:8|max32'
        ];
    }
}
