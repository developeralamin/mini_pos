@extends('users.user_layout')

@section('user_content')


   <div class="card shadow mb-4">

      <div class="card-header py-3">
          
      </div>

<div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{ $user->name }}</strong></h6>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Challen No</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th class="text-right">Actions</th>
                                           
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Challen No</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </tfoot>
                                       
                 <tbody>
@foreach($user->sales as $sale)
       <tr>
          <td>{{ $sale->challan_no }}</td>
          <td>{{ $user->name}}</td>
          <td>{{ $sale->date }}</td>
          <td>100</td>
          <td class="text-right">

<form method='post' action="{{ route('users.destroy',['user'=> $user->id]) }}">
   <a href="{{ route('user.sales.invoice_details',['id'=> $user->id,'invoice_id'=>$sale->id]) }}"class="btn btn-info">
      <i class="fa fa-eye"></i>
     </a>    
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

@stop