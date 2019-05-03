@extends('layouts.admin')

<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">

@section('content')

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Questions</li>
            </ol>

        </div>
        <div id="page-inner">
            <!-- /. ROW  -->

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
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
                        </div>
                    </div>
                </div>
            </div>
@endsection
