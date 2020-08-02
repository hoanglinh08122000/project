<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Discipline;
use DB;
use App\Models\Course;
use App\Models\Classs;



class ClassController extends Controller
{
	public function index_class(Request $rq) {
		$search = $rq->search;
		$array_list = Classs::where('name', 'like', "%$search%")->paginate(10);
		return view('class.index_class',[
			'array_list' => $array_list,
			'search' => $search,

		]);
	}

	public function view_insert_class() {
		$courses = Course::get();
		$disciplines = Discipline::get();
		return view('class.view_insert_class', [
			'courses' => $courses,
			'disciplines' => $disciplines,
		]);
	}

	public function view_insert_class_under_student() {
		$courses = Course::get();
		$disciplines = Discipline::get();
		return view('class.view_insert_class_under_student', [
			'courses' => $courses,
			'disciplines' => $disciplines,
		]);
	}
	public function process_insert_class(Request $rq) {

		Classs::create($rq->all());

		return redirect()->route('class.index_class');

	}
	public function delete($id)
	{

		Classs::find($id)->delete();
		return redirect()->route('class.show_edit');

	}

	public function show_edit(Request $rq) {
		$search = $rq->search;
		$array_list = Classs::where('name', 'like', "%$search%")->paginate(10);
		return view('class.show_edit',[
			'array_list' => $array_list,
			'search' => $search,

		]);
	}
	public function view_update_class($id){

		$class= Classs::find($id);
		$disciplines = Discipline::all();
		$courses = Course::get();
		return view('class.view_update_class',[
			'courses'=> $courses,
			'class'=> $class,
			'disciplines' => $disciplines,

		]);

	}
	public function process_update_class(Request $rq,$id){
		$name    = $rq->name;
		
		$id_discipline=$rq->id_discipline;
		$id_course=$rq->id_course;
		DB::table('class')->where('id',$id)->update([
			'name'=> $name,
			
			'id_discipline'=> $id_discipline,
			'id_course' => $id_course,


		]);
	    // SinhVienLop::find($id)->update($rq->all());

		return redirect()->route('class.show_edit');
	}
}
