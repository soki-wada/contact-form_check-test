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
        <button class="header__button" type="submit">logout</button>
    </div>
</form>
@endif
@endsection

@section('content')
<div class="admin__content">
    <div class="section__title">
        <h2>Admin</h2>
    </div>
    <form action="/admin/search" class="search-form" method="get">
        @csrf
        <div class="search-form__wrapper">
            <div class="search-form__item">
                <input type="text" name="keyword" class="search-form__item-keyword" placeholder="名前やメールアドレスを入力してください" value="{{old('keyword')}}">
                <select name="gender" class="search-form__item-gender">
                    <option value="" selected>性別</option>
                    <option value="" @if(old('gender')==='' ) selected @endif>全て</option>
                    <option value="1" @if(old('gender')==1) selected @endif>男性</option>
                    <option value="2" @if(old('gender')==2) selected @endif>女性</option>
                    <option value="3" @if(old('gender')==3) selected @endif>その他</option>
                </select>
                <select name="category_id" class="search-form__item-category">
                    <option value="" selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}" @if($category->id == old('category_id')) selected @endif>{{$category['content']}}</option>
                    @endforeach
                </select>
                <input type="date" class="search-form__item-date" name="date" value="{{old('date')}}">
                <button type="submit" class="search-form__button-submit">検索</button>
                <button class="search-form__button-reset" name="reset" type="submit">リセット</button>
            </div>
        </div>
    </form>
    <div class="search-form__sub-function">
        <form action="/admin/export" method="get">
            @csrf
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <input type="hidden" name="gender" value="{{ request('gender') }}">
            <input type="hidden" name="category_id" value="{{ request('category_id') }}">
            <input type="hidden" name="date" value="{{ request('date') }}">
            <button class="search-form__export" type="submit">エクスポート</button>
        </form>
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
                <td>
                    <label class="search-form__table-detail" for="check__modal">詳細</label>
                    <input type="checkbox" id="check__modal" class="check__modal" hidden>
                    <div class="modal">
                        <div class="modal__content">
                            <div class="close__button-wrapper">
                                <label for="check__modal" class="close__button">&times;</label>
                            </div>
                            <div class="modal__table-wrapper">
                                <table class="modal__table">
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
                                        <td>{{$contact['tel']}}</td>
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
                                        <td>{{$contact['category']['content']}}</td>
                                    </tr>
                                    <tr>
                                        <th>お問い合わせ内容</th>
                                        <td>{{$contact['detail']}}</td>
                                    </tr>
                                </table>
                            </div>
                            <form action="/admin/delete" class="modal-form" method="post">
                                @method('delete')
                                @csrf
                                <div class="modal-form__button-wrapper">
                                    <input type="hidden" name="id" value="{{$contact['id']}}">
                                    <button class="modal-form__button-delete" type="submit">削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection