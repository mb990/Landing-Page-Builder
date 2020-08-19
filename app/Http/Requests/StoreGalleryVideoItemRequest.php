<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreGalleryVideoItemRequest
 * @package App\Http\Requests
 */
class StoreGalleryVideoItemRequest extends FormRequest
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
//            mimes:x-flv,video/mp4,3gpp,quicktime,x-msvideo,x-ms-wmv
            'video' => 'required||max:10240',
            'gallery_settings_id' => 'required',
            'blade_file' => 'required',
            'video_name' => 'required',
            'template_name' => 'required',
            'storing_path' => 'required'
        ];
    }
}
