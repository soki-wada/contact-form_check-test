@extends('layouts.app')

@section('title')
登録ページ
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="input__content">
    <div class="section__title">
        <h2>Contact</h2>
    </div>
    <form action="" class="create-form">
        @csrf
        <div class="create-form__table-wrapper">
            <table class="create-form__table">
                <tr>
                    <th>
                        お名前
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <div class="create-form__name">
                            <input type="text" name="first_name" class="create-form__name-first" placeholder="例: 山田">
                            <input type="text" name="last_name" class="create-form__name-last" placeholder="例: 太郎">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        性別
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <input type="radio" class="create-form__gender" name="gender" value="1" id="man" checked>
                        <label for="man" name="create-form__gender-label">男性</label>
                        <input type="radio" class="create-form__gender" name="gender" value="2" id="woman">
                        <label for="woman" name="create-form__gender-label">女性</label>
                        <input type="radio" class="create-form__gender" name="gender" value="3" id="others">
                        <label for="others" name="create-form__gender-label">その他</label>
                    </td>
                </tr>
                <tr>
                    <th>
                        メールアドレス
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <input type="email" name="email" class="create-form__email" placeholder="例: test@example.com">
                    </td>
                </tr>
                <tr>
                    <th>
                        電話番号
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <div class="create-form__tel">
                            <input type="tel" class="create-form__tel-item" name="tel1" placeholder="080">
                            <span class="create-form__tel-hyphen">-</span>
                            <input type="tel" class="create-form__tel-item" name="tel2" placeholder="1234">
                            <span class="create-form__tel-hyphen">-</span>
                            <input type="tel" class="create-form__tel-item" name="tel3" placeholder="5678">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        住所
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" class="create-form__address">
                    </td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>
                        <input type="text" name="building" class="create-form__building" placeholder="例: 千駄ヶ谷マンション101">
                    </td>
                </tr>
                <tr>
                    <th>
                        お問い合わせの種類
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <select name="category_id" class="create-form__category-select">
                            <option value="" selected style="color:#8b7969;">選択してください</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th style="vertical-align:top;">
                        お問い合わせ内容
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <textarea name="detail" class="create-form__detail" cols="40" rows="3" placeholder="お問い合わせ内容をご記載ください"></textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection