@extends('layout.main')

@section('main_content')


  <div class="row page-header ">

     <div class="col-md-6">
       <a href="{{ route('users.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back</a>
     </div>

     <div class="col-md-6 text-right">
      <a href="{{ url('users/create') }}" class="btn btn-info"> <i class="fa fa-plus"></i> New Sale</a>

        
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newpurchase">
  <i class="fa fa-plus"></i> New Purchase
</button>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newpayment">
   <i class="fa fa-plus"></i> New Payment
</button>

      <a href="{{ url('users/create') }}" class="btn btn-info"> <i class="fa fa-plus"></i> New Receipt</a>
     </div>
      
  </div>


<div class="row clearfix user_page_builder">

<div class="col-md-2">

<div class="nav flex-column nav-pills">
<a class="nav-link @if($tab_menu == 'user_info') active @endif" href="{{route('users.show', $user->id)}}">User Info</a>
  <a class="nav-link @if($tab_menu == 'sales') active @endif" href="{{ route('user.sales',$user->id) }}">Sales</a>
  <a class="nav-link  @if($tab_menu == 'purchase') active @endif" href="{{ route('user.purchases',$user->id) }}">Purchase</a>
  <a class="nav-link @if($tab_menu == 'payments') active @endif" href="{{ route('user.payments',$user->id) }}">Payments</a>
  <a class="nav-link @if($tab_menu == 'receipts') active @endif" href="{{ route('user.receipts',$user->id) }}">Receipts</a>
</div>
     
</div>


<div class="col-md-10">
   
  @yield('user_content')


</div>

</div>



@stop