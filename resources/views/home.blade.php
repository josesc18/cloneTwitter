@extends('auth.layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('content')

<div class="container-home">
    <div class="left">
        <!-- =========================SideMenu ============================= -->
        <div class="sidemenu">
            <div class="icon-logo ">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="twitter-color" ><g><path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path></g></svg>
            </div>
            <div class="sidemenu-options">
                <ul>
                    <a href="/home"><li class="active"><i class="fas fa-home"></i> Home</li></a>
                    <a href="/home"><li ><i class="fab fa-sistrix"></i> Find</li></a>
                    <a href="/home"><li ><i class="far fa-user"></i> Profile</li></a>
                    <a href="/home"><li ><i class="far fa-bell"></i> News</li></a>
                    <a href="/home"><li ><i class="far fa-envelope"></i> Message</li></a>
                    <a href="/home"><li ><i class="far fa-bookmark"></i> Saved</li></a>
                    <a href="#" onclick="logout();"><li ><i class="fas fa-sign-out-alt"></i> Logout</li></a>

                </ul>
            </div>
        </div>
        <!-- =========================SideMenu ========================= -->
    </div>
    <div class="center">
        <div class="top-menu">
            <nav>
                <div class="top-menu-left">
                    <img src="{{asset('img/default_profile.png')}}" alt="">
                    <h2>Home</h2>
                </div>
            </nav>
        </div>
        <a href="/twetmobile" class="btn-tweet"><i class="fas fa-feather-alt"></i></a>
        <div class="form-tweet-home">
            <form id="tweetForm">
                <div id="createTweet-home" class="container-tweet-input">
                    <img class="profile-img" src="{{asset('img/default_profile.png')}}" alt="">
                    <textarea name="tweet" id="tweet-input">What's going on?</textarea>
                </div>
                <p id="valuesCounter"></p>
                <button class="btnForms" id="btnTweetign" type="button">Tweeting</button>
            </form>
        </div>
        <!--=====================TWEETS======================== -->
        <div class="menu-container">
            <ul class="menu-list-mobile border-top">
                <li class="active"><i class="fas fa-home"></i></li>
                <li><i class="fab fa-sistrix"></i></li>
                <li><i class="far fa-bell"></i></li>
                <li onclick="logout();"><i class="fas fa-sign-out-alt"></i></li>
            </ul>
        </div>
        <div id="tweets"> 
        </div>
        <div class="lastTweet"></div>
        <!--=====================TWEETS======================== -->
    </div>
    <div class="right">
        <div class="aside-options">
            <div class="aside-item bg-gray">
                <h2><b>eSponsort</b></h2>
            </div>
            <div class="aside-item bg-gray">
                <p class="gray">Around the World</p>
                <p><b>Ceviche</b></p>
                <p>100,000,000 tweets</p>
            </div>
            <div class="aside-item bg-gray">
                <p class="gray">Around the World</p>
                <p><b>Playas</b></p>
                <p>10,000,000 tweets</p>
            </div>
            <div class="aside-item bg-gray">
                <p class="gray">Around the World</p>
                <p><b>TheVoice</b></p>
                <p>100,000,000 tweets</p>
            </div>
            <div class="aside-item bg-gray">
                <p class="gray">Around the World</p>
                <p><b>TheVoice</b></p>
                <p>100,000,000 tweets</p>
            </div>
            <div class="aside-item bg-gray">
                <p class="gray">Around the World</p>
                <p><b>CineIsCome</b></p>
                <p>100,000,000 tweets</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/auth/secure.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script type="text/javascript"> 
    loadNodo("tweets");
    window.addEventListener('load',onLoad())
    validateInput("tweet-input","btnTweetign");
    document.getElementById("btnTweetign").addEventListener("click",function(e){
        e.defaultPrevented;
        let form = document.querySelector('#tweetForm');
        let data = new URLSearchParams(new FormData(form));
        makeATweet(data);
    })
</script>
@endsection