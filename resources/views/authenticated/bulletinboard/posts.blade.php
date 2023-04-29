@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <!-- <p class="w-75 m-auto">投稿一覧</p> -->
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>

      <div class="post_bottom_area">
        @foreach ($post-> subCategories as $sub_category)
        <span class="btn btn-primary">{{ $sub_category->sub_category }}</span>
        @endforeach
        <div class="d-flex justify-content-end post_status">
          <div class="mr-5">
            <i class="fa fa-comment" post_id="{{ $post->id }}"></i><span class="post_comment_counts{{ $post->id }}">{{ $post_comment->commentCounts($post->id) }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area border w-25">
    <div class="border m-4">
      <a href="{{ route('post.input') }}"><input type="submit" class="btn-primary post_btn" value="投稿"></input></a>
      <div class="">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" form="postSearchRequest">
      </div>
      <input type="submit" name="like_posts" class="category_btn1" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="category_btn2" value="自分の投稿" form="postSearchRequest">
      <p>カテゴリー検索</p>
        <ul>
          @foreach($categories as $category)
          <li class="main_categories" category_id="{{ $category->id }}">
            <span>{{ $category->main_category }} <i class="fa fa-angle-down"></i><span>
          </li>
          @foreach ($category -> subCategories as $sub_category)
          <input type="submit" name="category_word" class="category_num" category_id="{{ $sub_category->main_category_id }}" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
          @endforeach
          @endforeach
        </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
