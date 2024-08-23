<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastraPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:40',
            'description' => 'required|min:10|max:90',
            'content' => 'required|min:30',
            'image_post' => 'image|mimes:jpeg,png,jpg,svg',
        ];
    }
    public function messages(): array
    {
        return [
            'required.required' => 'Este campo é obrigatório',
            'required.min' => 'O campo título deve ter pelo menos :min caracteres',
            'required.max' => 'O campo título deve ter no maximo :max caracteres',
            'description.required' => 'O campo descrição é obrigatório',
            'description.min' => 'O campo descrição deve ter pelo menos :min caracteres',
            'description.max' => 'O campo descrição deve ter no maximo :max caracteres',
            'content.required' => 'O campo conteúdo é obrigatório',
            'content.min' => 'O campo conteúdo deve ter pelo menos :min caracteres',
            'image_post.image' => 'O campo imagem deve ser uma imagem',
            'image_post.mimes' => 'O campo imagem deve ser uma imagem',
        ];
    }
}
