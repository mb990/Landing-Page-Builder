<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoreProjectGalleryVideoItemRequest
 * @package App\Http\Requests
 */
class StoreProjectGalleryVideoItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {

            return true;
        }

        return false;
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
            'project_name' => 'required',
            'storing_path' => 'required'
        ];
    }
}
