<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ManagerSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard("manager")->user()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            "email" => "required|email" , 

            "name" => "required|string|min:2" , 

            "last_name" => "required|string",

            "address" => "required|string" ,

            "national_id" => "required|size:5" ,

            "phone_number" => "required|size:5" ,

            "thumbnail" => "required|image|mimes:jpg,jpeg,png,webp"

        ];
    }

}
