<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $id = $this->id;
        
        $rules = [
            'name'     => 'required',
            'phone'    => 'required|numeric|min:10',
            'address'  => 'required',
            'email'    => 'required|email|unique:admins,email,'.$this->id,
            'status'     => 'required',
            'role'     => 'required',
        ];

        if(empty($id))
        {
            $rules['password']    = 'required|same:re-password|min:8';
        }
        else
        {
            $rules['password'] = 'required|min:8';
        }
        return $rules;
    }

     public function messages()
    {
        return [
            'name.required'        => 'Please enter name of staff',
            'phone.required'       => 'Please enter phone of staff',
            'phone.numeric'        => 'Phone must be numeric',
            'phone.min'            => 'Invalid phone format',
            'address.required'     => 'Please enter address of staff',
            'email.required'       => 'Please enter email of staff',
            'email.email'          => 'Invalid phone format',
            'email.unique'         => 'This email has been used for another account',
            'status.required'      => 'Please select status for staff',
            'role.required'        => 'Please select role for staff',
            'password.required'    => 'Please enter password',
            'password.min'         => 'Password must be at least 6 characters long',
            'password.same'        => 'Password does not match, check confirm password again',
           
        ];
    }

}
