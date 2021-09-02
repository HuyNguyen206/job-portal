<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SendJobToFriendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'email' => [
                Rule::requiredIf(!Auth::check()),
                ],
            'name' =>  Rule::requiredIf(!Auth::check()),
            'emailPerson' => 'required|email',
            'namePerson' => 'required'
        ];
    }
}
