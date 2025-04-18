@extends('layouts.app')

@section('title')
管理画面
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('header__button')
@if(Auth::check())
<form action="{{route('logout')}}" class="header-form" method="post">
    @csrf
    <div class="header__button-wrapper">
        <button class="header__button">logout</button>
    </div>
</form>
@endif
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
        <div class="page">{{$contacts->links()}}</div>
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
            @foreach($contacts as $contact)
            <tr>
                <td>{{$contact['first_name']}}　{{$contact['last_name']}}</td>
                <td>
                    @if($contact['gender'] == 1)
                    男性
                    @elseif($contact['gender'] == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
                <td>{{$contact['email']}}</td>
                <td>{{$contact['category']['content']}}</td>
                <td><button class="search-form__table-detail">詳細</button></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection