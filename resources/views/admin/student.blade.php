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
                    <li class="active">
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
                       <h1>Student's</h1>
                    </div>
                </div>
               

                <div class="row" >
                    <div class="col-lg-12">
                        
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
	                       		<h1>Students List</h1>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#addStudent"><i class="glyphicon glyphicon-retweet"></i> New Student</button>
	                       	</div>
	                       	<div class="panel-body">
	                       		<table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            
                                            
                                            <th>Year</th>
                                            <th>Operation</th>
                                        </tr>   
                                    </thead>  
                                    <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td><a href="{{route('student_info', ['student_id'=> $student->student_id])}}" class="badge">{{$student->student_id}}</a></td>
                                                <td>{{$student->lname}}</td>
                                                <td>{{$student->fname}}</td>
                                                <td>{{$student->mname}}</td>
                                                
                                               
                                                <td>{{$student->year}}</td>
                                                
                                                
                                                <td>
                                                    <a href="{{route('admin_edit_student', ['student_id'=> $student->student_id])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <a href="{{route('student_delete', ['student_id'=> $student->student_id])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody> 
                                </table>
                                <center>{{ $students->links() }}</center>
	                       	</div>
                       </div>

                      
                    </div>

                    <div class="col-lg-4">
                    	
                    </div>
                </div>
                
               

               

               
                    
                    

            </div>
           

        </div>
       
        <div class="modal fade" id="addStudent">
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
                        <button class="close" data-dismiss="modal" type="button">&copy;</button>
                    </div>
                    <div class="modal-body">
                        <h3>Student Information</h3>
                        <form action="{{route('studentCheck')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-qrcode"></i></span>
                                <input type="text" name="barcode" class="form-control" placeholder="Barcode" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input type="text" name="student_id" class="form-control" placeholder="Student ID" required="">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-camera"></i></span>
                                <input type="file" name="profile" class="form-control" required="">
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
                             <div class="input-group">
                                <span class="input-group-addon" id="addon1">@</span>
                                <input type="text" name="contact" class="form-control" placeholder="Contact" required="">
                            </div>
                             <div class="input-group">
                                <span class="input-group-addon" id="addon1">Date of Birth</span>
                                <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required="">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                
                                

                                 <label>Course</label>
                                <select name="course">
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSCS">BSCS</option>
                                   
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
