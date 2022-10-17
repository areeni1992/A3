<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'facebook'          => 'required',
            'twitter'           => 'required',
            'instagram'         => 'required',
            'linkedin'          => 'required',
            'google'            => 'required',
            'telephone'         => 'required',
            'email'             => 'required',
            'whatsapp'          => 'required',
            'quotationtitle'    => 'required',
            'quotationtext'     => 'required',
            'logo'              => ($this->method() == "POST" ? 'required|' : '') . 'mimes:jpeg,png,jpg,gif',
        ];
    }
}
