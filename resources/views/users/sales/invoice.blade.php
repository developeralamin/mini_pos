@extends('users.user_layout')

@section('user_content')


   <div class="card shadow mb-4">

      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sale Invoice Details</h6>
      </div>

  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <p><strong>Customer:</strong> {{ $user->name }}</p>
          <p><strong>Email:</strong>{{ $user->email }}</p>
          <p><strong>Phone:</strong>{{ $user->phone }}</p>
        </div>
         <div class="col-md-6">
            <p><strong>Date:</strong> {{ $invoice->date }}</p>
            <p><strong>Challan No:</strong> {{ $invoice->challan_no }}</p>

        </div>
      </div>
   </div>


 </div>



@stop