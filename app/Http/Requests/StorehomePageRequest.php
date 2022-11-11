<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorehomePageRequest extends FormRequest
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
//            'image' => 'nullable|mimes:jpeg,png,jpg,gif,doc,pdf,docx,zip',
            'catalog'   => 'nullable|mimes:jpeg,png,jpg,gif,doc,pdf,docx,zip',
//            'image'   => 'nullable|mimes:jpeg,png,jpg,gif,doc,pdf,docx,zip',
            'cat_ids' => 'nullable',
            'page_ids' => 'nullable',
        ];
        foreach($this->request->get('cat_ids') as $val)
        {
            $data['cat_ids.'.$val] = 'nullable';
        }
        foreach($this->request->get('page_ids') as $val)
        {
            if($this->method() == "POST")
            {
                $data['page_ids.'.$val] = 'nullable';
            }
        }
        foreach (config('translatable.locales') as $lang)
        {
            $data[$lang.'*.slider_title']           = 'nullable|string';
            $data[$lang.'*.slider_text']            = 'nullable|string';
            $data[$lang.'*.first_banner_text']      = 'nullable|string';
            $data[$lang.'*.second_banner_text']     = 'nullable|string';
            $data[$lang.'*.third_banner_title']     = 'nullable|string';
            $data[$lang.'*.third_banner_text']      = 'nullable|string';
            $data[$lang.'*.fourth_banner_title']    = 'nullable|string';
            $data[$lang.'*.fourth_banner_text']     = 'nullable|string';
            $data[$lang.'*.catalog_text']           = 'nullable|string';
        }

        return $data;
    }
}
