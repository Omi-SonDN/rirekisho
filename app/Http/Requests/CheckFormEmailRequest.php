<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckFormEmailRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'recipient' => 'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9+)*(\.[a-z]{2,4}){1,2}$/',
            'sender' => 'required',
            'subject' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'recipient.required' => 'Vui lòng nhập Email người nhận!',
            'recipient.regex' => 'Địa chỉ email không hợp lệ!',
            'sender.required' => 'Vui lòng nhập tên người gửi!',
            'subject.required' => 'Vui lòng nhập chủ đề mail!',
            'date.required' => 'Vui lòng nhập ngày hẹn!',
            'date.date' => 'Vui lòng nhập đúng định dạng Ngày/Tháng/Năm!',
            'time.required' => 'Vui lòng nhập giờ hẹn!',
            'address.required' => 'Vui lòng nhập địa chỉ công ty!',
        ];
    }
}
