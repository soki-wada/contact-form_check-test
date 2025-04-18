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
                    @error('email')
                    <p style="color: red;">{{$errors->first('email')}}</p>
                    @enderror
                </div>
                <div class="register-form__item">
                    <h3>パスワード</h3>
                    <input type="password" name="password" placeholder="例: coachtech1106">
                    @error('password')
                    <p style="color: red;">{{$errors->first('password')}}</p>
                    @enderror
                </div>
            </div>
            <div class="register-form__button">
                <button class="register-form__button-register" type="submit">ログイン</button>
            </div>
        </div>
    </form>
</div>
@endsection