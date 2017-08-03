<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CreateUser extends FormRequest
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
        if ($this->method() == 'PUT') //Update
        {
            return [
                'username'  => 'required|string|max:50|unique:users',
                'email'     => 'required|string|email|max:60|unique:users,id,'. $this->get('id_user'),
                'password'  => 'required|string|min:6|confirmed',
            ];
        }
        else{
            return [
                'username'  => 'required|string|max:50|unique:users',
                'email'     => 'required|string|email|max:60|unique:users',
                'password'  => 'required|string|min:6|confirmed',
            ];
        }
        //dd($this->all());


        /*return [
            'username'  => 'required|string|max:50',
            'email'     => 'required|string|email|max:60|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ];*/

    }

    /*public function rules(array $data)
    {
        return Validator::make($data, [
            'username_new' => 'required|string|max:255',
            'email_new' => 'required|string|email|max:255|unique:users',
            'password_new' => 'required|string|min:6|confirmed',
        ]);
    }*/
}
