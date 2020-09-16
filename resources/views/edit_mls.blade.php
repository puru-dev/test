@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="pull-left">
            <h2>{{@$mls->id?'Edit':'Add'}} Mls</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('mls.index') }}"> Back</a>
            <a class="btn btn-primary" href="{{ route('mls.create') }}"> Add Mls</a>
        </div>
    </div>
</div>
   
<div class="alert alert-danger" style="display:none"></div>
<div class="alert alert-success" style="display:none"></div>
    @method('PUT')
    {{ csrf_field() }}
  
     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Mls Name:</strong>
                <input type="text" name="mls_name" value="{{@$mls->mls_name}}" id="mls_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
              <label for="sel2">State list:</label>
              <select class="form-control" id="sel2" name="state_initial">
                <option value="">Please Select States</option>
                @foreach ($states as $uData)
                <option {{ ( @$mls->state_initial == $uData->state_initial) ? 'selected' : '' }}>{{$uData->state_initial}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
              <label for="sel1">County list:</label>
              <select class="form-control selectpicker" multiple data-live-search="true" id="sel1" name="counties[]">
                @if(@$mls->id){
                @foreach ($counties as $uData1)
                <option  <?php if (@in_array($uData1->county_name, @$mls_counties)) { echo "selected"; } ?>>{{$uData1->county_name}}</option>
                @endforeach
                @endif
              </select>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                <button type="submit" id="update_data" value="{{ @$mls->id }}" class="btn btn-primary">Submit</button>
        </div>
    </div>
<script>
$(document).ready(function(){
$(document).on("click", "#update_data", function() { 
   var url = "{{@$mls->id?URL('mls/'.@$mls->id):URL('/mls')}}";
   var type = "{{@$mls->id?'PATCH':'POST'}}";
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
    $.ajax({
        url: url,
        type: type,
        cache: false,
        data:{
            mls_name: $('#mls_name').val(),
            state_initial: $('#sel2').val(),
            counties: $('#sel1').val()
        },
        success: function(data){
            if (data.errors) {
            jQuery('.alert-danger').empty();
           jQuery.each(data.errors, function(key, value){
                jQuery('.alert-success').hide();
                jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p>'+value+'</p>');
            });
       }else{
            jQuery('.alert-danger').hide();
            jQuery('.alert-success').show();
            jQuery('.alert-success').append('<p>'+data.success+'</p>');
       }
    }
        });

    }); 

});

</script> 
<script type="text/javascript">
    $('#sel2').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-counties')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#sel1").empty();
                $.each(res,function(key,value){
                    $("#sel1").append('<option value="'+value+'">'+value+'</option>');
                });
                $("#sel1").selectpicker('refresh');
           
            }else{
               $("#sel1").empty();
               $("#sel1").selectpicker('refresh');
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>    
<!-- </form> -->
</div>
@endsection