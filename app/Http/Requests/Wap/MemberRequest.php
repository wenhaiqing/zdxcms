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
//                    'mobile' => 'required|regex:/^1[3456789]\d{9}$/|unique:members',
                    'mobile' => 'required|regex:/^1[3456789]\d{9}$/',
                    'password' => 'required|string|min:6',
                    'cardnum'=>'required|identitycards',

                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'mobile' => 'required|regex:/^1[3456789]\d{9}$/|unique:members,mobile,'.$this->member->id,
                    'cardnum'=>'required|identitycards',

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
            'cardnum.required'=>'身份证号不能为空',
            'record.required'=>'学历不能为空',
            'nation.required'=>'民族不能为空',
        ];
    }
}
