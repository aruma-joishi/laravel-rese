<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'date' => ['required','after:yesterday'],
            'time' => ['required'],
            'number' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '日にちを入力してください',
            'date.after' => '予約できない日時です',
            'time.required' => '時間を入力してください',
            'number.required' => '人数を入力してください',

        ];
    }
}
