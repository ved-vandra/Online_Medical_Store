<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\product;
use App\Models\images;
use invalidInputException;
use Illuminate\Validation\Rule;

class productrequest extends FormRequest
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
        // dd($this->images);
        return [
            'sku' => [
                        'required' , 
                        Rule::unique('product','sku')->ignore( $this->id ,'pid' )
                        // 'unique:product,sku',
                    ],
            'price' => 'required',
            'quan' => 'required',
            'stock' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,jpeg',

        ];
    }
    public function messages()
    {
        return[
            'sku.required' => 'sku is required!',
            'sku.unique' => 'sku should be different',
            'price.required' => 'price is required!',
            'quan.required' => 'quantity is required!',
            'stock.required' => 'stock is required!',
            'images.required' => 'image is required',
            'images.*mimes' => 'proper file',

        ];
    }
}
