@extends('layouts.app')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
@section('content')

<div class="row">
        <!-- code start -->
                @foreach($users as $u)
                    <div class="col-sm-3 pt-2">
                    <a title="Mert S. Kaplan" href="" class="twPc-avatarLink">
                        @if($u->profpic)
                            <img src="{{ $u->profpic }}" class="twPc-avatarImg" alt="">
                        @else
                            <img alt="Mert S. Kaplan" src="http://127.0.0.1:8000/uploads/default.jpg" class="twPc-avatarImg">
                        @endif
                    </a>


                    <div class="twPc-divUser">
                        <div class="twPc-divName">
                            <a href="https://twitter.com/mertskaplan">{{ $u->name }}</a>
                        </div>
                        <span>
                            <a href="https://twitter.com/mertskaplan"><span>{{ $u->email }}</span></a>
                        </span>
                    </div>


                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary" style="padding-left: 21px;">Message</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal" action="{{ url('/send-message') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="recepient_id" value="{{ $u->id }}">
                                        <div class="form-group">
                                            <textarea rows="7" class="form-control" name="message" required placeholder="Enter message..."></textarea>
                                        </div>

                                        <div class="form-group" style="padding: 8px;">
                                            <button type="submit" class="btn btn-success">Send</button>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>

                @endforeach



    <!-- code end -->
            @if($u->status)
            <i class="fa fa-book">&nbsp;{{ $u->status }}</i><br>
            @endif
            @if($u->website)
            <a href="{{ $u->website }}"> <i class="fa fa-link">&nbsp;{{ $u->website }}</i></a><br>
            @endif

            @if(Auth::id()==$u->id)
                <a href="" data-toggle="modal" data-target="#profileModal"><i class="fa fa-pencil">&nbsp;Update profile</i></a><br>
                <a href="{{ url('/view-messages') }}"><i class="fa fa-envelope">&nbsp; Messages</i></a>


                <!-- Modal -->
                <div id="profileModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary">Update Profile</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{ url('/profile-update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- <input type="hidden" name="_method" value="PUT">-->

                                    <div class="form-group" style="padding: 8px;">
                                        <label class="control-label">Profile pic</label>
                                        <input type="file"  name="prof_pic" value="{{ Auth::user()->profpic }}" required />
                                    </div>
                                    <div class="form-group" style="padding: 8px;">
                                        <label class="control-label">Username</label>
                                        <input type="text" class="form-control" name="username" value="{{ Auth::user()->name }}" required />
                                    </div>

                                    <div class="form-group" style="padding: 8px;">
                                        <label class="control-label">Status</label>
                                        <textarea rows="5" class="form-control" name="status" required > {{ Auth::user()->status }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Website</label>
                                        <input type="text" class="form-control" name="website" value="{{ Auth::user()->website }}">
                                    </div>

                                    <div class="form-group" style="padding: 8px;">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>


            @else
                <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i>Message</a>
            @endif
        </div>

        <div class="col-sm-9 my-0 pt-0">
            @foreach($questions as $question)
                @if($question->user_id==$u->id)
                <article class="media content-section">
                    @if($u->profpic)
                    <a class="mr-2" href=""><img class="rounded-circle article-img" src="{{ $u->profpic }}"></a>
                    @else()
                        <a class="mr-2" href="">
                            <img class="rounded-circle article-img" src="http://127.0.0.1:8000/uploads/default.jpg" alt="">
                        </a>
                    @endif
                    <div class="media-body">
                        <div class="article-metadata">
                            <form method="post" action="{{url('/user-profile')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $u->id }}">
                                <a class="mr-2" href=""><button type="submit" class="buttontext" style="font-family: 'Century Schoolbook L'; color: #1d68a7;"><span class="dot"></span>&nbsp;{{ $u->name }}</button></a>
                            </form>

                            <small class="text-muted">Created: {{ $question->created_at }}</small>
                        </div>

                        <form method="post" action="{{url('/view-question')}}">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{ $question->id }}">
                            <h2><a class="article-title" href=""><button type="submit" class="buttontext" style="font-family: 'Century Schoolbook L';">{{ $question->title }}</button></a></h2>
                        </form>
                        <p class="article-content">{{ $question->question }}</p>


                        <div class="quiz-icons">
                            <img src="/images/comment.png">&nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="/images/like.png">
                        </div>
                    </div>

                </article>
                @endif
        @endforeach



        </div>
    </div>

@endsection
