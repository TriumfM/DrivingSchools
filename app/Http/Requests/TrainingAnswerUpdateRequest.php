<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingAnswerUpdateRequest extends FormRequest
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

            '*.name' => 'required',
            '*.solution' => 'required',
            '*.question_id' =>  'required|exists:tng_question,id',
            '*.id' =>  'required|exists:tng_answer,id'
        ];
    }
}
