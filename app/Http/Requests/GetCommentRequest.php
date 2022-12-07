<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard("api")->id()) ? true  : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules = [];

        if(!$this->has("food_id") && !$this->has("resturant_id")){

            $rules["id_not_found"] ="required";

        }   

        if($this->has("food_id") && $this->has("resturant_id")){

            $rules["repeated_id"] ="required";

        }    

        return $rules;

    }


    
    public function messages(){

        return [

            'required' => "food_id or  resturant_id is required !" , 
            
        ];
    }
}
