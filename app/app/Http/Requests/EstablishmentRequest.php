<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Data\EstablishmentData;

class EstablishmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ajuste conforme necessário para a lógica de autorização
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ];
    }

     /**
     * Map the request data to the EstablishmentData class.
     */
    public function toEstablishmentData(): EstablishmentData
    {
        return new EstablishmentData(
            $this->input('name'),
            $this->input('address')
        );
    }
}