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
    <form action="/confirm" class="create-form" method="post">
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
                            <input type="text" name="first_name" class="create-form__name-first" placeholder="例: 山田" value="{{old('first_name')}}">
                            <input type="text" name="last_name" class="create-form__name-last" placeholder="例: 太郎" value="{{old('last_name')}}">
                        </div>
                    </td>
                </tr>
                @error('first_name')
                <tr>
                    <th></th>
                    <td style=" color: red;">{{$errors->first('first_name')}}
                    </td>
                </tr>
                @enderror
                @error('last_name')
                <tr>
                    <th></th>
                    <td style="color: red;">{{$errors->first('last_name')}}</td>
                </tr>
                @enderror
                <tr>
                    <th>
                        性別
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <label for="man" name="create-form__gender-label">
                            <input type="radio" class="create-form__gender" name="gender" value="1" id="man" {{ old('gender', '1') == '1' ? 'checked' : '' }}>
                            <span class="create-form__gender-button"></span>男性
                        </label>
                        <label for="woman" name="create-form__gender-label">
                            <input type="radio" class="create-form__gender" name="gender" value="2" id="woman" {{ old('gender') == '2' ? 'checked' : '' }}>
                            <span class="create-form__gender-button"></span>女性
                        </label>
                        <label for="others" name="create-form__gender-label">
                            <input type="radio" class="create-form__gender" name="gender" value="3" id="others" {{ old('gender') == '3' ? 'checked' : '' }}>
                            <span class="create-form__gender-button"></span>その他
                        </label>
                    </td>
                </tr>
                @error('gender')
                <tr>
                    <th></th>
                    <td style="color: red;">{{$errors->first('gender')}}</td>
                </tr>
                @enderror
                <tr>
                    <th>
                        メールアドレス
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <input type="email" name="email" class="create-form__email" placeholder="例: test@example.com" value="{{old('email')}}">
                    </td>
                </tr>
                @error('email')
                <tr>
                    <th></th>
                    <td style="color: red;">{{$errors->first('email')}}</td>
                </tr>
                @enderror
                <tr>
                    <th>
                        電話番号
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <div class="create-form__tel">
                            <input type="tel" class="create-form__tel-item" name="tel1" placeholder="080" value="{{old('tel1')}}">
                            <span class="create-form__tel-hyphen">-</span>
                            <input type="tel" class="create-form__tel-item" name="tel2" placeholder="1234" value="{{old('tel2')}}">
                            <span class="create-form__tel-hyphen">-</span>
                            <input type="tel" class="create-form__tel-item" name="tel3" placeholder="5678" value="{{old('tel3')}}">
                        </div>
                    </td>
                </tr>
                @error('tel')
                <tr>
                    <th></th>
                    <td style="color: red;">{{$errors->first('tel')}}</td>
                </tr>
                @enderror
                <tr>
                    <th>
                        住所
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" class="create-form__address" value="{{old('address')}}">
                    </td>
                </tr>
                @error('address')
                <tr>
                    <th></th>
                    <td style="color: red;">{{$errors->first('address')}}</td>
                </tr>
                @enderror
                <tr>
                    <th>建物名</th>
                    <td>
                        <input type="text" name="building" class="create-form__building" placeholder="例: 千駄ヶ谷マンション101" value="{{old('building')}}">
                    </td>
                </tr>
                <tr>
                    <th>
                        お問い合わせの種類
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <div class="create-form__select-wrapper">
                            <select name="category_id" class="create-form__category-select" value="{{old('category_id')}}">
                                <option value="" selected style="color:#8b7969;">選択してください</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->content}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                @error('category_id')
                <tr>
                    <th></th>
                    <td style="color: red;">{{$errors->first('category_id')}}</td>
                </tr>
                @enderror
                <tr>
                    <th style="vertical-align:top;">
                        お問い合わせ内容
                        <span class="create-form__table-asterisk">※</span>
                    </th>
                    <td>
                        <textarea name="detail" class="create-form__detail" cols="40" rows="3" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
                    </td>
                </tr>
                @error('detail')
                <tr>
                    <th></th>
                    <td style="color: red;">{{$errors->first('detail')}}</td>
                </tr>
                @enderror
            </table>
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection