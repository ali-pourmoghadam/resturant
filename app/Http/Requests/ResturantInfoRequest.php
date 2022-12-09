<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResturantInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard("manager")->id()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            
            "latitude" => "required" ,

            "longtitude" => "required" ,

            "thumbnail" => "image|mimes:jpg,jpeg,png,webp" ,

            "phone_number" => "required" , 

            "address" => "required"
        ];
    }
}
