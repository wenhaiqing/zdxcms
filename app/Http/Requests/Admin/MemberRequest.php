<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class MemberRequest extends FormRequest
{

    public function authorize()
    {
        // Using policy for Authorization
        return true;
    }
    public function rules()
    {

        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    'name' => 'required',
                    'mobile' => 'required|regex:/^1[3456789]\d{9}$/|unique:members',
                    'age'=>'required|numeric:age',
                    'password' => 'required|string|min:6',
                    'cardnum'=>'required|identitycards',
                    'record'=>'required|string',
                    'nation'=>'required|string'
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'mobile' => 'required|regex:/^1[3456789]\d{9}$/|unique:members,mobile,'.$this->member->id,
                    'age'=>'required|numeric',
                    'cardnum'=>'required|identitycards',
                    'record'=>'required|string',
                    'nation'=>'required|string'
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
