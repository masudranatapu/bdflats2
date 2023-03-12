<?php

namespace App\Http\Requests\Web;
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
            'title'         => 'required|min:3',
            'body'          => 'required',
            'category'      => 'required',
         ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Please enter article title !',
            'body.required'         => 'Please enter article body !',
            'category.required'     => 'Please enter article category !',
        ];
    }
}
