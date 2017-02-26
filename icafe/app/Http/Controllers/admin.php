<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\Computer;
use App\Spec;
use App\User;
use App\student_log;
use App\student_time;
class admin extends Controller
{
	public function accoutChecker(){
        if(Auth::check()){
            if(Auth::user()->role->name != 'admin'){
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
        $student_num = Student::count();
        $pc_num = Computer::count();
        $online = Computer::where('status', 1)->count();
    	return view('admin.main', compact('pcs' ,'student_num', 'pc_num', 'online'));
    }

    public function student(){
        if($this->accoutChecker()){
            return $this->accoutChecker();
        }
        $students = Student::paginate(10);
    	return view('admin.student', compact('students'));
    }
    public function pc(){
        if($this->accoutChecker()){
            return $this->accoutChecker();
        }
        $logs = student_log::where('status', 0)->get();
        $pcs = Computer::all();
    	return view('admin.pc', compact('pcs', 'logs'));
    }
    public function studentCheck(Request $request){
        $this->validate($request,[
            'barcode' => 'required',
            'student_id' => 'required',
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'campus' => 'required',
            'college' => 'required',
            'year' => 'required',
            'address' => 'required',
            'profile' => 'required'
            

            ]);
        $file = $request['profile'];
        $name = $file->getClientOriginalName();
        $file->move('images', $name);
        
        $student = new Student;
        $student->barcode = $request['barcode'];
        $student->student_id = $request['student_id'];
        $student->lname = $request['lname'];
        $student->fname = $request['fname'];
        $student->mname = $request['mname'];
        $student->gender = $request['gender'];
        $student->address = $request['address'];
        $student->email = $request['email'];
        $student->campus = $request['campus'];
        $student->college = $request['college'];
        $student->year = $request['year'];
        $student->password = bcrypt($request['student_id']);
        $student->profile_path = $name;
        $student->save();

        $student = Student::where('student_id', $student->student_id)->first();
        $time = new student_time;
        $time->time = 1080000;
        $student->time()->save($time);

        $added = array('added'=> 'Added Student Successfully.!!');
        return redirect()->back()->with($added);

    }

    public function addPc(Request $request){
        $this->validate($request, [
            'pc' => 'required', 
            'room'=> 'required',
            'cpu' => 'required', 
            'motherboard' => 'required', 
            'ram' => 'required', 
            'hdd' => 'required', 
            'keyboard' => 'required', 
            'mouse' => 'required'

            ]);

        $pc = new Computer;
        $pc->id = $request['pc'];
        $pc->room = $request['room'];
        $pc->status = 0;
        $pc->save();

        
        $specs = new Spec;
        $specs->computer_id = $request['pc'];
        $specs->processor = $request['cpu'];
        $specs->motherboard = $request['motherboard'];
        $specs->ram  = $request['ram'];
        $specs->hdd  = $request['hdd'];
        $specs->keyboard = $request['keyboard'];
        $specs->mouse = $request['mouse'];
        $specs->save();

        $added = array('added'=> 'Added PC Successfully.!!');
        return redirect()->back()->with($added);
    }

    public function admin_staff(){
        $staffs = User::where('role_id','!=', 1)->get();
        return view('admin.staff', compact('staffs'));
    }
    public function add_staff(Request $request){
        $this->validate($request, [
            'id' => 'required|unique:users',
            'lname' => 'required|min:2',
            'fname' => 'required|min:2|max:30',
            'mname' => 'required|min:2|max:30',
            'email' => 'required|max:50',
            'gender' => 'required|max:10',
            'address' => 'required|max:200',
            'role'=> 'required'
        ]);

        $user = new User;
        $user->id = $request['id'];
        $user->l_name = $request['lname'];
        $user->f_name = $request['fname'];
        $user->m_name = $request['mname'];
        $user->gender = $request['gender'];
        $user->address = $request['address'];
        $user->email  = $request['email'];
        $user->password = bcrypt('staff');
        $user->role_id = $request['role'];
        $user->save();

        $args = array('staff'=> 'Staff Successfully Added!!');
        return redirect()->back()->with($args);

    }

    public function student_info($student_id){
        $student = student::where('student_id', $student_id)->first();
        if(!$student){
            return 'Sorry We can not find any student information in that ID';
        }
        return view('admin.student_info', compact('student'));
    }

    public function pc_info($pc_id){
        $pc = Computer::where('id', $pc_id)->first();
        if(!$pc){
            return 'There is no equivalent PC in that Number, Sorry!!';
        }
       return view('admin.pc_info', compact('pc'));
    }

    public function admin_report(){
        $reports = student_log::all();
        return view('admin.report', compact('reports'));
    }
    public function room_delete($room_id){
        Computer::where('id', $room_id)->delete();
        $specs = Spec::where('computer_id', $room_id)->delete();
        if($specs){
            $args = array('info'=>'PC has been deleted!!');
            return redirect()->back()->with($args);
        }
    }
    public function student_delete($student_id){
        $student = student::where('student_id', $student_id)->delete();
        if($student){
            $args = array('info'=> 'Student has been deleted!!');
            return redirect()->back()->with($args);
        }
    }
    public function staff_delete($staff_id){
        $staff = staff::where('id', $staff_id)->delete();
        if($staff){
            $args = array('info'=> 'Staff has been deleted');
            return redirect()->back()->with($args);
        }
    }


}
