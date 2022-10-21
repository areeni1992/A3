<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'parent_id' => 'required',
            'image' => ($this->method() == "POST" ? 'required|' : '') . 'mimes:jpeg,png,jpg,gif'
        ];
        foreach (config('translatable.locales') as $lang )
        {
            $data[$lang.'*.name'] = 'required|string';
            $data[$lang.'*.slug'] = 'string';
            $data[$lang.'*.desc'] = 'string';
        }
        return $data;
    }
}
