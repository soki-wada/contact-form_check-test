@extends('layouts.app')

@section('title')
入力の確認
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="section__title">
        <h2>Confirm</h2>
    </div>
    <div class="confirm-form__table-wrapper">
        <table class="confirm-form__table">
            <tr>
                <th>お名前</th>
                <td>{{$contact['first_name']}}　{{$contact['last_name']}}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if($contact['gender'] == 1)
                    男性
                    @elseif($contact['gender'] == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{$contact['email']}}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{$contact['tel1'] . $contact['tel2'] . $contact['tel3']}}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{$contact['address']}}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{$contact['building']}}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{$contact['category_content']}}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{{$contact['detail']}}</td>
            </tr>
        </table>
    </div>
    <div class="confirm-form__buttons">
        <form action="/contact" class="confirm-form" method="post">
            @csrf
            @foreach($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="confirm-form__button">
                <button class="confirm-form__button-submit" type="submit">送信</button>
            </div>
        </form>
        <form action="/contact/fix" method="post">
            @csrf
            @foreach($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="confirm-form__button">
                <button class="confirm-form__button-fix" type="submit">修正</button>
            </div>
        </form>
    </div>
</div>
@endsection