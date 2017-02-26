<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Norsu Icafe Attendant</title>

    
    <link href="{{URL::to('admin/css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/plugins/morris.css')}}" rel="stylesheet">

    
    <link href="{{URL::to('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

   <style type="text/css">
       #logout{
        font-size: 80px;
        color: red;
        padding: 10px 10px;
       }
   </style>
</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test">NORSU Staff</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->f_name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                	<center>
                		<img src="{{URL::to('asset/images/admin.png')}}" height="80px" width="80px">
                	</center>
                    <li>
                       <a href="#">
                       		<p class="text-center" style="color: #fff">{{Auth::user()->l_name}}, {{Auth::user()->f_name}} {{Auth::user()->m_name}}</p>
                       		<p class="text-center" style="color: #fff">Online</p>
                       
                       </a>
                    </li>
                    <li>
                        <a href="{{route('staff')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="{{route('staff_login')}}"><i class="fa fa-fw fa-dashboard"></i> LogIn</a>
                    </li>
                    <li class="active">
                        <a href="{{route('staff_logout')}}"><i class="fa fa-fw fa-dashboard"></i> LogOut</a>
                    </li>
                    
                    <li>
                        <a href="{{route('check_balance')}}"><i class="fa fa-fw fa-dashboard"></i> Check Balance</a>
                    </li>
                    <li>
                        <a href="{{route('staff_report')}}"><i class="fa fa-fw fa-dashboard"></i> Reports</a>
                    </li>
                    
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

               
                <div class="row">
                    <div class="col-lg-12">
                       <h1>Logout Students</h1>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-danger">
	                       	<div class="panel-heading">
	                       		<h1 class="text-center">QR Scanner</h1>
	                       	</div>
	                       	<div class="panel-body">
	                       		@if(Session::has('info'))
                                    <div class="alert alert-info">
                                        {{Session::get('info')}}    
                                    </div>
                                @endif
                                 <div class="col-lg-5">
                                    <form action="{{route('logout_student')}}" method="POST">
                                        <div class="form-group">
                                            <label>Bar Code</label>
                                            <input type="password" name="barcode" class="form-control" autofocus="">
                                        </div>
                                        
                                    
                                </div>

                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-off" id="logout"></i></button>
                                </div>
                                {{csrf_field()}}
                                </form>
	                       	</div>
                       </div>

                       
                    </div>

                    
                </div>
                
               

               

               
                    
                    

            </div>
           

        </div>
       
        <div class="modal fade" id="test">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-head">
                        
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
   

   
    <script src="{{URL::to('admin/js/jquery.js')}}"></script>

    
    <script src="{{URL::to('admin/js/bootstrap.min.js')}}"></script>

    
    <script src="{{URL::to('admin/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{URL::to('admin/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::to('admin/js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
