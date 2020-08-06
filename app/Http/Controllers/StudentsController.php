<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Students;
use App\Imports\StudentImport;
use Excel;

class StudentsController extends Controller
{
	public function show_students(Request $rq){
        $search = $rq->search;
    	$array_list = Students::where('last_name','like',"%$search%")->paginate(15);
        return view('Students.show_students',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
    public function view_insert_students(){
    	return view('students.view_insert_students');
    }
    public function process_insert_students(Request $rq){
    	
        
        Students::create($rq->all()); 

    	return redirect()->route('students.show_students');

    }
    public function view_insert_students_excel(){
        return view('students.view_insert_students_excel');
    }
    public function process_insert_students_excel(Request $rq){
          Excel::import(new StudentImport, $rq->file('excel_student')->path());
          return redirect()->route('students.show_students');

    }
    public function delete($id)
    {


        Students::find($id)->delete();
    	return redirect()->route('students.show_students');

    }
    public function view_update_students($id){
    	
        $students= Students::find($id);
    	return view('students.view_update_students',[
    		'students'=> $students,
    	]);

    }
    public function process_update_students(Request $rq,$id){
        $name    = $rq->name;
        $date    = $rq->date;
        $address = $rq->address;
        $gender  = $rq->gender;
        // $email   = $rq->email;
        $phone   = $rq->phone;
        
        $password = $rq->password;
    	DB::table('students')->where('id',$id)->update([
    		'name'=> $name,
    		'date'=> $date,
    		'address'=> $address,
    		'gender'=> $gender,
            // 'email' => $email,
            'phone' => $phone,
           
            'password' => $password,
    	]);
        // SinhVienLop::find($id)->update($rq->all());
       
    	return redirect()->route('students.show_students');
    }
}
