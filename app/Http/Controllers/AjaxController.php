<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\Subject;
use App\Models\Classs;
use App\Models\Teacher;
use App\Models\Students;

class AjaxController extends Controller
{
    public function assignment_teacher(Request $rq){
    	$id = $rq->get('id');
    	$array_subject= Subject::where('id_discipline',$id)->get();

    	return $array_subject;
    }
    public function assignment_teacher_course_class(Request $rq){
    	$id = $rq->get('id');
    	$array_class= Classs::where('id_discipline',$id)->get();

    	return $array_class;
    }
    public function select_subject(Request $rq){
        $id = $rq->get('id');
        $array_subject= Subject::where('id_discipline',$id)->get();

        return $array_subject;
    }
    public function select_class(Request $rq){
        $id = $rq->get('id');
        $array_class= Classs::where('id_discipline',$id)->get();

        return $array_class;
    }
    public function show_students(Request $rq){
        $id = $rq->get('id');
        $array_students= Students::where('id_discipline',$id)->get();

        return $array_students;
    }
    // public function show_id(Request $rq){
    //     $id = $rq->get('id');
    //     $array_students= Students::where('id_discipline',$id)->get();

    //     return $array_students;
    // }


}
