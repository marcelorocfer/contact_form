<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ContactRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required | email',
            'telefone' => 'required | min:14 | max:15',
            'mensagem' => 'required | max:255',
            'arquivo' => 'required | mimes:pdf,doc,docx,odt,txt,text/plain,application/octet-stream,application/vnd.openxmlformats-officedocument.wordprocessingml.document | max:500'
        ];
    }

    public function messages()
    {
        return [

            'nome.required' => 'O campo "Nome" é obrigatório.',
            'email.required' => 'O campo "E-mail" é obrigatório.',
            'telefone.required' => 'O campo "Telefone" é obrigatório.',
            'mensagem.required' => 'O campo "Sua Mensagem" é obrigatório.',
            'arquivo.required' => 'Você deve escolher um arquivo.',
            'telefone.min' => 'O campo "Telefone" deve ter pelo menos 10 caracteres.',
            'telefone.max' => 'O campo "Telefone" deve ter no máximo 11 caracteres.',
            'mensagem.max' => 'O campo "Sua Mensagem" deve ter no máximo 255 caracteres.',
            'arquivo.max' => 'O arquivo não pode ser maior que 500kb.',
            'arquivo.mimes' => 'O arquivo deve ser dos tipos "pdf, doc, docx, odt ou txt".'
        ];

    }
}
