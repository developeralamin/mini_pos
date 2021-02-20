<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserPurchasesController extends Controller
{
    public function index($id)
    {
       $this->data['user'] 	   = User::findOrFail($id);
    	return view('users.purchases.purchases', $this->data);	
    }
    
    public function __construct(){
    	$this->data['tab_menu'] = 'purchase';
    }
}
