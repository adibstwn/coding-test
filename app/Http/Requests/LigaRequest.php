<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LigaRequest extends FormRequest
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
            'home_club' => ['required', 'different:away_club'],
            'away_club' => ['required'],
            'scoreClub0' => 'required|numeric|min:0',
            'scoreClub1' => 'required|numeric|min:0'
        ];
    }
}
