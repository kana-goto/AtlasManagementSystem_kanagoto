@extends('layouts.sidebar')
@section('content')

<div class="post_view w-75 mt-5">
  <p class="w-75 m-auto">いいねした投稿</p>
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
        @if(Auth::user()->is_Like($post->id))
        <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
        @else
        <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
