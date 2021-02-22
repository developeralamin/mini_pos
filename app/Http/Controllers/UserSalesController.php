<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SaleInvoice;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller

{
   public function __construct(){
       $this->data['tab_menu']    = 'sales';
   }
   
   public function index($id)
   {
    	$this->data['user'] 	   = User::findOrFail($id);
    	return view('users.sales.sales', $this->data);
   }


  public function createinvoice(InvoiceRequest $request, $user_id)
  {
  	  $formdata                 = $request->all();
  	  $formdata['user_id']      = $user_id;
  	  $formdata['admin_id']     = Auth::id();

  	  if(SaleInvoice::create($formdata)){
  	  	Session::flash('message','Sale Created Successfully');
  	  }

  	  return redirect()->route('user.sales',['id' => $user_id]);
  }
  

	 public function detialsinvoice($user_id,$invoice_id)
	 {
	 	 $this->data['user']          =  User::findOrFail($user_id);
	 	 $this->data['invoice']       =  SaleInvoice::findOrFail($invoice_id);

	 	 return view('users.sales.invoice',$this->data);
	 }



}