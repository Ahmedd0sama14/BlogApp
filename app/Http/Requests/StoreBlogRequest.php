<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Blog Title',
            'content' => 'Blog Content',
            'category_id' => 'Category',
            'image' => 'Blog Image',
        ];
    }
}
