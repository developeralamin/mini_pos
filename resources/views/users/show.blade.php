@extends('users.user_layout')

@section('user_content')


   <div class="card shadow mb-4">

      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User <strong>{{ $user->name }}'s</strong> Information</h6>
      </div>

  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <table class="table table-borderless table-striped table-hover mt-4">

              <tr>
                <th class="text-right">Group : </th>
                <td>{{ $user->group->title }}</td>
              </tr>

              <tr>
                <th class="text-right">Name : </th>
                <td>{{ $user->name }}</td>
              </tr>

              <tr>
                <th class="text-right">Email : </th>
                <td>{{ $user->email }}</td>
              </tr>

              <tr>
                <th class="text-right">Phone : </th>
                <td>{{ $user->phone }}</td>
              </tr>

              <tr>
                <th class="text-right">Address : </th>
                <td>{{ $user->address }}</td>
              </tr>

          </table>
        </div>
      </div>
   </div>


 </div>



@stop