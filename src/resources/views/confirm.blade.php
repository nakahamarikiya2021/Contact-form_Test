@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
  <div class="form__content">
    <div class="form__title">
      Contact
    </div>

    <table>
      <tr>
        <th>お名前</th>
        <td>
          {{ old('last_name', $contact['last_name']) }}
          {{ old('first_name', $contact['first_name']) }}
        </td>
      </tr>

      <tr>
        <th>性別</th>
        <td>
          {{ ['1' => '男性', '2' => '女性', '3' => 'その他'][old('gender', $contact['gender'])] }}
        </td>
      </tr>

      <tr>
        <th>メールアドレス</th>
        <td>{{ old('email', $contact['email']) }}</td>
      </tr>

      <tr>
        <th>電話番号</th>
        <td>
          {{ old('tel1', $contact['tel1']) }}-{{ old('tel2', $contact['tel2']) }}-{{ old('tel3', $contact['tel3']) }}
        </td>
      </tr>

      <tr>
        <th>住所</th>
        <td>{{ old('address', $contact['address']) }}</td>
      </tr>

      <tr>
        <th>建物名</th>
        <td>{{ old('building', $contact['building']) }}</td>
      </tr>

      <tr>
        <th>お問い合わせの種類</th>
        <td>
          {{ ['1' => '商品のお届けについて', '2' => '商品の交換について', '3' => '商品トラブル', '4' => 'ショップへのお問い合わせ', '5' => 'その他'][old('category_id', $contact['category_id'])] }}
        </td>
      </tr>

      <tr>
        <th>お問い合わせの内容</th>
        <td>{{ old('detail', $contact['detail']) }}</td>
      </tr>
    </table>

    <div class="button__group">

      <form class="confirmation-form" action="/send" method="post">
        @csrf
        <input type="hidden" name="last_name" value="{{ old('last_name', $contact['last_name']) }}">
        <input type="hidden" name="first_name" value="{{ old('first_name', $contact['first_name']) }}">
        <input type="hidden" name="gender" value="{{ old('gender', $contact['gender']) }}">
        <input type="hidden" name="email" value="{{ old('email', $contact['email']) }}">
        <input type="hidden" name="tel1" value="{{ old('tel1', $contact['tel1']) }}">
        <input type="hidden" name="tel2" value="{{ old('tel2', $contact['tel2']) }}">
        <input type="hidden" name="tel3" value="{{ old('tel3', $contact['tel3']) }}">
        <input type="hidden" name="address" value="{{ old('address', $contact['address']) }}">
        <input type="hidden" name="building" value="{{ old('building', $contact['building']) }}">
        <input type="hidden" name="category_id" value="{{ old('category_id', $contact['category_id']) }}">
        <input type="hidden" name="detail" value="{{ old('detail', $contact['detail']) }}">

        <button class="confirm__button" type="submit">送信</button>
      </form>

      <form class="confirmation-form" action="/" method="get">
        <input type="hidden" name="last_name" value="{{ old('last_name', $contact['last_name']) }}">
        <input type="hidden" name="first_name" value="{{ old('first_name', $contact['first_name']) }}">
        <input type="hidden" name="gender" value="{{ old('gender', $contact['gender']) }}">
        <input type="hidden" name="email" value="{{ old('email', $contact['email']) }}">
        <input type="hidden" name="tel1" value="{{ old('tel1', $contact['tel1']) }}">
        <input type="hidden" name="tel2" value="{{ old('tel2', $contact['tel2']) }}">
        <input type="hidden" name="tel3" value="{{ old('tel3', $contact['tel3']) }}">
        <input type="hidden" name="address" value="{{ old('address', $contact['address']) }}">
        <input type="hidden" name="building" value="{{ old('building', $contact['building']) }}">
        <input type="hidden" name="category_id" value="{{ old('category_id', $contact['category_id']) }}">
        <input type="hidden" name="detail" value="{{ old('detail', $contact['detail']) }}">

        <button class="fix__button" type="submit">修正</button>
      </form>

    </div>
  </div>
@endsection