@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
  <div class="form__title">
    Contact
  </div>

  <div class="form__content">
    <form class="create-form" action="/confirm" method="post">
      @csrf
      <div class="form__content__name">
        <label>お名前</label>
        <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
        <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}">
      </div>
      @if ($errors->has('first_name'))
          <p class="error">{{ $errors->first('first_name') }}</p>
      @endif
      @if ($errors->has('last_name'))
          <p class="error">{{ $errors->first('last_name') }}</p>
      @endif
      <div class="form__content__gender">
        <label>性別</label>
        <label class="radio">
          <input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}>
          男性
        </label>

        <label class="radio">
          <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
          女性
        </label>

        <label class="radio">
          <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
          その他
        </label>
      </div>
      @if ($errors->has('gender'))
          <p class="error">{{ $errors->first('gender') }}</p>
      @endif
      <div class="form__content__mail">
        <label>メールアドレス</label>
        <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
      </div>
      @if ($errors->has('email'))
          <p class ="error">{{ $errors->first('email') }}</p>
      @endif
      <div class="form__content__tel">
        <label>電話番号</label>
        <input type="tel" name="tel1" maxlength="3" placeholder="080" value="{{ old('tel1') }}">
        <input type="tel" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2') }}">
        <input type="tel" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3') }}">
      </div>
      @if ($errors->has('tel1'))
          <p class="error">{{ $errors->first('tel1') }}</p>
      @endif
      @if ($errors->has('tel2'))
          <p class="error">{{ $errors->first('tel2') }}</p>
      @endif
      @if ($errors->has('tel3'))
          <p class="error">{{ $errors->first('tel3') }}</p>
      @endif
      <div class="form__content__address">
        <label>住所</label>
        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷5-2-3" value="{{ old('address') }}">
      </div>
      @if ($errors->has('address'))
          <p class="error">{{ $errors->first('address') }}</p>
      @endif
      <div class="form__content__building">
        <label>建物名</label>
        <input type="text" name="building" placeholder="例:東京都渋谷区千駄ヶ谷5-2-3" value="{{ old('building') }}">
      </div>
      <div class="form__content__category">
        <label>お問い合わせの種類</label>
        <select name="category_id">
          <option value="">選択してください</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->content }}
            </option>
          @endforeach
        </select>
      </div>
      @if ($errors->has('category_id'))
          <p class="error">{{ $errors->first('category_id') }}</p>
      @endif
      <div class="form__content__contents">
        <label>お問い合わせ内容</label>
        <input type="text" name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}">
      </div>
    @if ($errors->has('detail'))
        <p class="error">{{ $errors->first('detail') }}</p>
    @endif
      <button class="confirmation__button" type="submit">確認画面</button>
    </form>
  </div>
@endsection