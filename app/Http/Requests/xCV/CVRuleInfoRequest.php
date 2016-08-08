<?php

namespace App\Http\Requests\xCV;

use App\Http\Requests\Request;

class CVRuleInfoRequest extends Request
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
            'LastName' => 'required',
            'Firstname' => 'required',
            'rdGender' => 'required',
            'txtDate' => 'required',
            'txtPhone' => 'required|min:10',
            'txtAddress' => 'required',
            'txtContact' => 'required',
            'txtname' => 'required',
        ];
    }

    public function messages(){
        return [
            'LastName.required' => 'Vui lòng nhập họ',
            'Firstname.required' => 'Vui lòng nhập tên',
            'txtDate.required' => 'Vui lòng nhập ngày tháng năm sinh',
            'txtPhone.required' => 'Vui lòng nhập số điện thoại',
            'txtPhone.min' => 'Số điện thoại tối thiểu 11 số',
            'txtAddress.required' => 'Vui lòng nhập địa chỉ liên hệ',
            'txtContact.required' => 'Vui lòng điền thông tin liên hệ',
            'txtname.required' => 'Vui lòng điền thông tin ví trí mong muốn',
        ];
    }
}
