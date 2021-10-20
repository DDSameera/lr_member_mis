<?php

namespace App\Http\Requests;

use App\Http\Traits\SendResponseTrait;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class MemberRequest extends FormRequest
{

    use SendResponseTrait;
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
     * @return array
     */
    public function rules()
    {

        //General Validation
        $rules =  [
            'firstName' => 'required | string | max:255',
            'lastName' => 'required | string | max:255',
            'dob' => 'required | string | max:255 | date_format:Y-m-d',
            'gender' => 'required | in:male,female',
            'contactNo' => 'required| string | max:10'
        ];

        //POST Based Validation
        if ($this->getMethod() == 'POST') {
            $rules +=  ['email' => 'required|email|unique:users,email'];
            $rules +=  ['password' => 'required| string | min:8 | confirmed'];
        }

        //PATCH Based Validation
        if ($this->getMethod() == 'PATCH') {
            $userId = $this->request->get('userId');

            $password = $this->request->get('password');

            if(empty($password)){
                $rules +=   [
                    'email' => [
                        'required',
                        'email',
                        Rule::unique('users')->ignore(User::find($userId))
                    ]
                ];
            }else{
                $rules +=  ['password' => 'required| string | min:8 | confirmed'];
            }




        }
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {

        $messages = $validator->errors()->toArray();
       return  SendResponseTrait::validationErrors($messages,422);

    }
}
