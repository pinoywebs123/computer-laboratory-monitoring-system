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
                    <li class="active">
                        <a href="{{route('admin_staff')}}"><i class="fa fa-fw fa-dashboard"></i> Staff</a>
                    </li>
                    <li>
                        <a href="{{route('admin-student')}}"><i class="fa fa-fw fa-dashboard"></i> Student</a>
                    </li>
                    <li>
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
                       <h1>Staff</h1>
                       @if(Session::has('staff'))
                            <div class="alert alert-success">
                                {{Session::get('staff')}}
                            </div>
                        @endif
                    </div>
                </div>
               
                <div class="col-lg-6 col-lg-offset-3">
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
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addStudent">Add</button>
                        
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
                       <div class="panel panel-info">
                            <div class="panel-heading">
                                <h1>Staff List</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Room</th>
                                            <th>Operation</th>
                                        </tr>   
                                    </thead>  
                                    <tbody>
                                        @foreach($staffs as $staff)
                                            <tr>
                                                <td>{{$staff->id}}</td>
                                                <td>{{$staff->l_name}}</td>
                                                <td>{{$staff->f_name}}</td>
                                                <td>{{$staff->m_name}}</td>
                                                <td>{{$staff->gender}}</td>
                                                <td>{{$staff->email}}</td>
                                                <td>{{$staff->role_id}}</td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <a href="{{route('staff_delete', ['staff_id'=> $staff->id])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody> 
                                </table>
                            </div>
                       </div>

                      
                    </div>

                </div>
                
               

               

               
                    
                    

            </div>
           

        </div>
       
        <div class="modal fade" id="addStudent">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-head">
                        
                    </div>
                    <div class="modal-body">
                        <h3>Staff Information</h3>
                        <form action="{{route('add_staff')}}" method="post">
                            {{csrf_field()}}
                           
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input type="text" name="id" class="form-control" placeholder="Staff ID" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="mname" class="form-control" placeholder="Middle Name" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1">@</span>
                                <input type="text" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" required="">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                 <label>Room</label>
                                <select name="role" required="">
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>

                               
                            </div>
                            
                            
                           
                            <div class="form-group">
                                <textarea class="form-control" placeholder="ADDRESS" name="address" required=""></textarea>
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
