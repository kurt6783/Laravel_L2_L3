<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
                    'title' =>  'required|min:2',
                    'body'  =>  'required|min:3',
                    'category_id'  =>  'required|numeric',  
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            // Validation messages
            'title.min' =>  '標題必須至少兩格字符',
            'body.min'  =>  '文章內容必須至少三個字符',
        ];
    }
}
