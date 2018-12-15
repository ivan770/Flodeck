@extends('layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-3">
            <div class="p-card">
                <h3 class="p-card__title">Latest</h3>
                <p class="p-card__content">
                    <ul class="p-list">
                        @foreach($tags as $tag)
                            <a href=""><li class="p-list__item" onclick="event.preventDefault(); document.getElementById('tagform-{{ $tag->tag }}').submit();">#{{ $tag->tag }}</li></a>
                            <form class="p-search-box" action="{{ route('search') }}" method="GET" id="tagform-{{ $tag->tag }}" style="display: none">
                                <input type="hidden" name="tag" value="{{ $tag->tag }}">
                            </form>
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
        <div class="col-6">
            @forelse($posts as $post)
            <div class="p-card--highlighted">
                <h3 class="p-card__title">#{{ $post->tag }}</h3>
                <p class="p-card__content">{{ $post->post }}</p>
                <div class="p-top">
                    <a href="" class="p-top__link" onclick="event.preventDefault(); document.getElementById('upvote-{{ $post->id }}').submit();">Like</a>
                    <a href="" class="p-top__link" onclick="event.preventDefault(); document.getElementById('profile-{{ $post->id }}').submit();">Profile</a>
                </div>
                <form id="upvote-{{ $post->id }}" action="{{ route('upvote') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" value="{{ $post->id }}" name="id">
                </form>
                <form id="profile-{{ $post->id }}" action="{{ route('profile') }}" method="GET" style="display: none;">
                    <input type="hidden" value="{{ $post->user->id }}" name="id">
                </form>
                <h6 class="p-card__content">@if($post->user->verified)<i class="p-icon--success"></i>@endif Author: {{ $post->user->name }}, likes: {{ $post->likes }}</h6>
            </div>
            @empty
            <div class="p-card--highlighted">
                <h3 class="p-card__title">Oops...</h3>
                <p class="p-card__content">No posts with this tag.</p>
            </div>
            @endforelse
            {{ $posts->appends(request()->query())->links() }}
        </div>
        <div class="col-3">
            <div class="p-card">
                ivan770 (c) 2018</p>
            </div>
        </div>
    </div>
</div>
@endsection
