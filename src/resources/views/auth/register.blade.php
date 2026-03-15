@extends('layouts.auth')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-button')
  <nav>
    <ul class="header-nav">
      <li>
        <a href="/login" class="header-nav__button">Login</a>
      </li>
    </ul>
  </nav>
@endsection

@section('content')
  <div class="form__title">
  Register
  </div>
  <div class="form__content">
    @if ($errors->any())
      <div class="form__error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form class="create-form" action="/register" method="POST">
      @csrf

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お名前</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="name" value="{{ old('name') }}">
          </div>
          <div class="form__error">
            @error('name')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ old('email') }}">
          </div>
          <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
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
          <div class="form__error">
            @error('password')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__button">
        <button class="register__button" type="submit">登録</button>
      </div>
    </form>
  </div>
@endsection