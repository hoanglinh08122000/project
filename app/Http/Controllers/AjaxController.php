<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\Subject;

class AjaxController extends Controller
{
    public function assignment_teacher(Request $rq){
    	$id = $rq->get('id');
    	$array_subject= Subject::where('id_discipline',$id)->get();

    	return $array_subject;
    }
}
