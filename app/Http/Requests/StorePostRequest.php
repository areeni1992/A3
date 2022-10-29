<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'image'     => ($this->method() == "POST" ? 'required|' : '') . 'mimes:jpeg,png,jpg,gif',
            'category_id' => 'required'
        ];
        foreach (config('translatable.locales') as $lang)
        {
            $data[$lang.'*.title']   = 'nullable|string';
            $data[$lang.'*.body']    = 'nullable|string';
            $data[$lang.'*.slug']    = 'nullable|string';
        }

        return $data;
    }
}
