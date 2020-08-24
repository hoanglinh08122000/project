<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Students;
use App\Models\Teacher;
use Hash;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller {
	public function login() {
		return view('login.login2');
	}

	// login students
	public function login_student() {
		return view('login.login_student2');
	}
	public function process_login_student(Request $rq) {
		$student = Students::where('email', $rq->email)->first();
		if (isset($student) && Hash::check($rq->password, $student->password)) {
			Session::put('id', $student->id);
			Session::put('last_name', $student->last_name);
			Session::put('first_name', $student->first_name);
			Session::put('phone', $student->phone);
			Session::put('email', $student->email);
			Session::put('address', $student->address);
			Session::put('gender', $student->gender);
            Session::put('date', $student->date);
			Session::put('level', $student->level);
            Session::put('password', $student->password);
			return redirect()->route('index');

		} else {
			return redirect()->route('login')->with('error', 'Sai');
		}
	}

	// login admin
	public function login_admin() {
		return view('login.login_admin2');
	}
	public function process_login_admin(Request $rq) {
		$admin = Admin::where('email', $rq->email)->first();

		if (isset($admin)) {
			Session::put('id', $admin->id);
			Session::put('first_name', $admin->first_name);
			Session::put('last_name', $admin->last_name);
			Session::put('phone', $admin->phone);
			Session::put('email', $admin->email);
			Session::put('address', $admin->address);
			Session::put('gender', $admin->gender);
			Session::put('date', $admin->date);
			Session::put('level', $admin->level);
			Session::put('password', $admin->password);
			return redirect()->route('index');

		} else {
			return redirect()->route('login')->with('error', 'Sai');
		}
	}

	// login teacher
	public function login_teacher() {
		return view('login.login_teacher2');
	}
	public function process_login_teacher(Request $rq) {
		$teacher = Teacher::where('email', $rq->email)->first();

		if (isset($teacher) && Hash::check($rq->password, $teacher->password)) {
			Session::put('id', $teacher->id);
			Session::put('first_name', $teacher->first_name);
			Session::put('last_name', $teacher->last_name);
			Session::put('phone', $teacher->phone);
			Session::put('email', $teacher->email);
			Session::put('address', $teacher->address);
			Session::put('gender', $teacher->gender);
			Session::put('date', $teacher->date);
			Session::put('level', $teacher->level);
            Session::put('password', $teacher->password);
			return redirect()->route('index');

		} else {
			return view('login.login_teacher2')->with('error', 'Sai');;
		}
	}

	// log out
	public function logout() {
		Session::flush();

		return redirect()->route('login')->with('sussess', 'Bye');

	}

}
