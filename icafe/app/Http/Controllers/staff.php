<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\computer;
use App\student_log;
use App\Student;

class staff extends Controller
{
	public function accoutChecker(){
		if(Auth::check()){
			if(Auth::user()->role->name == 'admin'  ){
				Auth::logout();
				return redirect('/');
			}
		}else{
			return redirect('/');
		}
		
	}
    public function index(){
    	if($this->accoutChecker()){
    		return $this->accoutChecker();
    	}
         $pcs = Computer::all();
         $logs = student_log::where('status', 0)->get();
    	return view('staff.main', compact('pcs', 'logs'));
    }

    public function staff_login(){
    	if($this->accoutChecker()){
    		return $this->accoutChecker();
    	}
        $pcs = Computer::where('status', 0)->get();
    	return view('staff.login', compact('pcs'));
    }
     public function staff_logout(){
    	if($this->accoutChecker()){
    		return $this->accoutChecker();
    	}
    	return view('staff.logout');
    }
    public function change_password(){
        return view('staff.change_password');
    }
    public function check_balance(){
        return view('staff.check_balance');
    }
    public function staff_report(){
        $reports = student_log::where('end', '!=', 0)->get();
        return view('staff.report',compact('reports'));
    }
    public function login_student(Request $request){
        $find = Student::where('barcode', $request['barcode'])->first();
        if(!$find){
            return 'Student Not Found!!';
        }
        $check = student_log::where('student_id', $request['barcode'])->where('status', 0)->first();
        if($check){
            return 'Sorry, But you already have login. Please Logout first.';
        }
       
        $log = new student_log;
        $log->staff_id = Auth::id();
        $log->student_id = $request['barcode'];
        $log->computer_id = $request['computer_id'];
        $log->start = date("H:i:s");
        $log->end = 0;
        $log->status = 0;
        $log->save();

        $pc_update = Computer::find($request['computer_id'])->where('room', Auth::user()->role_id)->update(['status'=> true]);
        $args = array('info'=> 'Student Login successfullly!!');
        return redirect()->back()->with($args);
    }

    public function logout_student(Request $request){
        $find = student_log::where('student_id', $request['barcode'])->where('status', 0)->first();
        if(!$find){
            return 'You are not currently Login , Please Login First!!';
        }
        $computer = Computer::where('id', $find->computer_id)->update(['status'=> false]);
        
        if($computer){

            
            $find->update(['end'=> date("H:i:s")]);
            $aw = $find->start;
            $aw2 = $find->end;
            $date1=date_create($aw);
            $date2=date_create($aw2);
            $diff=date_diff($date1,$date2);
             $h = $diff->format("%h") * 3600;
            $m =  $diff->format("%i") * 60;
            $s = $diff->format("%s");
            $f = $h + $m + $s;
           
           
            $student = Student::where('barcode', $find->student_id)->first();
            $new_time = $student->time->time - $f;
            $student->time->update(['time'=> $new_time]);
            $find->update(['status'=> 1]);
            $args = array('info'=> 'Student Logout successfullly!!');
        return redirect()->back()->with($args);


        }
        
       
    }







}
