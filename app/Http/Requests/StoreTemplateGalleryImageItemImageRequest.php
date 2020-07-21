<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateGalleryImageItemImageRequest extends FormRequest
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
            'image' => 'required|mimes:jpeg,jpg,png|max:100',
            'template_name' => 'required',
            'storing_path' => 'required',
            'image_name' => 'required',
            'imageable_type' => 'required',
            'imageable_id' => 'required',
        ];
    }
}
