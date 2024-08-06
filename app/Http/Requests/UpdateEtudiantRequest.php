<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEtudiantRequest extends FormRequest
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
            'nom' => ['sometimes', 'string', 'max:255'],
            'prenom' => ['sometimes', 'string', 'max:255'],
            'adresse' => ['sometimes', 'string', 'max:255'],
            'telephone' => ['sometimes', 'string', 'max:20', 'min:9', 'unique:etudiants'],
            'date_naissance' => ['sometimes', 'date'],
            'matricule' => ['sometimes', 'string', 'max:255', 'unique:etudiants'],
            'mot_de_passe' => ['string', 'max:255'],
            'photo' => ['max:2048','sometimes','mimes:jpg,jpeg,png'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'errors'      => $validator->errors()
        ], 422));
    }
}
