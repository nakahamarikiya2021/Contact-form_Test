@extends('layouts.auth')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="admin">
        <h2 class="admin__title">Admin</h2>

        <form class="search-form" action="/search" method="get">
            <input class="search-form__input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください"
                value="{{ request('keyword') }}">

            <select class="search-form__select" name="gender">
                <option value="">性別</option>
                <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>

            <select class="search-form__select" name="category">
                <option value="">お問い合わせの種類</option>
                <option value="1" {{ request('category') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                <option value="2" {{ request('category') == '2' ? 'selected' : '' }}>商品の交換について</option>
                <option value="3" {{ request('category') == '3' ? 'selected' : '' }}>商品トラブル</option>
                <option value="4" {{ request('category') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                <option value="5" {{ request('category') == '5' ? 'selected' : '' }}>その他</option>
            </select>

            <input class="search-form__date" type="date" name="date" value="{{ request('date') }}">

            <button class="search-form__button search-form__button--search" type="submit">
                検索
            </button>

            <a class="search-form__button search-form__button--reset" href="/reset">
                リセット
            </a>
        </form>


        <div class="admin__actions">
            <form action="/export" method="get">
                <button class="export-button" type="submit">エクスポート</button>
            </form>
        </div>


        <div class="admin-table">
            <table class="admin-table__inner">
                <thead>
                    <tr class="admin-table__row">
                        <th class="admin-table__header">お名前</th>
                        <th class="admin-table__header">性別</th>
                        <th class="admin-table__header">メールアドレス</th>
                        <th class="admin-table__header">お問い合わせの種類</th>
                        <th class="admin-table__header"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr class="admin-table__row">
                            <td class="admin-table__data">
                                {{ $contact->last_name }} {{ $contact->first_name }}
                            </td>
                            <td class="admin-table__data">
                                {{ ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] ?? '' }}
                            </td>
                            <td class="admin-table__data">
                                {{ $contact->email }}
                            </td>
                            <td class="admin-table__data">
                                {{ ['1' => '商品のお届けについて', '2' => '商品の交換について', '3' => '商品トラブル', '4' => 'ショップへのお問い合わせ', '5' => 'その他'][$contact->category_id] ?? '' }}
                            </td>
                            <td class="admin-table__data">
                                <button class="detail-button" type="button" onclick="openModal({{ $contact->id }})">
                                    詳細
                                </button>

                                {{-- モーダル --}}
                                <div id="modal-{{ $contact->id }}" class="modal">
                                    <div class="modal-content">
                                        <span class="close" onclick="closeModal({{ $contact->id }})">&times;</span>

                                        <div class="modal-row">
                                            <label>お名前</label>
                                            <div class="value">{{ $contact->last_name }} {{ $contact->first_name }}</div>
                                        </div>

                                        <div class="modal-row">
                                            <label>性別</label>
                                            <div class="value">
                                                {{ ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] ?? '' }}
                                            </div>
                                        </div>

                                        <div class="modal-row">
                                            <label>メールアドレス</label>
                                            <div class="value">{{ $contact->email }}</div>
                                        </div>

                                        <div class="modal-row">
                                            <label>電話番号</label>
                                            <div class="value">{{ $contact->tel }}</div>
                                        </div>

                                        <div class="modal-row">
                                            <label>住所</label>
                                            <div class="value">{{ $contact->address }}</div>
                                        </div>

                                        <div class="modal-row">
                                            <label>建物名</label>
                                            <div class="value">{{ $contact->building }}</div>
                                        </div>

                                        <div class="modal-row">
                                            <label>お問い合わせの種類</label>
                                            <div class="value">
                                                {{ ['1' => '商品のお届けについて', '2' => '商品の交換について', '3' => '商品トラブル', '4' => 'ショップへのお問い合わせ', '5' => 'その他'][$contact->category_id] ?? '' }}
                                            </div>
                                        </div>

                                        <div class="modal-row">
                                            <label>お問い合わせ内容</label>
                                            <div class="value">{{ $contact->detail }}</div>
                                        </div>

                                        <div class="modal-actions">
                                            <form action="/delete/{{ $contact->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).style.display = 'block';
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }

        window.onclick = function (event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(function (modal) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        }
    </script>
@endsection