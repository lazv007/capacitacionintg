<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        return [ 
            'name'=>'required|min:7',
            'descripcion'=>'required|min:7|max:200',
            'category_id'=>'required|numeric|exist:pgsqk.categories,id',
            'resource'=>'required|array',
            'resource.*'=>'image' //valida cada contenidon del arreglog
        ];
    }
}
