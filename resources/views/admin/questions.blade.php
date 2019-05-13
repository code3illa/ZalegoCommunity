@extends('layouts.admin')

<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">

@section('content')
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">Users</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/zc-admin') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">Questions</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/questions') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">Comments</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left"> View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">Messages</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>

    <br>
        <h3 class="text-center text-info">Questions</h3>
        @foreach($questions as $question)
            <article class="media content-section">
                @csrf
                @if($question->profpic)
                    <a class="mr-2" href="{{ route('user-profile', $question->uid) }}"><img class="rounded-circle article-img" src="{{ $question->profpic }}" alt=""></a>
                @else()
                    <a class="mr-2" href="{{ route('user-profile', $question->uid) }}"><img class="rounded-circle article-img" src="http://127.0.0.1:8000/uploads/default.jpg"></a>
                @endif
                <div class="media-body">
                    <div class="article-metadata">

                        <a class="mr-2" href="{{ route('user-profile', $question->uid) }}"><button type="submit" class="buttontext" style="font-family: 'Century Schoolbook L'; color: #1d68a7;"><span class="dot"></span>&nbsp;{{ $question->name }}</button></a>
                        <small class="text-muted">Created: {{ $question->created_at }}</small>
                    </div>
                    <form method="post" action="{{url('/show-question')}}">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $question->qid }}">
                        <h2><a class="article-title" href=""><button type="submit" class="buttontext">{{ $question->title }}</button></a></h2>
                    </form>
                    <p class="article-content">{{ $question->question }}</p>

                    <div class="quiz-icons">
                        <img src="/images/comment.png">&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="/images/like.png">
                    </div>

                </div>

            </article>
        @endforeach

@endsection
