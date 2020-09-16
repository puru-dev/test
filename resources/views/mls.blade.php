@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.nav')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>Mls List</h2>
                  </div>
                  <div class="pull-right">
                      <a class="btn btn-success" href="{{ route('mls.create') }}"> Create New Mls</a>
                  </div>
              </div>
          </div>
            <div class="alert alert-success" style="display:none"></div>
            <table class="table table-bordered" id="myTable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Mls Name</th>
                     <th>States Initials</th>
                     <th>Counties</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody id="bodyData">
                @foreach ($Mls as $uData)
                  <tr>
                     <td>{{ $uData->id }}</td>
                     <td>{{ $uData->mls_name }}</td>
                     <td>{{ $uData->state_initial }}</td>
                     <?php $counties = json_decode($uData->counties, true); ?>
                     <td>{{implode(',', $counties)}}</td>
                     <td>
                      <!-- <form action="{{ route('mls.destroy',$uData->id) }}" method="POST"> -->
                          <a class="btn btn-primary" href="{{ route('mls.edit',$uData->id) }}">Edit</a>
                          <!-- SUPPORT ABOVE VERSION 5.5 -->
                          {{-- @csrf
                          @method('DELETE') --}} 
                          
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
            
                          <button  type="submit" class="btn btn-danger delete" value='{{$uData->id}}'>Delete</button>
                      <!-- </form> -->
            </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>

        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).on("click", ".delete", function() { 
        var $ele = $(this).parent().parent();
        var id= $(this).val();
        var url = "{{URL('mls')}}";
        var dltUrl = url+"/"+id;
    $.ajax({
      url: dltUrl,
      type: "DELETE",
      cache: false,
      data:{
        _token:'{{ csrf_token() }}'
      },
      cache: false,
      dataType: 'json',
      success: function(dataResult){
        var resultData = dataResult.data;
        $("#bodyData").html("");
        var bodyData = '';
        var i=1;
        $.each(resultData,function(index,row){
            var editUrl = url+'/'+row.id+"/edit";
            var id=row.id--;
            const object = JSON.parse(row.counties);
            const counties = object.join();
            bodyData+="<tr>"
            bodyData+="<td>"+row.id+"</td><td>"+row.mls_name+"</td><td>"+row.state_initial+"</td><td>"+counties+"</td>"
            +"<td><a class='btn btn-primary' href='"+editUrl+"'>Edit</a>"
            +"<button class='btn btn-danger delete' value='"+id+"' style='margin-left:20px;'>Delete</button></td>";
            bodyData+="</tr>";
        })
        $("#bodyData").append(bodyData);
        jQuery('.alert-success').show();
        jQuery('.alert-success').append('<p>Record Deleted Successfully</p>');
      }
    });
  });
</script>
@endsection
