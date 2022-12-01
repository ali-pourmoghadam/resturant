<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard("api")->id() || Auth::guard("manager")->id()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            "message" => "required|max:200" ,

            "order_id" => "required" ,

            "score" => ["integer" ,  Rule::when(!is_null(Auth::guard("api")->id())  , ["required"])] ,

            "reply_to" => "integer"
        ];
    }


       /**
     * Create Custom Messages.
     *
     * @return array<string, mixed>
     */


    public function messages()
    {
        return [

            'required' => ':attribute is required !' ,

            'integer' => ':attribute shoud be integer number !'
            
            ];
    }
}
