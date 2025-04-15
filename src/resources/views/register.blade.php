@extends('layouts.app')

@section('title')
ユーザー登録
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('header__button')
<div class="header__button-wrapper">
    <a href="#" class="header__button">login</a>
</div>
@endsection

@section('content')
<div class="register__content">
    <div class="section__title">
        <h2>Register</h2>
    </div>
    <form action="" class="register-form">
        @csrf
        <div class="register-form__wrapper">
            <div class="register-form__items-group">
                <div class="register-form__item">
                    <h3>お名前</h3>
                    <input type="text" name="name" placeholder="例: 山田　太郎">
                </div>
                <div class="register-form__item">
                    <h3>メールアドレス</h3>
                    <input type="email" name="email" placeholder="例: test@example.com">
                </div>
                <div class="register-form__item">
                    <h3>パスワード</h3>
                    <input type="password" name="password" placeholder="例: coachtech1106">
                </div>
            </div>
            <div class="register-form__button">
                <button class="register-form__button-register" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection