<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function index_admin(Request $rq){
        $search = $rq->search;
        $array_list = Admin::where('last_name','like',"%$search%")->paginate(10);
        return view('admin.index_admin',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
    public function show_admin(Request $rq){
        $search = $rq->search;
    	$array_list = Admin::where('last_name','like',"%$search%")->paginate(10);
        return view('admin.show_admin',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
}
