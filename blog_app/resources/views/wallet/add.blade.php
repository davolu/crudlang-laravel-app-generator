



	    		  @extends('layout.master')


 @section('title')

New 
 @endsection


 @section('content')

<div class="container">
<div class="row">

 

<div class="col-md-11">

  <!-- general form elements -->
          <div class="box box-primary" style="margin-top:6%">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>


    @if(count($errors) >0 )

                            <div class="alert alert-danger">


                        @foreach($errors->all() as $error)

                        <p>{{ $error }}</p>


                        @endforeach
                            </div>

                        @endif


                 @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('action.addwallet')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">


 
                <div class="form-group col-md-6">
                  <label for="f11">Payment_method</label>
                  <input type="text" class="form-control" id="f111" name="payment_method" value="{{old('payment_method')}}" placeholder="Enter Payment_method">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f12">Rider_id</label>
                  <input type="text" class="form-control" id="f112" name="rider_id" value="{{old('rider_id')}}" placeholder="Enter Rider_id">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f13">Customer_id</label>
                  <input type="text" class="form-control" id="f113" name="customer_id" value="{{old('customer_id')}}" placeholder="Enter Customer_id">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f14">Amount</label>
                  <input type="text" class="form-control" id="f114" name="amount" value="{{old('amount')}}" placeholder="Enter Amount">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f15">Trip_id</label>
                  <input type="text" class="form-control" id="f115" name="trip_id" value="{{old('trip_id')}}" placeholder="Enter Trip_id">
                </div> 

                {{csrf_field()}}
              
           
      
       
              </div>
              <!-- /.box-body -->

              <div class="box-footer  clearfix text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>

<div class="col-md-1"></div>

</div>
</div>


 

 @endsection



	    