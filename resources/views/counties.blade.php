@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.nav')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>County List</h2>
                  </div>
                  <div class="pull-right">
                      <a class="btn btn-success" href="{{ route('county.create') }}"> Create New County</a>
                  </div>
              </div>
          </div>
   
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered" id="myTable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>County Name</th>
                     <th>States Initials</th>
                     <th>State Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                @foreach ($County as $uData)
                  <tr>
                     <td>{{ $uData->id }}</td>
                     <td>{{ $uData->county_name }}</td>
                     <td>{{ $uData->state_initial }}</td>
                     <td>{{ $uData->state_fullname }}</td>
                     <td>
                      <form action="{{ route('county.destroy',$uData->id) }}" method="POST">
                          <a class="btn btn-primary" href="{{ route('county.edit',$uData->id) }}">Edit</a>
                          <!-- SUPPORT ABOVE VERSION 5.5 -->
                          {{-- @csrf
                          @method('DELETE') --}} 
                          
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
            
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
            </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
