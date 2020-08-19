<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoreTemplateGeneralContentThreeBulletPointRequest
 * @package App\Http\Requests
 */
class StoreTemplateGeneralContentThreeBulletPointRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check() && auth()->user()->hasRole('admin')) {

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
            'title' => 'required',
            'text' => 'required',
            'general_content_three_settings_id' => 'required',
        ];
    }
}
