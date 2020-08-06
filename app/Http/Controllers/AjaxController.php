<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Classs;

class AjaxController extends Controller
{
    public function assignment_teacher(Request $rq){
    	$id = $rq->get('id');
    	$array_subject= Subject::where('id_discipline',$id)->get();

    	return $array_subject;
    }
    public function assignment_teacher_course_class(Request $rq){
    	$id = $rq->get('id');
    	$array_class= Classs::where('id_course',$id)->get();

    	return $array_class;
    }
}
