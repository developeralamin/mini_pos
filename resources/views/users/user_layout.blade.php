@extends('layout.main')

@section('main_content')


  <div class="row page-header ">

     <div class="col-md-6">
       <a href="{{ route('users.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back</a>
     </div>

     <div class="col-md-6 text-right">

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newrsale">
          <i class="fa fa-plus"></i> New Sale
        </button>

                
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newpurchase">
          <i class="fa fa-plus"></i> New Purchase
        </button>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newpayment">
           <i class="fa fa-plus"></i> New Payment
        </button>


        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newreceipt">
           <i class="fa fa-plus"></i> New Receipt
        </button>
     
 </div>
      
  </div>


@include('users.user_layout_content')


@stop