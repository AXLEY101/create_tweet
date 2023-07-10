<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            //
            //'tweet' => 'required | max:140',
            'tweet' => ['required', 'max:140'],
        ];
    }
    //フォームリクエスト内で記述しているため、tweet()が呼び出される前にバリデーションされる。
    public function tweet(): string{
        //第一引数取得する名前、第二引数取得できない場合のデフォルトとして書くが、バリデーションで必須になってるので取得出来ない場合は想定していない。
        return $this->input('tweet');
    }
    
}
