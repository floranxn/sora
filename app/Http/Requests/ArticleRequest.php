<?php

namespace App\Http\Requests;

class ArticleRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        // CREATE ROLES
                        'title' => 'required|max:100|unique:articles',
                        'content' => 'required|max:10000',
                        'user_id' => 'required|integer',
                        'cate_id' => 'required|integer',
                    ];
                }
            // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    $id = $this->route('article');
                    return [
                        // UPDATE ROLES
                        'title' => 'filled|max:100|unique:articles,title,' . $id,
                        'content' => 'filled|max:10000',
                        'cate_id' => 'filled|integer',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [
                        //
                    ];
                }
        }
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
