@extends('layouts.auth')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-button')
  <nav>
    <ul class="header-nav">
      <li>
        <a href="/register" class="header-nav__button">Register</a>
      </li>
    </ul>
  </nav>
@endsection

@section('content')
  <div class="form__title">
    Login
  </div>

  <div class="form__content">
    <form class="create-form" action="/login" method="post">
      @csrf

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ old('email') }}">
          </div>
          @error('email')
            <div class="form__error">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">パスワード</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="password" name="password">
          </div>
          @error('password')
            <div class="form__error">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="form__button">
        <button class="login__button" type="submit">ログイン</button>
      </div>
    </form>
  </div>
@endsection