@extends('users.user_layout')

@section('user_content')


   <div class="card shadow mb-4">

      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sale Invoice Details</h6>
      </div>

  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <p><strong>Customer : </strong> {{ $user->name }}</p>
          <p><strong>Email : </strong>{{ $user->email }}</p>
          <p><strong>Phone : </strong>{{ $user->phone }}</p>
        </div>
         <div class="col-md-6 text-right">
            <p><strong>Date : </strong> {{ $invoice->date }}</p>
            <p><strong>Challan No : </strong> {{ $invoice->challan_no }}</p>

        </div>
      </div>
     
     <div class="sales_invoice">
        <table class="table">
          <thead>
             <th>SL</th>
             <th>Product</th>
             <th>Price</th>
             <th>Qty</th>
             <th>Total</th>
             <th class="text-right">Actions</th>
          </thead>

          <tbody>
            @foreach($invoice->items as $key =>$item)
             <tr>
               <td>{{ $key+1 }}</td>
               <td>{{ $item->product->title }}</td>
               <td>{{ $item->price }}</td>
               <td>{{ $item->quantity }}</td>
               <td>{{ $item->total }}</td>
              <td class="text-right">

    <form method='post' action="{{ route('user.sales.invoice.delete_item',
       ['id'=> $user->id,'invoice_id' =>$invoice->id,'item_id'=>$item->id]) }}">   
          @csrf
          @method('DELETE')               
         <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>                 
      </form>
                                           
   </td>
             </tr>
           @endforeach
          </tbody>

          <tfoot>
             <th></th>
             <th>
              <button data-toggle="modal" data-target="#newProduct" class="btn btn-info"><i class="fa fa-plus">Add Product</i></button> 
              <th>
             <th colspan="" class="text-right">Total =</th>
             <th>{{ $invoice->items()->sum('total') }}</th>
          </tfoot>

        </table>
     </div>






   </div>
    

    
 </div>



<!-----Modal for Sale----->

<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.sales.invoice.additem', ['id' => $user->id, 
    'invoice_id' => $invoice->id] ], 'method' => 'post' ]) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sale Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
    <div class="mb-2 row">
      <label for="product" class="col-sm-2 col-form-label">Product<span class="text-danger">*</span> </label>
       <div class="col-sm-10">
      {{  Form::select('product_id',$products,NULL,['class '=>'form-control','id' => 'product','placeholder' => 'Select Group']) }}
      </div>
    </div>

    <div class="mb-3 row">
      <label for="unit_price" class="col-sm-2 col-form-label">Unit Price<span class="text-danger">*</span></label>
       <div class="col-sm-10">
      {{ Form::text('price',NULL,['class '=>'form-control', 'required','id' => 'unit_price','placeholder' => 'Unit Price']) }}
      </div>
    </div>


      <div class="mb-3 row">
        <label for="quantity" class="col-sm-2 col-form-label">Quantity<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::text('quantity',NULL,['class '=>'form-control','required','id' => 'quantity','placeholder' => 'Quantity']) }}        
        </div>
      </div>

      <div class="mb-3 row">
        <label for="total" class="col-sm-2 col-form-label">Total<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::text('total',NULL,['class '=>'form-control','id' => 'total','rows' => '3','placeholder' => 'Total']) }}        
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