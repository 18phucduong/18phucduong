<?php

namespace App\Http\Requests\Client\Auth;

use App\Enums\MailTokenType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

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
                Rule::exists('email_tokens')
                    ->where(function ($query) {
                        return $query->where('type', MailTokenType::VERIFY);
                    })
            ],
        ];
    }
}
