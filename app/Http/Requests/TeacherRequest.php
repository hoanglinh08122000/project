<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'name' => 'required|name',
            'email' => 'required|email|unique:email',
            'date' => 'required|date',
            'phone' => 'required|phone',
            'password' => 'required|password',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng điền :attribute',
            'email' => 'Vui lòng điền :attribute',
            'date' => 'Vui lòng điền :attribute',
            'phone' => 'Vui lòng điền :attribute',
            'password' => 'Vui lòng điền :attribute',
            'name' => 'Vui lòng điền đầy đủ :attribute',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'tên',
            'email' => 'email',
            'date' => 'ngày sinh',
            'password' => 'mật khẩu',
            'phone' => 'số điện thoại',
        ];
    }
}
