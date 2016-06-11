<?php

namespace App\Http\Requests\Frontend\Post;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'max:255',
            'image' => 'max:2048|mimes:jpeg,jpg,gif,png', //formats accepted and max file size:2Mb
        ];
    }
    
    public function authorize() {
        return true;
    }
}