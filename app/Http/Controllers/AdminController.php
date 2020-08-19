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
    public function view_change_password_admin($id){
        
        $admin= Admin::find($id);
        return view('admin.view_change_password_admin',[
            'admin'=> $admin,
        ]);

    }
    public function process_change_password_admin(AdminRequest $request,$id)
    {
        $password = $rq->password;
        DB::table('admin')->where('id',$id)->update([
           
            'password' => $password,
        ]);

       
        return redirect()->route('admin.show_admin');
    }
}
