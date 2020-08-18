<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Discipline;
use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;


class AssignmentController extends Controller
{
	public function assignment_teacher(){
		$courses=Course::get();
		$disciplines=Discipline::get();
		$classs=Classs::get();
		$subjects=Subject::get();
		$teachers=Teacher::get();

		return view('assignment.assignment_teacher',[
			'courses'=> $courses,
			'disciplines'=> $disciplines,
			'classs'=> $classs,
			'subjects' => $subjects,
			'teachers' => $teachers
		]);

	}
}
