<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
            'title' => 'required|min:10',
            'description' => 'required',
            'category_id' => 'required',
            'position' => 'required',
            'address' => 'required',
            'roles' => 'required',
            'type' => 'required',
            'status' => 'required',
            'last_date' => 'required',
            'gender' => 'required',
            'year_of_experience' => 'required',
            'salary' => 'required',
            'number_of_vacancy' => 'required'
        ];
    }
}
