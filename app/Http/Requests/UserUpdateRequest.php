<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'full_name' => 'required',
            'number' => 'required|unique:users,number,'. $this->id,
            'role' =>'in:admin,student|required',
            'email' => 'required|email|unique:users,email,'. $this->id,
            'password' => 'sometimes|required',
            'expire' => 'required_if:role,==,student',
        ];
    }
}
