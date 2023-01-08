<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookChangeRequest extends FormRequest
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
            'id' => 'required|integer',
            'date' => 'required|date_format:Y-m-d|after:today',
            'time' => 'required|date_format:H:i',
            'number' => 'required|integer|max:9',
        ];
    }

    public function messages()
    {
        return [
            'date.after' => '予約日には明日以降の日付を指定してください。',
            'date.date_format' => '予約時間は0000-00-00の形式で指定してください。',
            'time.date_format' => '予約時間は00:00の形式で指定してください。',
        ];
    }
}
