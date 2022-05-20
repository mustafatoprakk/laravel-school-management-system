<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required"],
            "surname" => ["required"],
            "email" => ["required", "email"],
            "class" => ["required"],
            "number" => ["required"],
            "birth_date" => ["required", "date"],
            "password" => ["required", "min:4"],
            "confirm_password" => ["required", "same:password"],
        ];
    }
}
