<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;


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

    

      /**
     * Create Custom Messages.
     *
     * @return array<string, mixed>
     */


    public function messages()
    {
        return [

            'required' => 'پر کردن :attribute الزامیست' ,

            'email' => 'فیل حتما باید از نوع ایمیل باشد',

            'unique' => 'در حال حاضر وجود دارد :attribute',

            'string' => 'فیلد حتما باید از نوع رشته باشد' ,

            'min' => 'تعداد کرکترهای :attribute   باید:min  باشد' ,

            'regex' => 'پسورد حداقل باید شامل یک حرف بزرگ ,کوچک ,عدد وکرکتر خاص باشد'
            
            ];
    }


    protected function failedValidation(Validator $validator)
    {

        if ($this->ajax()){
        
            throw new HttpResponseException(response()->json($validator->errors(),419));
            
        }
        
        throw (new ValidationException($validator))
                         ->errorBag($this->errorBag)
                         ->redirectTo($this->getRedirectUrl());
        
    }



    
}
