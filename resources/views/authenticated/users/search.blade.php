@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <div>
        <span>ID : </span><span2>{{ $user->id }}</span2>
      </div>
      <div><span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span2>{{ $user->over_name }}</span2>
          <span2>{{ $user->under_name }}</span2>
        </a>
      </div>
      <div>
        <span>カナ : </span>
        <span2>({{ $user->over_name_kana }}</span2>
        <span2>{{ $user->under_name_kana }})</span2>
      </div>
      <div>
        @if($user->sex == 1)
        <span>性別 : </span><span2>男</span2>
        @else
        <span>性別 : </span><span2>女</span2>
        @endif
      </div>
      <div>
        <span>生年月日 : </span><span2>{{ $user->birth_day }}</span2>
      </div>
      <div>
        @if($user->role == 1)
        <span>権限 : </span><span2>教師(国語)</span2>
        @elseif($user->role == 2)
        <span>権限 : </span><span2>教師(数学)</span2>
        @elseif($user->role == 3)
        <span>権限 : </span><span2>講師(英語)</span2>
        @else
        <span>権限 : </span><span2>生徒</span2>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span>選択科目 :</span>
        @endif
        @foreach($user->subjects as $subject)
        <span2>{{ $subject->subject }}</span2>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 border">
    <div class="search_type">
      <div>
        <lavel>検索</lavel>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="search_type">
        <lavel>カテゴリ</lavel>
        <select form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div>
        <label>並び替え</label>
        <select name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="">
        <div class="search-trigger">
          <p class="m-0 search_conditions"><span>検索条件の追加</span><i class="fa fa-angle-down"></i></p>
        </div>
        <div class="search_conditions_inner">
          <div>
            <label>性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
          </div>
          <div>
            <label>権限</label>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
          <label>選択科目</label>
          @foreach($subjects as $subject)
              <span>{{ $subject->subject }}</span><input type="checkbox" name="subjects[]" value="{{ $subject->id }}" form="userSearchRequest">
          @endforeach
          </div>
        </div>
      </div>
      <div class="search_btn">
        <div>
          <input type="submit" class="btn btn-primary" name="search_btn" value="検索" form="userSearchRequest">
        </div>
        <div>
          <input type="reset" value="リセット" form="userSearchRequest">
        </div>
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
