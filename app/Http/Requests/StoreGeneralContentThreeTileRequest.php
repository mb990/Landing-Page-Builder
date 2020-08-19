<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreGeneralContentThreeTileRequest
 * @package App\Http\Requests
 */
class StoreGeneralContentThreeTileRequest extends FormRequest
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
            'title' => 'required',
            'text' => 'required',
            'general_content_three_settings_id' => 'required',
            'awesome_icon_id' => 'required',
        ];
    }
}
