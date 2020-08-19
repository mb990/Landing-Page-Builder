<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminNotificationRequest
 * @package App\Http\Requests
 */
class AdminNotificationRequest extends FormRequest
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
            'message' => 'required',
//            'image' => 'required|mimes:jpeg,jpg,png|max:100',
        ];
    }
}
