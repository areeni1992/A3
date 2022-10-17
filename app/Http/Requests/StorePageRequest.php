<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
        $data = [
            'status'=> 'required',
            'image' => ($this->method() == "POST" ? 'required|' : '') . 'mimes:jpeg,png,jpg,gif',
        ];
        foreach (config('translatable.locales') as $lang )
        {
            $data[$lang.'*.title'] = 'required|string';
            $data[$lang.'*.content'] = 'string';
            $data[$lang.'*.slug'] = 'string';
            $data[$lang.'*.shortdesc'] = 'string';
        }
        return $data;
    }
}
