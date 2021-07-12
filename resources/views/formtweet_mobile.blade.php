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
    <form id="tweetForm">
        <div id="createTweet" class="container-tweet-input">
            <img src="{{asset('img/default_profile.png')}}" alt="">
            <textarea name="tweet" id="tweet-input" rows="auto">What's going on?</textarea>
        </div>
        <p id="valuesCounter"></p>
        <button class="btnForms" id="btnTweetign" type="button">Tweeting</button>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/auth/secure.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script type="text/javascript">
    validateInput("tweet-input","btnTweetign");
    document.getElementById("btnTweetign").addEventListener("click",function(e){
        e.defaultPrevented;
        let form = document.querySelector('#tweetForm');
        let data = new URLSearchParams(new FormData(form));
        makeATweet(data);
    })</script>
@endsection