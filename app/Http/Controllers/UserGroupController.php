<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Group;

class UserGroupController extends Controller
{
    public function index()
    {
    	$this->data['groups'] = Group::all();

    	return view('groups.groups', $this->data);
    }

	 public function create()
	 {
	 	return view('groups.create');
	 }

	 public function store(Request $request)

	 {   
	    $request->validate([
            'title' => 'required|string'
	     ]);

	 	 $formdata = $request->all();
         if(Group::create($formdata)){
         	Session::flash('message', 'Group Added Successfully');
         }
         return redirect()->to('groups');
	 }

    public function destroy($id)
    {
    	if(Group::find($id)->delete())  {
    		Session::flash('message', 'Group Deleted Successfully');
    	}
    	return redirect()->to('groups');
    }
}
