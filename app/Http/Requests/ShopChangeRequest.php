<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopChangeRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'area_id' => 'required|integer|exists:areas,id',
            'genre_id' => 'required|integer|exists:genres,id',
            'outline' => 'required|string|max:512',
            'image' => 'max:8000|mimes:jpg,jpeg,png,gif'
        ];
    }
}
