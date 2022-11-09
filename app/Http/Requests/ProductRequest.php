<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {

    

        return [
            "name" => "required" ,
            
            "thumbnail" => "required|image|mimes:jpeg,jpg,png,webp" , 

            "price" => "required" ,

            "menu" =>  ($request->has("menu")) ? "required" : "" ,

            "food_category_id" => "required" ,

            "description" => "required"
        ];
    }
}
