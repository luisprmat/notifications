<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'body' => 'required|min:5',
            'recipient_id' => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'recipient_id.required' => 'Debes seleccionar a quien enviar el mensaje',
            'recipient_id.exists' => 'Este usuario no existe',
        ];
    }
}
