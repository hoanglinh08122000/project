<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Discipline;
use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Listpoint;
use App\Models\Students;

class ListpointController extends Controller
{
	public function show_listpoint(){
		$courses=Course::get();
		$disciplines=Discipline::get();
		$classs=Classs::get();
		$subjects=Subject::get();
		$teachers=Teacher::get();
		$students=Students::get();

		return view('listpoint.show_listpoint',[
			'courses'=> $courses,
			'disciplines'=> $disciplines,
			'classs'=> $classs,
			'subjects' => $subjects,
			'students' => $students,
			'teachers' => $teachers
		]);

	}

	public function process_listpoint(){
		$courses=Course::get();
		$disciplines=Discipline::get();
		$classs=Classs::get();
		$subjects=Subject::get();
		$teachers=Teacher::get();

		return view('listpoint.process_listpoint',[
			'courses'=> $courses,
			'disciplines'=> $disciplines,
			'classs'=> $classs,
			'subjects' => $subjects,
			'teachers' => $teachers
		]);

	}
}
