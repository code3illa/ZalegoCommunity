@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Data</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="dashboard-cards">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image red">
                                <i class="material-icons dp48">account_box</i>
                            </div>
                            <div class="card-stacked red">
                                <div class="card-content">
                                    <h3>{{ $details[0] }}</h3>
                                </div>
                                <div class="card-action">
                                    <strong>Users</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <a href="{{ route('questions-admin') }}" style="text-decoration: none;">
                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image orange">
                                <i class="material-icons dp48">forum</i>
                            </div>
                            <div class="card-stacked orange">
                                <div class="card-content">
                                    <h3>{{ $details[1] }}</h3>
                                </div>
                                <div class="card-action">
                                    <strong>Questions</strong>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image blue">
                                <i class="material-icons dp48">chat_bubble</i>
                            </div>
                            <div class="card-stacked blue">
                                <div class="card-content">
                                    <h3>{{ $details[2] }}</h3>
                                </div>
                                <div class="card-action">
                                    <strong>Comments</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image green">
                                <i class="material-icons dp48">supervisor_account</i>
                            </div>
                            <div class="card-stacked green">
                                <div class="card-content">
                                    <h3>10</h3>
                                </div>
                                <div class="card-action">
                                    <strong>ONLINE</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                    <div class="cirStats">

                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <h4 class="text-center">Users</h4>
                        <table class="table my-1">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Website</th>
                            <th>Photo</th>
                            <th>Joined:</th>
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
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                            </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
@endsection
