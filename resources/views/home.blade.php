@extends('auth.layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('content')
<div class="top-menu">
    <nav>
        <div class="top-menu-left">
            <img src="{{asset('img/default_profile.png')}}" alt="">
            <h2>Home</h2>
        </div>
    </nav>
</div>
<a href="/twetmobile" class="btn-flotante"><i class="fas fa-feather-alt"></i></a>
<!--=====================TWEETS======================== -->
<div class="menu-container">
    <ul class="menu-list-mobile border-top">
        <li class="active"><i class="fas fa-home"></i></li>
        <li><i class="fab fa-sistrix"></i></li>
        <li><i class="far fa-bell"></i></li>
        <li><i class="far fa-envelope"></i></li>
    </ul>
</div>
<div id="tweets"> 
</div>
<div class="lastTweet"></div>
<!--====================================== -->
@endsection

@section('js')
<script src="{{ asset('js/auth/secure.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection