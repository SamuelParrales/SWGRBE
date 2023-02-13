<?php

namespace App\Http\Requests\rest\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:50',
            'description' => 'nullable|max:255',
            'category_id' => 'required|exists:categories,id',
            'cell_phone_num' => 'required|digits:10',
            'has_whatsapp' =>'required|boolean',
            'images'=>'required|array|min:1|max:4',
            'images.*' =>'mimes:jpg,jpeg,png,bmp',


        ];
    }

    public function attributes()
    {
        return [
            'category_id' => __('validation.category'),
            'cell_phone_num' =>strtolower(__('Cell phone number')),
            'images' =>strtolower(__('Images')),
            'images.*' =>strtolower(__('Images')),
        ];
    }



}
