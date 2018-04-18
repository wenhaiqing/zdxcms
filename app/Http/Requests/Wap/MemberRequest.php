<?php

namespace App\Http\Requests\Wap;

class MemberRequest extends Request
{
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
                    'mobile' => 'required|regex:/^1[3456789]\d{9}$/|unique:members',
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
