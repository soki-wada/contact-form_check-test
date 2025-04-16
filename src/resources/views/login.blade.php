@extends('layouts.app')

@section('title')
ユーザー登録
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('header__button')
<div class="header__button-wrapper">
    <a href="/register" class="header__button">register</a>
</div>
@endsection

@section('content')
@if ($errors->any())
<div class="error-messages">
    <ul>
        @foreach ($errors->all() as $error)
        <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="register__content">
    <div class="section__title">
        <h2>Login</h2>
    </div>
    <form action="/login" class="register-form" method="post">
        @csrf
        <div class="register-form__wrapper">
            <div class="register-form__items-group">
                <div class="register-form__item">
                    <h3>メールアドレス</h3>
                    <input type="email" name="email" value="{{old('email')}}" placeholder="例: test@example.com">
                </div>
                <div class="register-form__item">
                    <h3>パスワード</h3>
                    <input type="password" name="password" placeholder="例: coachtech1106">
                </div>
            </div>
            <div class="register-form__button">
                <button class="register-form__button-register" type="submit">ログイン</button>
            </div>
        </div>
    </form>
</div>
@endsection