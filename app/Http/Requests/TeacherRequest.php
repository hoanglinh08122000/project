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
            'first_name' =>  'required|regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i',
            'last_name'  =>  'required|regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i',
            'email' => 'required|email',
            'date' => 'required|date',
            'phone' => 'required|numeric|regex:[0[0-9]{9}$]',
            'password' => 'required|min:8',
            'address' => 'required',
            'gender' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng điền :attribute',
            'email.email' => 'Vui lòng nhập đúng định dạng email (...@gmail.com)',
            'date' => 'Vui lòng điền :attribute',
            'phone' => 'Vui lòng điền :attribute',
            'phone.numeric' => ':attribute phải được điền bằng số',
            'phone.regex' => ':attribute phải có 10 chữ số, bắt đầu từ số 0',
            'password.min' => ':attribute tối thiểu phải có 8 ký tự',
            'last_name.regex' => ':attribute phải điền bằng chữ cái',
            'first_name.regex' => ':attribute phải điền bằng chữ cái',
        ];
    }
    public function attributes()
    {
        return [
            'first_name' => 'Họ',
            'last_name' => 'Tên',
            'email' => 'Email',
            'date' => 'Ngày sinh',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
        ];
    }
}
