<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FoodPartyCreateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard("admin")->user()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [

            "beginDate" =>   "required" , 

            "endDate"   =>   "required" , 
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

            'required' => 'پر کردن این  فیلد الزامیست' ,
            
            ];
    }
}
