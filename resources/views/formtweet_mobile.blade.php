@extends('auth.layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('content')

<div class="top-menu">
    <nav>
        <div class="top-menu-left">
            <a href="/home"><i class="fas fa-angle-double-left"></i></a>
        </div>
    </nav>
</div>
<div class="form-tweet">
    <form>
        <div id="createTweet" class="container-tweet-input">
            <img src="{{asset('img/default_profile.png')}}" alt="">
            <textarea name="" id="" rows="auto">What's going on?</textarea>
        </div>
        <button class="btnForms">Tweeting</button>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/auth/secure.js') }}"></script>
@endsection