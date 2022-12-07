<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResturantNearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ( Auth::guard("api")->id()) ? true  : false;
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

            "longitude" => "required" ,

            "area" => "required" ,

        ];
    }


    
    public function messages(){

        return [

            'required' => ":attribute is required !"
            
        ];
    }
}
