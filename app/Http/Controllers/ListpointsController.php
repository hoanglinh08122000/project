<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Students;
use App\Models\Discipline;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Classs;

class ListpointsController extends Controller
{
    public function view_listpoints(){
		$courses=Course::get();
		$disciplines=Discipline::get();
		$classs=Classs::get();
		$subjects=Subject::get();
		$teachers=Teacher::get();

		return view('listpoints.view_listpoints',[
			'courses'=> $courses,
			'disciplines'=> $disciplines,
			'classs'=> $classs,
			'subjects' => $subjects,
			'teachers' => $teachers
		]);
	}

}
