<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Norsu Icafe Admin</title>

    
    <link href="{{URL::to('admin/css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/plugins/morris.css')}}" rel="stylesheet">

    
    <link href="{{URL::to('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <style type="text/css">
        .input-group{
            margin-bottom: 10px;
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
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test">NORSU Admin</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->f_name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
                        <li>
                            <a href="{{route('admin_settings')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
                        <a href="{{route('admin')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="{{route('admin_staff')}}"><i class="fa fa-fw fa-dashboard"></i> Staff</a>
                    </li>
                    <li>
                        <a href="{{route('admin-student')}}"><i class="fa fa-fw fa-dashboard"></i> Student</a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin-pc')}}"><i class="fa fa-fw fa-dashboard"></i> PC</a>
                    </li>
                    <li>
                        <a href="{{route('admin_report')}}"><i class="fa fa-fw fa-dashboard"></i> Reports</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

               
                <div class="row">
                    <div class="col-lg-12">
                       <h1>Pc Information</h1>
                       
                        @if(Session::has('added'))
                            <div class="alert alert-success">
                                {{Session::get('added')}}
                            </div>
                        @endif
                    </div>
                </div>
               
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>PC {{$pc->pc_no}} in Room 
                            @if($pc->room == 2)
                                CAS 5
                            @elseif($pc->room == 3)
                                CAS 7
                            @else
                                CAS 8
                            @endif
                            Specification </h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-4">
                                <ul>
                                    <li>Processor</li>
                                    <li>Motherboard</li>
                                    <li>Random Access Memory (RAM)</li>
                                    <li>Harddisk Drive (HDD)</li>
                                    <li>Keyboard</li>
                                    <li>Mouse</li>
                                </ul>
                            </div>
                             <div class="col-lg-4">
                                <ul>
                                    <li>{{$pc->spec->processor}}</li>
                                    <li>{{$pc->spec->motherboard}}</li>
                                    <li>{{$pc->spec->ram}}</li>
                                    <li>{{$pc->spec->hdd}}</li>
                                    <li>{{$pc->spec->keyboard}}</li>
                                    <li>{{$pc->spec->mouse}}</li>
                                </ul>
                            </div>
                        </div>
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
