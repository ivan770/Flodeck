<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Flodeck</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="p-card--highlighted">
        <h3 class="p-card__title">#{{ $post->tag }}</h3>
        <p class="p-card__content">{{ $post->post }}</p>
        <div class="p-top">
            <a href="" class="p-top__link" onclick="event.preventDefault(); document.getElementById('profile-{{ $post->id }}').submit();">Profile</a>
        </div>
        <form target="_blank" id="profile-{{ $post->id }}" action="{{ route('profile') }}" method="GET" style="display: none;">
            <input type="hidden" value="{{ $post->user->id }}" name="id">
        </form>
        <h6 class="p-card__content">@if($post->user->verified)<i class="p-icon--success"></i>@endif Author: {{ $post->user->name }}, likes: {{ $post->likes }}</h6>
    </div>
</body>
</html>
