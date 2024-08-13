<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonaRequest extends FormRequest
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
            'category_nPerCodigo' => [
                'required',
                'exists:categories,id'
            ],
            'cPerApellido' => 'required|string|max:50',
            'cPerNombre' => 'required|string|max:50',
            'cPerDireccion' => 'required|string|max:100',
            'dPerFecNac' => 'required|date',
            'nPerEdad' => 'required|integer|min:0',
            'cPerSexo' => 'nullable|string|max:50',
            'nPerSueldo' => 'required|numeric|min:0',
            'cPerRnd' => 'required|string|max:50',
            'nPerEstado' => 'required|string|size:1',

            'image' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],

        ];
    }
    public function messages(): array
    {
        return [
            'category_nPerCodigo.required' => 'Seleccione una categoria para el servicio',
            'cPerApellido.required' => 'El apellido es obligatorio.',
            'cPerNombre.required' => 'El nombre es obligatorio.',
            'cPerDireccion.required' => 'La dirección es obligatoria.',
            'dPerFecNac.required' => 'La fecha de nacimiento es obligatoria.',
            'dPerFecNac.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'nPerEdad.required' => 'La edad es obligatoria.',
            'nPerEdad.integer' => 'La edad debe ser un número entero.',
            'cPerSexo.string' => 'El sexo debe ser una cadena de texto.',
            'nPerSueldo.required' => 'El sueldo es obligatorio.',
            'nPerSueldo.numeric' => 'El sueldo debe ser un número.',
            'cPerRnd.required' => 'El campo cPerRnd es obligatorio.',
            'nPerEstado.required' => 'El estado es obligatorio.',
            'nPerEstado.string' => 'El estado debe ser una cadena de texto.',
            'nPerEstado.size' => 'El estado debe ser un solo carácter.',
            'image.required' => 'La imagen es obligatoria.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg.',
        ];
    }

}
