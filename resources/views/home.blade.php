@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.nav')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>States List</h2>
            <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>States Initials</th>
                     <th>State Name</th>
                  </tr>
               </thead>
            </table>

        </div>
    </div>
</div>
@endsection
