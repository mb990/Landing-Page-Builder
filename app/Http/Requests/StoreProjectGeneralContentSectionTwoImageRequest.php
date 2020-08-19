<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoreProjectGeneralContentSectionTwoImageRequest
 * @package App\Http\Requests
 */
class StoreProjectGeneralContentSectionTwoImageRequest extends FormRequest
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
            'image' => 'required|mimes:jpeg,jpg,png|max:150',
            'project_name' => 'required',
            'storing_path' => 'required',
            'image_name' => 'required',
            'imageable_type' => 'required',
            'imageable_id' => 'required',
        ];
    }
}
