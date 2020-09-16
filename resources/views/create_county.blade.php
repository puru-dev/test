@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="pull-left">
            <h2>Add County</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('county.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('county.store') }}" method="POST">
    {{ csrf_field() }}
  
     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>County Name:</strong>
                <input type="text" name="county_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
              <label for="sel2">State list:</label>
              <select class="form-control" id="sel2" name="state_initial">
                @foreach ($states as $uData)
                <option>{{$uData->state_initial}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
              <label for="sel1">State list:</label>
              <select class="form-control" id="sel1" name="state_fullname">
                @foreach ($states as $uData)
                <option>{{$uData->state_fullname}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
@endsection