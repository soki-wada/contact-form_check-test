<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $tel = implode('', [
            $this->input('tel1'),
            $this->input('tel2'),
            $this->input('tel3'),
        ]);

        $this->merge([
            'tel' => $tel,
        ]);
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $tel1 = $this->input('tel1');
            $tel2 = $this->input('tel2');
            $tel3 = $this->input('tel3');

            if (!($this->filled('tel1') && $this->filled('tel2') && $this->filled('tel3'))) {
                $validator->errors()->add('tel', '電話番号を入力してください');
            }

            // 正規表現チェック（各パート1〜5桁の半角数字）
            $pattern = '/^\d{1,5}$/';
            if (!preg_match($pattern, $tel1) || !preg_match($pattern, $tel2) || !preg_match($pattern, $tel3)) {
                $validator->errors()->add('tel', '電話番号は5桁までの数字で入力してください');
            }
        });
    }

    public function rules()
    {
        return [
            //
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email:strict,dns',
            'tel' => 'required',
            'address' => 'required',
            'category_id' => 'required',
            'detail' => 'required|max:120'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください'
        ];
    }
}
