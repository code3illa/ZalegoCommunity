@if(Auth::user()->admin==1)
        @else
        <script type="text/javascript">
            window.location = "{{ url('/') }}"
        </script>
@endif
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZalegoCommunity</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../admin/assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../admin/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css' />


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="" style="font-family: Roboto;">ZalegoCommunity</a>
				
		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
				  <li><a class="dropdown-button waves-effect waves-dark" href="" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{ Auth::user()->name }}</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>
  <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu waves-effect waves-dark" href=""><i class="fa fa-dashboard"></i> {{ Auth::user()->name  }}</a>
                    </li>
                    <li>
                        <a href="" class="waves-effect waves-dark"><i class="fa fa-envelope"></i> {{ Auth::user()->email }}</a>
                    </li>
					<li>
                        <a href="" class="waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> {{ Auth::user()->status }}</a>
                    </li>
                    <li>
                        <a href="{{ Auth::user()->website }}" class="waves-effect waves-dark"><i class="fa fa-link"></i> {{ Auth::user()->website }}</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('questions-admin') }}" class="waves-effect waves-dark"><i class="fa fa-question-circle"></i>Questions</a>
                    </li>
                    <li>
                        <a href="" class="waves-effect waves-dark"><i class="fa fa-user"></i> Users </a>
                    </li>



                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->



        @yield('content')
      
        <!-- /. PAGE WRAPPER  -->
    </div>

    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
	
	<!-- Bootstrap Js -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
	
	<script src="../admin/assets/materialize/js/materialize.min.js"></script>
	
    <!-- Metis Menu Js -->
    <script src="../admin/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="../admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../admin/assets/js/morris/morris.js"></script>
	
	
	<script src="../admin/assets/js/easypiechart.js"></script>
	<script src="../admin/assets/js/easypiechart-data.js"></script>
	
	 <script src="../admin/assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="../admin/assets/js/custom-scripts.js"></script>
 

</body>

</html>
