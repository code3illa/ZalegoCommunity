@extends('layouts.admin')

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
                    <span class="float-left">{{ $details[0] }}</span>
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
                    <span class="float-left">{{ $details[1] }}</span>
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
                    <span class="float-left">{{ $details[2] }}</span>
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
                    <span class="float-left">{{ $details[3] }}</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>
    <br>

<div class="card">
    <div class="card-body">
        <h3 class="text-info text-center">Users</h3>
        <table class="table my-1">
            <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Website</th>
            <th>Photo</th>
            <th>Joined:</th>
            <th>Action</th>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->status }}</td>
                        <td><a href="{{ $member->website }}">{{ $member->website }}</a></td>
                        <td><img src="{{ $member->profpic }}" class="rounded-circle mx-auto img-fluid" alt="" style="height: 40px; width: 40px;"> </td>
                        <td>{{ $member->created_at }}</td>
                        <td><a href="delete/{{ $member->id }}" class="btn btn-danger btn-sm"
                               onclick='return confirm("Are you sure you want to Delete this user?")'>
                                <i class="fas fa-trash"></i> </a> </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
</div>
</div>

@endsection
