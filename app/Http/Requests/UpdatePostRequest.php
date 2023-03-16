<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title'   => ['required', Rule::unique('posts')->ignore($this->post), 'max:150'],
            'content' => ['nullable'],
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è richiesto',
            'title.unique'   => 'E\' già presente un post con questo titolo',
            'title.max'      => 'Il titolo è troppo lungo',
            'type_id.exists' => 'Selezionare una Tipologia'

        ];
    }
}
