<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateRequest extends Request
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
        $year = date('Y', strtotime("now"));
        return [
            'Month' => 'date_format:m|numeric|between:1,12',
            'Year' => "date_format:Y|numeric|min:1950|max:" . $year,
            'B_date' => "date|after:-60 year|before:now",
        ];
    }
}
