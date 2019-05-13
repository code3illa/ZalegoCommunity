<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ZalegoCommunity</title>

    <!-- Custom fonts for this template-->

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">Zalego Community</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger"></span>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger"></span>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user-profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>


    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/zc-admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/zc-admin') }}">
                <i class="fas fa-user"></i>
                <span>{{ Auth::user()->name }}</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="mailto:{{ Auth::user()->email }}" style="white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        max-width: 90%;">
                <i class="fas fa-envelope"></i>
                <span>{{ Auth::user()->email }}</span>
            </a>
        </li>

        @if(Auth::user()->website)
        <li class="nav-item">
            <a class="nav-link" href="{{ Auth::user()->website }}" style="white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        max-width: 90%;">
                <i class="fas fa-link"></i>
                <span>{{ Auth::user()->website }}</span></a>
        </li>
        @endif

        @if(Auth::user()->status)
        <li class="nav-item">
            <a class="nav-link" href="" style="white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        max-width: 90%;">
                <i class="fas fa-table"></i>
                <span>{{ Auth::user()->status }}</span></a>
        </li>
        @endif
        <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#profileModal"><i class="fas fa-edit">&nbsp;Update profile</i></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href=""><i class="fa fa-envelope">&nbsp; Messages</i></a>
        </li>
    </ul>

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


    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>




        @yield('content')




        <!-- /.container-fluid -->

            <!-- Sticky Footer -->


        </div>
        <!-- /.content-wrapper -->

    </div>


</div>

    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>


</body>


</html>
