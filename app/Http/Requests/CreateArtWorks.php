<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArtWorks extends FormRequest
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
            'n_inv'         => 'required|string|max:10',
            'titulo'        => 'required|string|max:100',
            'tecnica'       => 'nullable|string|max:200',
            'dimension'     => 'nullable|string|max:200',
            'ano'           => 'nullable|string|max:20',
            'edicion'       => 'nullable|string|max:200',
            'procedencia'   => 'nullable|string|max:100',
            'catalogo'      => 'nullable|string|max:200',
            'certificacion' => 'nullable|string|max:100',
            'valoracion'    => 'nullable|string|max:100',
            'foto1'         => 'nullable|image|mimes:jpeg,bmp,png,jpg|max:5120',
        ];
    }
}