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
            'answers' => 'required|array|min:3',
            'answers.*.name' => 'required',
            'answers.*.solution' => 'in:Po,Jo|required',
            'answers.*.question_id' =>  'required|exists:tng_question,id',
            'answers.*.id' =>  'required|exists:tng_answer,id'
        ];
    }
}
