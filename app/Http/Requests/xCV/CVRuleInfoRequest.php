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
            'txtDate' => 'required|after:-60 year|before:-18 year',
            'txtPhone' => ['required' ,'regex:/^\(\+84\)[0-9]{2,3}[-]\d{3}[-]\d{4}$/'],
            'txtAddress' => 'required',
            'txtContact' => 'required',
            'txtname' => 'required',
            'txtApply_to' => 'required|not_in:0',
        ];
    }

    public function messages(){
        return [
            'LastName.required' => 'Vui lòng nhập họ',
            'Firstname.required' => 'Vui lòng nhập tên',
            'txtDate.required' => 'Vui lòng nhập ngày tháng năm sinh',
            'txtDate.after' => 'Bạn đã đến lúc nghỉ hưu theo chế độ',
            'txtDate.before' => 'Bạn chưa đủ 18 tuổi đi làm việc',
            'txtPhone.required' => 'Vui lòng nhập số điện thoại',
            'txtPhone.regex' => 'Vui nhập đúng định dạng số điện thoại',
            'txtAddress.required' => 'Vui lòng nhập địa chỉ liên hệ',
            'txtContact.required' => 'Vui lòng điền thông tin liên hệ',
            'txtname.required' => 'Vui lòng điền thông tin ví trí mong muốn',
            'txtApply_to.required' => 'Vui lòng chọn ví trí ứng tuyển',
            'txtApply_to.not_in' => 'Vui lòng chọn ví trí tuyển dụng'
        ];
    }
}
