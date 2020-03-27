



	    		  @extends('layout.master')


 @section('title')

New 
 @endsection


 @section('content')

 



 <div class="box">
            <div class="box-header">

                    @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif
         <div class="box-body table-responsive no-padding">

         <a href="addnotification" class="btn btn-sm btn-default pull-right">Add New</a>
              <table class="table table-hover">
               
               
                <tr>
                    <th>Category</th>   
  <th>For_user_id</th>   
  <th>Message</th>   
 
                                    <th>Action</th>
                </tr>

    @foreach ($allnotification as $allnotification_col )
        
  

                <tr>
                   <td>{{$allnotification_col->category}}</td>  
<td>{{$allnotification_col->for_user_id}}</td>  
<td>{{$allnotification_col->message}}</td>  



                  <td>
                       <button  data-toggle="modal" data-target="#modal-default_view{{$allnotification_col->id}}" class="btn btn-sm btn-default">
                       <i class="glyphicon glyphicon-eye-open"></i> </button>
               
                    <button  data-toggle="modal" data-target="#modal-default{{$allnotification_col->id}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i> </button>
                  
                      <form style="display:inline;" action="{{ route('user.deletenotification')}}" method="post" onsubmit="return validate(this);">
                                        {{csrf_field()}}
                                        <input type="hidden" name="notification_id" value="{{$allnotification_col->id}}" />
                                        <button type="submit" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
  
 
     <div class="modal fade" id="modal-default{{$allnotification_col->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">


     <form action="{{route('action.updatenotification')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">
 
        <input type="hidden" name="notification_id" value="{{$allnotification_col->id}}" />

                {{csrf_field()}}

         
                <div class="form-group col-md-6">
                  <label for="f11">Category</label>
                  <input type="text" class="form-control" id="f111" name="category" value="{{$allnotification_col->category}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f12">For_user_id</label>
                  <input type="text" class="form-control" id="f112" name="for_user_id" value="{{$allnotification_col->for_user_id}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f13">Message</label>
                  <input type="text" class="form-control" id="f113" name="message" value="{{$allnotification_col->message}}" >
                </div>
              
       
              </div>
              <!-- /.box-body -->

              <div class="box-footer  clearfix text-center">
               </div>
               
              
              
              
              
              </div>




              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>

                  </form>  
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
              
              
              
              
               <div class="modal fade" id="modal-default_view{{$allnotification_col->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View</h4>
              </div>
              <div class="modal-body">


               <div class="box-body table-responsive">

<table class="table table-bordered table-condensed table-hover ">
 
 
<tr>
<th> Category: </th>   

<td> 
 {{$allnotification_col->category}}

 </td>

</tr>

 
<tr>
<th> For_user_id: </th>   

<td> 
 {{$allnotification_col->for_user_id}}

 </td>

</tr>

 
<tr>
<th> Message: </th>   

<td> 
 {{$allnotification_col->message}}

 </td>

</tr>


 
</table>

              
             
              
               
       
              </div>
              <!-- /.box-body -->

              <div class="box-footer  clearfix text-center">
               </div>
               
              
              
              
              
              </div>




              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
 
               </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
              
              
              
              
              
              
              
                  </td>
                 </tr>
            @endforeach
              </table>
            </div>



            <div class="text-center">
    {!! $allnotification->render() !!}
            </div>

            </div>
            </div>

 

 @endsection

@section('scripts')
<script>
function validate(form, dis) {

    // validation code here ...

   if(confirm("Do you really want to do this?"))
    dis.submit();
  else
    return false;
 }

 function prev(id)
 {
 
     $("#pre"+id).hide();

 }
</script>
@endsection



	    