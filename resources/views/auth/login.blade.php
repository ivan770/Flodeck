@extends('layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="p-card">
                <h3 class="p-card__title">Log in to Flodeck</h3>
                <p class="p-card__content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <label for="email">E-mail</label>
                        <input type="email" id="email" placeholder="E-mail" name="email" required>
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Password" name="password" required>
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me</label>
                        <button type="submit" class="p-button--neutral">Continue</button>
                    </form>
                </p>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@endsection