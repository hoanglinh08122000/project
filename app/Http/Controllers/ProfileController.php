<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller {
	// login students
   
	public function show_profile(Request $rq) {
        $admin = Admin::get();
        $students = Students::get();
        $teacher = Teacher::get();

			return view('profile.show_profile',[
            'admin'=> $admin,
            'students'=> $students,
            'teacher'=> $teacher,
        ]);
	}

	// login admin
	public function view_change_password_profile() {
		return view('profile.view_change_password_profile');
	}
	public function process_change_password_profile(Request $rq,$id) {
		$password   = $rq->password;
        $new_password = $rq->new_password;
        if (isset($teacher) && Hash::check($rq->password, Session::get('password')){
        DB::table('teacher')->where('id',Session::get('id'))->update([
			'password' => Hash::make($rq->new_password),
		]);
			return redirect()->route('profile.show_profile');
		}
		elseif (isset($admin) && Hash::check($rq->password, Session::get('password')){
		DB::table('admin')->where('id',Session::get('id'))->update([
			$password -> Hash::make($rq->new_password),
		]);
			return redirect()->route('profile.show_profile');
		}

	}

	// login teacher
	
}
