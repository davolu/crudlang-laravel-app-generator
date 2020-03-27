



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

         <a href="addwallet" class="btn btn-sm btn-default pull-right">Add New</a>
              <table class="table table-hover">
               
               
                <tr>
                    <th>Payment_method</th>   
  <th>Rider_id</th>   
  <th>Customer_id</th>   
  <th>Amount</th>   
  <th>Trip_id</th>   
 
                                    <th>Action</th>
                </tr>

    @foreach ($allwallet as $allwallet_col )
        
  

                <tr>
                   <td>{{$allwallet_col->payment_method}}</td>  
<td>{{$allwallet_col->rider_id}}</td>  
<td>{{$allwallet_col->customer_id}}</td>  
<td>{{$allwallet_col->amount}}</td>  
<td>{{$allwallet_col->trip_id}}</td>  



                  <td>
                       <button  data-toggle="modal" data-target="#modal-default_view{{$allwallet_col->id}}" class="btn btn-sm btn-default">
                       <i class="glyphicon glyphicon-eye-open"></i> </button>
               
                    <button  data-toggle="modal" data-target="#modal-default{{$allwallet_col->id}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i> </button>
                  
                      <form style="display:inline;" action="{{ route('user.deletewallet')}}" method="post" onsubmit="return validate(this);">
                                        {{csrf_field()}}
                                        <input type="hidden" name="wallet_id" value="{{$allwallet_col->id}}" />
                                        <button type="submit" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
  
 
     <div class="modal fade" id="modal-default{{$allwallet_col->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">


     <form action="{{route('action.updatewallet')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">
 
        <input type="hidden" name="wallet_id" value="{{$allwallet_col->id}}" />

                {{csrf_field()}}

         
                <div class="form-group col-md-6">
                  <label for="f11">Payment_method</label>
                  <input type="text" class="form-control" id="f111" name="payment_method" value="{{$allwallet_col->payment_method}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f12">Rider_id</label>
                  <input type="text" class="form-control" id="f112" name="rider_id" value="{{$allwallet_col->rider_id}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f13">Customer_id</label>
                  <input type="text" class="form-control" id="f113" name="customer_id" value="{{$allwallet_col->customer_id}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f14">Amount</label>
                  <input type="text" class="form-control" id="f114" name="amount" value="{{$allwallet_col->amount}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f15">Trip_id</label>
                  <input type="text" class="form-control" id="f115" name="trip_id" value="{{$allwallet_col->trip_id}}" >
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
              
              
              
              
               <div class="modal fade" id="modal-default_view{{$allwallet_col->id}}">
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
<th> Payment_method: </th>   

<td> 
 {{$allwallet_col->payment_method}}

 </td>

</tr>

 
<tr>
<th> Rider_id: </th>   

<td> 
 {{$allwallet_col->rider_id}}

 </td>

</tr>

 
<tr>
<th> Customer_id: </th>   

<td> 
 {{$allwallet_col->customer_id}}

 </td>

</tr>

 
<tr>
<th> Amount: </th>   

<td> 
 {{$allwallet_col->amount}}

 </td>

</tr>

 
<tr>
<th> Trip_id: </th>   

<td> 
 {{$allwallet_col->trip_id}}

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
    {!! $allwallet->render() !!}
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



	    