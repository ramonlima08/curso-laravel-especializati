<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        //SEGMENTO DA URL, CADA "/" É UM SEGMENTO
        //ISSO É PARA CONSEGUIR EDITAR O NAME SEM TRAVAR POR CAUSA DO UNIQUE
        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'required|min:3|max:10000',
            'image' => 'nullable|image',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O Campo nome é obrigatório',
            'description.min' => 'O Campo descrião deve contar no minimo 3 caracteres',
            'image.image' => 'O campo foto deve ser anexado uma imagem',
            'image.required' => 'O campo foto é obrigatório'
        ];
    }
}
