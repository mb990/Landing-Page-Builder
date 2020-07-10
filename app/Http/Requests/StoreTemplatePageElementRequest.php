<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplatePageElementRequest extends FormRequest
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
            'page_element_type_id' => 'required',
            'page_elementable_id' => 'required',
            'page_elementable_type' => 'required',
            'template_id' => 'required',
            'blade_file' => 'required'
        ];
    }
}
