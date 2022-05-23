<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassStoreRequest extends FormRequest
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
            "name" => ["nullable", "min:3"],
            "teacher_name" => ["nullable"],
            "class_number" => ["nullable"],
            "class_letter" => ["nullable"],
            "student_name" => ["nullable"],
        ];
    }
}
