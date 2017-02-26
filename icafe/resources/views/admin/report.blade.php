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

   <script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

<style type="text/css">
    #txt{
        font-size: 48px;
    }
</style>

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
                   	<li>
                        <a href="{{route('admin-pc')}}"><i class="fa fa-fw fa-dashboard"></i> PC</a>
                    </li>
                    <li class="active">
                    	<a href="{{route('admin_report')}}"><i class="fa fa-fw fa-dashboard"></i> Reports</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">

            <div>
                <h2>Admin Reports</h2>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>List of Reports</h3>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <select name="sort">
                                <option>Daily</option>
                                <option>Weekly</option>
                                <option>Yearly</option>
                            </select>
                            <button type="button">Submit</button>
                        </div>

                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Dept</th>
                                <th>Room</th>
                                <th>PC</th>
                                <th>LastName</th>
                                <th>FirstName</th>
                                <th>MiddleName</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                         <tbody>
                            @if($reports->count())
                                    @foreach($reports as $report)
                                      
                                            <tr>
                                               <td>{{$report->student->college}}</td>
                                               <td>{{$report->staff->role_id}}</td>
                                               <td>{{$report->computer_id}}</td>
                                                <td>{{$report->student->lname}}</td>
                                                <td>{{$report->student->fname}}</td>
                                                <td>{{$report->student->mname}}</td>
                                                <td>{{$report->start}}</td>
                                                <td>{{$report->end}}</td>
                                                <td>{{$report->created_at->toDayDateTimeString()}}</td>
                                           </tr>
                                     
                                    @endforeach
                                @endif
                        </tbody>
                    </table>
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
