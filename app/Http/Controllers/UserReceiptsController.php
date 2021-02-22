<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ReceiptRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Receipt;

class UserReceiptsController extends Controller
{
     public function index($id)
    {
       $this->data['user'] 	   = User::findOrFail($id);
    	return view('users.receipts.receipts', $this->data);	
    }
    
    public function __construct(){
    	$this->data['tab_menu'] = 'receipts';
    }


  public function store( ReceiptRequest  $request, $user_id)
  {
  	    $formdata                = $request->all();
        $formdata['user_id']     = $user_id;

      if(Receipt::create($formdata)){

      	 Session::flash('message', 'Receipt Added Successfully');
      }

      return redirect()->route('user.receipts',['id' => $user_id]);
  }

  public function destroy($user_id , $payment_id)
  {
  	  
  	  if(Receipt::destroy($payment_id)){

      	 Session::flash('message', 'Receipt Delete Successfully');
      }
      return redirect()->route('user.receipts',['id' => $user_id]);
  }

}