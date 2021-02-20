@extends('users.user_layout')

@section('user_content')


   <div class="card shadow mb-4">


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <div class="card-header py-3">
          
      </div>

<div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Payments of <strong>{{ $user->name }}</strong></h6>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Total</th>
                                                <th>Date</th>
                                                <th>Note</th>
                                                <th class="text-right">Actions</th>
                                           
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="" class="mr-4">Total:</th>
                                                <th>{{ $user->payments()->sum('amount') }}</th>
                                               <th colspan="">Date</th>
                                               <th colspan="">Note</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </tfoot>
                                       
                 <tbody>
@foreach($user->payments as $payment)
       <tr>
          <td>{{ $user->name}}</td>
          <td>{{ $payment->amount }}</td>
          <td>{{ $payment->date }}</td>
          <td>{{ $payment->note }}</td>
          <td class="text-right">

<form method='post' action="{{ route('user.payments.destroy',['id'=> $user->id, 'payments_id' => $payment->id]) }}"> 
      @csrf
      @method('DELETE')               
     <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>                 
</form>
                                           
   </td>
  </tr>
 @endforeach

       </tbody>
   </table>
   </div>
  </div>
 </div>


 </div>

<!-----Modal for payments----->

<div class="modal fade" id="newpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.payments.store',$user->id],'method' => 'post']) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


    <div class="mb-3 row">
      <label for="Name" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
       <div class="col-sm-10">
      {{ Form::text('amount',NULL,['class '=>'form-control', 'required','id' => 'name','placeholder' => 'Amount']) }}
      </div>
    </div>


      <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::date('date',NULL,['class '=>'form-control','required','id' => 'date','placeholder' => 'Date']) }}        
        </div>
      </div>

      <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Date</label>
         <div class="col-sm-10">
          {{ Form::textarea('note',NULL,['class '=>'form-control','id' => 'note','rows' => '3','placeholder' => 'Note']) }}        
        </div>
      </div>


       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

{!! Form::close() !!}

    </div>
  </div>


</div>





@stop

