<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudyRequest extends FormRequest
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
            'description' => 'required|string',
            'date_init'   => 'required|date',
            'date_finish' => 'required|date',
            'area_id'     => 'required|int',
            'status'       => ['required',
                Rule::in(['Finalizado', 'Em andamento', 'Em atraso'])],
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'O campo Descrição é obrigatório',
            'date_init.required' => 'O campo Data Inicial é obrigatório',
            'date_finish.required' => 'O campo Data Final é obrigatório',
            'status.required' => 'O Campo Situação é obrigatório',
            'area.required' => 'O campo Área é obrigatório'
        ];
    }
}
