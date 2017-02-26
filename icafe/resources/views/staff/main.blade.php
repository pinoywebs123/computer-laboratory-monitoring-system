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

   <script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    "Time " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</head>

<body onload="startTime()">

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
                    <li class="active">
                        <a href="{{route('staff')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="{{route('staff_login')}}"><i class="fa fa-fw fa-dashboard"></i> LogIn</a>
                    </li>
                    <li>
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
                       <h1 id="txt"></h1>
                     
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-lg-8">
                       <div class="panel panel-success">
	                       	<div class="panel-heading">
	                       		<h1>CAS {{Auth::user()->role_id}} Operation</h1>
	                       	</div>
	                       	<div class="panel-body">
	                       		<table class="table">
                                    <thead>
                                        <tr>
                                            <th>PC</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>College</th>
                                            <th>Year</th>
                                            <th>Start</th>
                                            <th>Balance Time</th>
                                        </tr> 
                                    </thead>  
                                     <tbody>
                                       @if($logs->count())
                                        @foreach($logs as $log)
                                        <tr>
                                            @if($log->staff_id == Auth::id())
                                                <td>{{$log->computer_id}}</td>
                                                <td>{{$log->student->lname}}</td>
                                                <td>{{$log->student->fname}}</td>
                                                <td>{{$log->student->college}}</td>
                                                <td>{{$log->student->year}}</td>
                                                <td>{{$log->created_at->diffForHumans()}}</td>
                                                <td>{{$log->student->time->time / 3600}}</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    @endif  
                                   </tbody>   
                                  
                                </table>
	                       	</div>
                       </div>

                       
                    </div>

                    <div class="col-lg-4">
                    	<div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>CAS 5 PC</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <head>
                                        <tr>
                                            <th>No.</th>
                                            <th>Room</th>
                                            <th>Status</th>
                                        </tr>
                                    </head>
                              
                                <tbody>
                                      @foreach($pcs as $pc)
                                      @if($pc->room == 5)
                                        <tr>
                                            <td><a href="#">{{$pc->id}}</a></td>
                                            <td>{{$pc->room}}</td>
                                            <td>
                                                <?php 
                                                    if($pc->status == 0){
                                                        echo 'avilable';
                                                    }else{
                                                        echo'used';
                                                    }
                                                ?>

                                            </td>
                                            
                                        </tr>
                                        @endif
                                      @endforeach
                                   </tbody> 
                                   
                                </table>  
                            </div>
                       </div>
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>CAS 7 PC</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <head>
                                        <tr>
                                            <th>No.</th>
                                            <th>Room</th>
                                            <th>Status</th>
                                        </tr>
                                    </head>
                              
                                <tbody>
                                       @foreach($pcs as $pc)
                                      @if($pc->room == 7)
                                        <tr>
                                            <td><a href="#">{{$pc->id}}</a></td>
                                            <td>{{$pc->room}}</td>
                                            <td>
                                                <?php 
                                                    if($pc->status == 0){
                                                        echo 'avilable';
                                                    }else{
                                                        echo'used';
                                                    }
                                                ?>

                                            </td>
                                            
                                        </tr>
                                        @endif
                                      @endforeach
                                   </tbody> 
                                   
                                </table>  
                            </div>
                       </div>
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>CAS 8 PC</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <head>
                                        <tr>
                                            <th>No.</th>
                                            <th>Room</th>
                                            <th>Status</th>
                                        </tr>
                                    </head>
                              
                                <tbody>
                                       @foreach($pcs as $pc)
                                      @if($pc->room == 8)
                                        <tr>
                                            <td><a href="#">{{$pc->id}}</a></td>
                                            <td>{{$pc->room}}</td>
                                            <td>
                                                <?php 
                                                    if($pc->status == 0){
                                                        echo 'avilable';
                                                    }else{
                                                        echo'used';
                                                    }
                                                ?>

                                            </td>
                                            
                                        </tr>
                                        @endif
                                      @endforeach
                                   </tbody> 
                                   
                                </table>  
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
