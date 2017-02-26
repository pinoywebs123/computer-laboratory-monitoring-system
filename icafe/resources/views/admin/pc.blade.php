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
                       <h1>Pc's</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addPc">Add</button>
                        @if(Session::has('added'))
                            <div class="alert alert-success">
                                {{Session::get('added')}}
                            </div>
                        @endif
                        @if(Session::has('info'))
                            <div class="alert alert-danger">
                                {{Session::get('info')}}
                            </div>
                        @endif
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-lg-8">
                      
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>CAS 5 Operation</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                   <thead>
                                        <tr>
                                            <th>PC</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Dept</th>
                                            <th>Year</th>
                                            <th>Staff</th>
                                            <th>Start</th>
                                        </tr>  
                                   </thead>  
                                   <tbody>
                                       @if($logs->count())
                                        @foreach($logs as $log)
                                        @if($log->staff->role_id == 5)
                                        <tr>
                                             <td>{{$log->computer_id}}</td>
                                            <td>{{$log->student->lname}}</td>
                                            <td>{{$log->student->fname}}</td>
                                            <td>{{$log->student->college}}</td>
                                            <td>{{$log->student->year}}</td>
                                            <td>
                                                {{$log->staff->l_name}},{{$log->staff->f_name}}
                                            </td>
                                            <td>{{$log->created_at->diffForHumans()}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @endif  
                                   </tbody>
                                   
                                </table>
                            </div>
                       </div>

                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>CAS 7 Operation</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                   <thead>
                                        <tr>
                                            <th>PC</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            
                                            <th>Dept</th>
                                            <th>Year</th>
                                            
                                            <th>Staff</th>
                                            <th>Start</th>
                                        </tr>  
                                   </thead>  
                                   <tbody>
                                       @if($logs->count())
                                        @foreach($logs as $log)
                                        @if($log->staff->role_id == 7)
                                        <tr>
                                             <td>{{$log->computer_id}}</td>
                                            <td>{{$log->student->lname}}</td>
                                            <td>{{$log->student->fname}}</td>
                                            
                                            <td>{{$log->student->college}}</td>
                                            <td>{{$log->student->year}}</td>
                                           
                                            <td>
                                                {{$log->staff->l_name}},{{$log->staff->f_name}}
                                            </td>
                                            <td>{{$log->created_at->diffForHumans()}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @endif  
                                   </tbody>
                                   
                                </table>
                            </div>
                       </div>

                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>CAS 8 Operation</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                   <thead>
                                        <tr>
                                            <th>PC</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Dept</th>
                                            <th>Year</th>
                                            <th>Staff</th>
                                            <th>Start</th>
                                        </tr>  
                                   </thead>  
                                   <tbody>
                                        @if($logs->count())
                                        @foreach($logs as $log)
                                        @if($log->staff->role_id == 8)
                                        <tr>
                                            <td>{{$log->computer_id}}</td>
                                            <td>{{$log->student->lname}}</td>
                                            <td>{{$log->student->fname}}</td>
                                            <td>{{$log->student->college}}</td>
                                            <td>{{$log->student->year}}</td>
                                            <td>
                                                {{$log->staff->l_name}},{{$log->staff->f_name}}
                                            </td>
                                            <td>{{$log->created_at->diffForHumans()}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @endif  
                                   </tbody>
                                   
                                </table>
                            </div>
                       </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-info">
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
                                            <th>Action</th>
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
                                            <td>
                                                <a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="{{route('room_delete',['room_delete'=> $pc->id])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                            
                                        </tr>
                                        @endif
                                      @endforeach
                                   </tbody> 
                                   
                                </table>  
                            </div>
                       </div>
                       <div class="panel panel-info">
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
                                            <th>Action</th>
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
                                            <td>
                                                <a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="{{route('room_delete',['room_delete'=> $pc->id])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                            
                                        </tr>
                                        @endif
                                      @endforeach
                                   </tbody> 
                                   
                                </table>  
                            </div>
                       </div>
                       <div class="panel panel-info">
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
                                            <th>Action</th>
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
                                            <td>
                                                <a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="{{route('room_delete',['room_delete'=> $pc->id])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
       
        <div class="modal fade" id="addPc">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-head">
                         @if(count($errors) > 0)
                            <div class="alert alert-danger">
                               <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                               </ul>
                            </div>
                        @endif
                    </div>
                    <div class="modal-body">
                        <h3>PC Information</h3>
                        <form action="{{route('addPc')}}" method="post">
                            {{csrf_field()}}
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <input type="text" name="pc" class="form-control" placeholder="PC No." required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <select name="room" class="form-control" required="">
                                    <option value="0">Room</option>
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <input type="text" name="cpu" class="form-control" placeholder="CPU" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <input type="text" name="motherboard" class="form-control" placeholder="Motherboard" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <input type="text" name="ram" class="form-control" placeholder="RAM" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <input type="text" name="hdd" class="form-control" placeholder="HDD" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <input type="text" name="keyboard" class="form-control" placeholder="Keyboard" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <input type="text" name="mouse" class="form-control" placeholder="Mouse" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
