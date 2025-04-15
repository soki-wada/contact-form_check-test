@extends('layouts.app')

@section('title')
管理画面
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('header__button')
<div class="header__button-wrapper">
    <a href="#" class="header__button">logout</a>
</div>
@endsection

@section('content')
<div class="admin__content">
    <div class="section__title">
        <h2>Admin</h2>
    </div>
    <form action="" class="search-form">
        @csrf
        <div class="search-form__wrapper">
            <div class="search-form__item">
                <input type="text" name="keyword" class="search-form__item-keyword" placeholder="名前やメールアドレスを入力してください">
                <select name="gender" class="search-form__item-gender">
                    <option value="" selected>性別</option>
                </select>
                <select name="category" class="search-form__item-category">
                    <option value="" selected>お問い合わせの種類</option>
                </select>
                <input type="date" class="search-form__item-date">
                <button class="search-form__button-submit">検索</button>
                <button class="search-form__button-reset">リセット</button>
            </div>
        </div>
    </form>
    <div class="search-form__sub-function">
        <button class="search-form__export">エクスポート</button>
        <div class="page">ページネーション</div>
    </div>
    <div class="search-form__table-wrapper">
        <table class="search-form__table">
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            <tr>
                <td>山田　太郎</td>
                <td>男性</td>
                <td>test@example.com</td>
                <td>商品の交換について</td>
                <td><button class="search-form__table-detail">詳細</button></td>
            </tr>
        </table>
    </div>
</div>
@endsection