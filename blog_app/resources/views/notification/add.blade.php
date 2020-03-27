



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
            <form action="{{route('action.addnotification')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">


 
                <div class="form-group col-md-6">
                  <label for="f11">Category</label>
                  <input type="text" class="form-control" id="f111" name="category" value="{{old('category')}}" placeholder="Enter Category">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f12">For_user_id</label>
                  <input type="text" class="form-control" id="f112" name="for_user_id" value="{{old('for_user_id')}}" placeholder="Enter For_user_id">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f13">Message</label>
                  <input type="text" class="form-control" id="f113" name="message" value="{{old('message')}}" placeholder="Enter Message">
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



	    