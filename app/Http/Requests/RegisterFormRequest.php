<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $year_month_day = $this->input('old_year') . '-' . $this->input('old_month') . '-' . $this->input('old_day');
        $this->merge([
           'year_month_day' => $year_month_day
        ]);
    }

    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u|max:30',
            'under_name_kana' => 'required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u|max:30',
            'mail_address' => 'required|email|unique:users|max:100',
            'sex' => 'required|in: 1,2,3',
            'year_month_day' => 'after_or_equal:2000-01-01|before:today',
            'old_year' => 'required',
            'old_month' => 'required',
            'old_day' => 'required',
            'role' => 'required|in: 1,2,3,4',
            'password' => 'required|min:8|max:30|confirmed'
        ];
    }


}
