<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class ResturantCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return[

            'email'=> 'required|email|unique:managers,email',

            'first_name' => 'required|string|min:2',

            'type' => 'required|string' ,

            'city' => 'required|string' ,

            'password' => 'required|min:8|regex:/([A-Za-z].*)([#?!@$%^&*-].*)([0-9].*)/' ,


            
        ];
    }

 
}
