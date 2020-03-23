<?php
ini_set('max_execution_time',720);
 include("functions.php");



if(isset($_POST['init']))
{

	$appname = trim($_POST['dbname']);


    //create directory

  $app_dir=  makeDirs($appname);

   
		
		//intialisie by copying app to root folder.
 	 	copy_directory("dummy-app", $appname );

		echo " <br/>clonning sucessful";




}


 

else if( isset($_POST['createModel'])   )
{
	

	$token = trim($_POST['token']);
	$app_dir = trim($_POST['dir']);

  $explode_token = explode(":", $token);
		//get model Name

	$get_model_name = $explode_token[0];

    //get fillables

    $get_fillable = $explode_token[1]; 
  
    $get_fillable_filtered = preg_replace("/\([a-z A-Z]+\)/", "", $get_fillable);


    $floop = explode(",",$get_fillable_filtered);

 	$flds="";
    foreach($floop as $flp)
    {
    		$flds.="'".trim($flp)."',";


    }

 
     $path = $app_dir."/app/";   

      
      $fields_array = "[".$flds."'by_user_id']";

 		$filename = ucfirst(trim($get_model_name)).".php"; 
	    $content = "<?php
							\n
namespace App; 	\n

use Illuminate\Database\Eloquent\Model;		\n

class ".ucfirst(trim($get_model_name))." extends Model  	\n
{		\n
  
      protected \$fillable =".$fields_array.";   \n
}
    //";

 
 		
 				 
				 $fl = fopen($path."/".$filename,"w");
				 fwrite($fl,$content);
				 fclose($fl);
				 
				 echo"Building file: Model ".$filename."...100% completed<br/>";




//delete Post model if exist

}




else if(isset($_POST['createMigration'])  )
{

  //remame 2014_10_12_000000_create_users_table.php and 
  //2014_10_12_100000_create_password_resets_table
	

	$token = trim($_POST['token']);
	$app_dir = trim($_POST['dir']);

  $explode_token = explode(":", $token);
		//get model Name

	$get_model_name = $explode_token[0];

    //get fillables

    $get_fillable = $explode_token[1]; 
  
    $get_fillable_filtered = preg_replace("/\([a-z A-Z]+\)/", "", $get_fillable);


    $floop = explode(",",$get_fillable_filtered);

 	$flds="";

 	
    foreach($floop as $flp)
    {
    		$flds.="  \$table->text(\"".trim($flp)."\")->nullable(); \n";


    }

 
     $path = $app_dir."/database/migrations/";   

      
      $fields_array = "[".$flds."'by_user_id']";

      $pre = date("Y")."_".date("m")."_".date("d")."_".rand(0,9).rand(0,6).rand(0,6).rand(0,6).rand(0,6).rand(0,6)."_create_".trim($get_model_name)."s_table.php";

$upp = date("Y")."_".date("m")."_".date("d")."_".rand(0,9).rand(0,6).rand(0,6).rand(0,6).rand(0,6).rand(0,6)."_create_";

        rename($path.'2014_10_12_000000_create_users_table.php', $path.$upp.'users_table.php');
        rename($path.'2014_10_12_100000_create_password_resets_table.php', $path.$upp.'password_resets_table.php');


 		$filename = $pre; // ucfirst($get_model_name); 
	    $content = "<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create".trim(ucfirst($get_model_name))."sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('".trim(strtolower($get_model_name) )."s', function (Blueprint \$table) {
            \$table->increments('id');
".$flds."


            \$table->text(\"by_user_id\")->nullable();

            \$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('".trim(strtolower($get_model_name) )."s');
    }
}




            ";

 
 		
 				 
				 $fl = fopen($path."/".$filename,"w");
				 fwrite($fl,$content);
				 fclose($fl);
				 
				 echo"Building file: Migration  ".$pre."...100% completed<br/>";




//delete Post model if exist

}




else if( isset($_POST['createController'])   )
{
	

	$token = trim($_POST['token']);
	$app_dir = trim($_POST['dir']);

  $explode_token = explode(":", $token);
		//get model Name

	$get_model_name = $explode_token[0];

    //get fillables

    $get_fillable = $explode_token[1]; 
  
    $get_fillable_filtered = preg_replace("/\([a-z A-Z]+\)/", "", $get_fillable);

    $get_fillable_nofiltered = $get_fillable; //preg_replace("/\([a-z A-Z]+\)/", "", $get_fillable);


    $floop = explode(",",$get_fillable_filtered);

    $floop1 = explode(",",$get_fillable_nofiltered);
 

 	$flds="";

 	 	$flds_update="";

 	$flds2="";

 	$fileupload="";

 	$deji=0;


$fix="";
 	  //$post->title= $request->title;
        //$post->content= $request->content;

    foreach($floop as $flp)
    {
 

 
 		  if($deji == count($floop)-1)
 		  		{

 

		 		  					if( preg_match("/\(U\)/",$floop1[$deji]) == 1  )
		 		  					{
    		$flds.="'".trim($flp)."' => 'mimes:jpeg,bmp,png,pdf,jpg' \n";

    		$flds2.="'".trim($flp)."' => \$".trim($flp)."url \n";

    		$fileupload.=" \$".trim($flp)."url=\"\";
          

          if(request()->".trim($flp).")
          {

              \$".trim($flp)."url = time().'.'.request()->".trim($flp)."->getClientOriginalExtension();

              request()->".trim($flp)."->move(public_path('img/uploads'), \$".trim($flp)."url);

          }
        else{


        	        \$".trim($flp)."url = $request->".trim($flp)."_update;


        }

 













";

$fix="\$".strtolower(trim($get_model_name))."->".trim($flp)." = \$".trim($flp)."url; ";


		 		  					}
		 		  					else

		 		  					{

    		$flds.="'".trim($flp)."' => 'required', \n";
    		$flds2.="'".trim($flp)."' => \$request->".trim($flp)." \n";
 			$flds_update.="\$".trim($get_model_name)."->".trim($flp)." = \$request->".trim($flp)."; \n";

		 		  					}

 




    					}
    					else
    					{

   
		 		  					if( preg_match("/\(U\)/",$floop1[$deji])   )
		 		  					{
    		$flds.="'".trim($flp)."' => 'mimes:jpeg,bmp,png,pdf,jpg', \n";
    		$flds2.="'".trim($flp)."' => \$".trim($flp)."url, \n";



    				$fileupload.=" \$".trim($flp)."url=\"\";
          

          if(request()->".trim($flp).")
          {

              \$".trim($flp)."url = time().'.'.request()->".trim($flp)."->getClientOriginalExtension();

              request()->".trim($flp)."->move(public_path('img/uploads'), \$".trim($flp)."url);

          }
        else{

        	        \$".trim($flp)."url = \$request->".trim($flp)."_update;
        }

 
";


$fix="\$".strtolower(trim($get_model_name))."->".trim($flp)." = \$".trim($flp)."url; ";




		 		  					}
		 		  					else

		 		  					{

    		$flds.="'".trim($flp)."' => 'required', \n";
    		$flds2.="'".trim($flp)."' => \$request->".trim($flp).", \n";
 			$flds_update.="\$".trim($get_model_name)."->".trim($flp)." = \$request->".trim($flp)."; \n";

		 		  					}

    					}


				$deji++;

   				



    }



/*
'title' => 'required'  , 
'content' => 'required'  , 
'photo' => 'mimes:jpeg,bmp,png,pdf,jpg'  

*/

 
     $path = $app_dir."/app/Http/Controllers/";   

      
      $fields_array = "[".$flds."'by_user_id']";

 		$filename = ucfirst(trim($get_model_name))."Controller.php"; 
	    $content = "<?php

namespace App\Http\Controllers;

use App\\".ucfirst(trim($get_model_name)).";
use Illuminate\Http\Request;

use Auth;

use App\User;

use Session;

 
class ".ucfirst(trim($get_model_name))."Controller extends Controller
{
 
 

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        \$user = Auth::user();
 

        \$get".trim($get_model_name)." = ".ucfirst(trim($get_model_name))."::where('by_user_id', \$user->id)->orderBy('id', 'desc')->paginate(50);
      
            return  view('".strtolower(trim($get_model_name)).".all', [
                                       'all".trim($get_model_name)."' => \$get".trim($get_model_name)."


                                       ] );


 
    }



 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request \$request)
    {
        //
        return view('".trim($get_model_name).".add');

 


    }



    	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @return \Illuminate\Http\Response
     */
    public function store(Request \$request)
    {
        //
   

        \$user = Auth::user();

          \$this->validate(\$request, 
                  [
".$flds."
                     
                  

              ]
          );
 
        

        ".$fileupload."
 
 
   
    



      \$eloquentadd".trim($get_model_name)." = new ".ucfirst(trim($get_model_name))."([
                  
               ".$flds2.",
                'by_user_id' => \$user->id 
              
          ]);


              \$eloquentadd".trim($get_model_name)."->save();

               Session::flash('message', 'New ".ucfirst(trim($get_model_name))." Added Successfuly');  

               return redirect('manage".trim($get_model_name)."');


 }
  




  	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @return \Illuminate\Http\Response
     */
    public function update(Request \$request)
    {
        //
   

        \$user = Auth::user();
    \$row_id = \$request->".strtolower(trim($get_model_name))."_id;
    
        \$".strtolower(trim($get_model_name))." = ".trim($get_model_name)."::findOrFail(\$row_id);
    
      ".$flds_update."
    

        

        ".$fileupload."


   ".$fix."
    
 

              \$".trim($get_model_name)."->save();

               Session::flash('message', 'New ".ucfirst(trim($get_model_name))." Updated Successfuly');  

               return redirect('manage".trim($get_model_name)."');


 }
  


   public function destroy(Request \$request)
                    {


                    \$".trim($get_model_name)." = ".ucfirst(trim($get_model_name))."::find(\$request->".trim($get_model_name)."_id);
                    \$".trim($get_model_name)."->delete();

                    Session::flash('message', '".ucfirst(trim($get_model_name))." has been removed sucessfully');  



                    return redirect('manage".trim($get_model_name)."');
         

                     } 






}

    ";

 
 		
 				 
				 $fl = fopen($path."/".$filename,"w");
				 fwrite($fl,$content);
				 fclose($fl);
				 
				 echo"Building file: Controller ".$filename."...100% completed<br/>";





}




else if( isset($_POST['createWebRoute'])   )
{



$token = trim($_POST['token']);
	$app_dir = trim($_POST['dir']);

  $explode_token = explode(":", $token);
		//get model Name

	$get_model_name = $explode_token[0];

 
 
     $path = $app_dir."/routes/";   

      
 
 		$filename = "web.php"; //$pre; // ucfirst($get_model_name); 
	    $content = " 



//".trim($get_model_name)."s crud

Route::get('manage".trim($get_model_name)."', [
     
    'uses' => '".ucfirst(trim($get_model_name))."Controller@index',
    'as' => 'view.manage".trim($get_model_name)."'
    ])->middleware('auth');


 

Route::get('add".trim($get_model_name)."', [
     
    'uses' => '".ucfirst(trim($get_model_name))."Controller@create',
    'as' => 'form.add".trim($get_model_name)."'
    ])->middleware('auth');
    
    
    Route::post('submitadd".trim($get_model_name)."', [
     
        'uses' => '".ucfirst(trim($get_model_name))."Controller@store',
        'as' => 'action.add".trim($get_model_name)."'
        ])->middleware('auth');
        
        
            
        
        Route::post('submitupdate".trim($get_model_name)."', [
     
            'uses' => '".ucfirst(trim($get_model_name))."Controller@update',
            'as' => 'action.update".trim($get_model_name)."'
            ])->middleware('auth');
            
     
            
        Route::post('delete".trim($get_model_name)."', [
     
            'uses' => '".ucfirst(trim($get_model_name))."Controller@destroy',
            'as' => 'user.delete".trim($get_model_name)."'
            ])->middleware('auth');
    
                
         
            ";

 
 		
 				 
			//	 $fl = fopen($path."/".$filename,"w");
			//	 fwrite($fl,$content);
			//	 fclose($fl);
				 
				 file_put_contents($path."/".$filename, $content,FILE_APPEND);
				 echo"Building file: web route   ...100% completed<br/>";




//delete Post model if exist


}



else if( isset($_POST['createSideBar'])   )
{

 

 	$app_dir = trim($_POST['dir']);

  $models = explode(",",trim($_POST['models']));

 



 	$flds="";

 	$sidebar_nav="";

    foreach($models as $flp)
    {
    		$flds.="'".trim($flp)."',";


if(strlen($flp)<=0){continue;}
    		$sidebar_nav.='
        <li   {{{ (Request::is(\'add'.strtolower(trim($flp)).'\') || Request::is(\'manage'.strtolower(trim($flp)).'\') ? \'class=active treeview\' : \'class=treeview\') }}}   
      >
          <a href="#">
            <i class="fa fa-folder"></i> <span>'.ucfirst(trim($flp)).'</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route(\'form.add'.strtolower(trim($flp)).'\')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{route(\'view.manage'.strtolower(trim($flp)).'\')}}"><i class="fa fa-circle-o"></i> Manage</a></li>
          
          </ul>
        </li>
';

    }

 
     $path = $app_dir."/resources/views/partials";   

      
      $fields_array = "[".$flds."'by_user_id']";

 		$filename = "sidebar.blade.php"; 


	    $content = '  <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        

        <li  {{{ (Request::is(\'dashboard\') ? \'class=active\' : \'\') }}}  >
          <a href="{{route(\'user.dashboard\')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
<!--              <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
      





 '.$sidebar_nav.' 
 





   
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>';

 
 		
 				 
				 $fl = fopen($path."/".$filename,"w");
				 fwrite($fl,$content);
				 fclose($fl);
				 
				 echo"Building file: Model ".$filename."...100% completed<br/>";




}





else if( isset($_POST['createViews'])   )
{
	

	$token = trim($_POST['token']);
	$app_dir = trim($_POST['dir']);

  $explode_token = explode(":", $token);
		//get model Name

	$get_model_name = $explode_token[0];

 

    //get fillables

    $get_fillable = $explode_token[1]; 
  
    $get_fillable_filtered = preg_replace("/\([a-z A-Z]+\)/", "", $get_fillable);

    $get_fillable_nofiltered = $get_fillable; //preg_replace("/\([a-z A-Z]+\)/", "", $get_fillable);


    $floop = explode(",",$get_fillable_filtered);

    $floop1 = explode(",",$get_fillable_nofiltered);
 
 
 	$flds="";


 	$flds_update="";


 	$cc=0;

 $allflds="";


$cflds="";


$fldsv="";

$deji=0;

                    


    foreach($floop as $flp)
    {
    $cc++;	 


$allflds.="  <th>".ucfirst(trim($flp))."</th>   \n";

    			if( preg_match("/\(U\)/",$floop1[$deji]) == 1  )
		 		  					{

 $cflds.='<td><img src="{{asset(\'img/uploads\')}}/{{$all'.trim($get_model_name).'_col->'.trim($flp).'}}" class="img-responsive img-circle" style="height:40px;" /></td> 



 ';
                 
 


$fldsv.='
 
<tr>
<th> '.ucfirst(trim($flp)).': </th> 


<td> 
<img src="{{asset(\'img/uploads\')}}/{{$all'.trim($get_model_name).'_col->'.trim($flp).'}}" class="img-responsive" style="height:100px;"/>

 </td>

</tr>
';

$flds.='
                <div class="form-group col-md-6">
                  <label for="f1'.$cc.'">'.ucfirst(trim($flp)).'</label>
                  <input type="file" class="form-control" id="f11'.$cc.'" name="'.trim($flp).'" >
                  <p class="help-block">'.ucfirst(trim($flp)).'</p>
                </div>';


$flds_update.='<div class="form-group col-md-6">
                <img id="pre{{$all'.trim($get_model_name).'_col->id}}" src="{{asset(\'img/uploads\')}}/{{$all'.trim($get_model_name).'_col->'.trim($flp).'}}" class="img-responsive img-circle" style="height:40px;"/>
                  <label for="f3'.trim($get_model_name).'">File input</label>
                  <input type="file" name="'.trim($flp).'" onchange="prev({{$all'.trim($get_model_name).'_col->id}})" id="'.trim($get_model_name).'">
                  <input type="hidden" name="'.trim($flp).'_update" value="{{$all'.trim($get_model_name).'_col->'.trim($flp).'}}" />
                  <p class="help-block">'.ucfirst(trim($get_model_name)).'</p>
                </div>
                	';

 

 


		 		  					}
		 		  					else if( preg_match("/\(LTXT\)/",$floop1[$deji]) == 1  )
		 		  					{


$fldsv.='
 
<tr>
<th> '.ucfirst(trim($flp)).': </th>  

<td> 
 {{$all'.trim($get_model_name).'_col->'.trim($flp).'}}

 </td>

</tr>
';


             $cflds.="<td>{{ substr(\$all".trim($get_model_name)."_col->".trim($flp).",0,160)}}</td> \n";

$flds.='
                <div class="form-group col-md-6">
                  <label for="f1'.$cc.'">'.ucfirst(trim($flp)).'</label>
                  <textarea class="form-control" id="f11'.$cc.'" name="'.trim($flp).'"  placeholder="Enter '.ucfirst(trim($flp)).'">
                  {{old(\''.trim($flp).'\')}} </textarea>
                </div>';


 

$flds_update.='
                <div class="form-group col-md-6">
                  <label for="f1'.$cc.'">'.ucfirst(trim($flp)).'</label>
                  <textarea class="form-control" id="f11'.$cc.'" name="'.trim($flp).'" >{{$all'.trim($get_model_name).'_col->'.trim($flp).'}}</textarea>
                  <p class="help-block">'.ucfirst(trim($flp)).'</p>
                </div>';



		 		  					}
		 		  					else{

$fldsv.='
 
<tr>
<th> '.ucfirst(trim($flp)).': </th>   

<td> 
 {{$all'.trim($get_model_name).'_col->'.trim($flp).'}}

 </td>

</tr>
';


		$cflds.="<td>{{\$all".trim($get_model_name)."_col->".trim($flp)."}}</td>  \n";


$flds.='
                <div class="form-group col-md-6">
                  <label for="f1'.$cc.'">'.ucfirst(trim($flp)).'</label>
                  <input type="text" class="form-control" id="f11'.$cc.'" name="'.trim($flp).'" value="{{old(\''.trim($flp).'\')}}" placeholder="Enter '.ucfirst(trim($flp)).'">
                </div> ';



$flds_update.='
                <div class="form-group col-md-6">
                  <label for="f1'.$cc.'">'.ucfirst(trim($flp)).'</label>
                  <input type="text" class="form-control" id="f11'.$cc.'" name="'.trim($flp).'" value="{{$all'.trim($get_model_name).'_col->'.trim($flp).'}}" >
                </div>';




		 		  					}

$deji++;

    }

 
     $path = $app_dir."/resources/views/";   



    //create directory

  $app_dir=  makeDirs($path."/".(trim($get_model_name)) );
      





      $fields_array = "[".$flds."'by_user_id']";

 		$filename = "add.blade.php"; 
	    $content = '



	    		  @extends(\'layout.master\')


 @section(\'title\')

New 
 @endsection


 @section(\'content\')

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


                 @if(Session::has(\'message\'))
      <p class="alert {{ Session::get(\'alert-class\', \'alert-info\') }}">{{ Session::get(\'message\') }}</p>

@endif
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route(\'action.add'.strtolower(trim($get_model_name)).'\')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">


 '.$flds.'

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



	    ';

 


 //all blade

	    	$filename2 = "all.blade.php"; 
	    $content2 = '



	    		  @extends(\'layout.master\')


 @section(\'title\')

New 
 @endsection


 @section(\'content\')

 



 <div class="box">
            <div class="box-header">

                    @if(Session::has(\'message\'))
      <p class="alert {{ Session::get(\'alert-class\', \'alert-info\') }}">{{ Session::get(\'message\') }}</p>

@endif
         <div class="box-body table-responsive no-padding">

         <a href="add'.strtolower(trim($get_model_name)).'" class="btn btn-sm btn-default pull-right">Add New</a>
              <table class="table table-hover">
               
               
                <tr>
                  '.$allflds.' 
                                    <th>Action</th>
                </tr>

    @foreach ($all'.strtolower(trim($get_model_name)).' as $all'.strtolower(trim($get_model_name)).'_col )
        
  

                <tr>
                   '.$cflds.'


                  <td>
                       <button  data-toggle="modal" data-target="#modal-default_view{{$all'.trim($get_model_name).'_col->id}}" class="btn btn-sm btn-default">
                       <i class="glyphicon glyphicon-eye-open"></i> </button>
               
                    <button  data-toggle="modal" data-target="#modal-default{{$all'.trim($get_model_name).'_col->id}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i> </button>
                  
                      <form style="display:inline;" action="{{ route(\'user.delete'.strtolower(trim($get_model_name)).'\')}}" method="post" onsubmit="return validate(this);">
                                        {{csrf_field()}}
                                        <input type="hidden" name="'.strtolower(trim($get_model_name)).'_id" value="{{$all'.strtolower(trim($get_model_name)).'_col->id}}" />
                                        <button type="submit" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
  
 
     <div class="modal fade" id="modal-default{{$all'.strtolower(trim($get_model_name)).'_col->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">


     <form action="{{route(\'action.update'.strtolower(trim($get_model_name)).'\')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">
 
        <input type="hidden" name="'.strtolower(trim($get_model_name)).'_id" value="{{$all'.strtolower(trim($get_model_name)).'_col->id}}" />

                {{csrf_field()}}

         '.$flds_update.'
              
       
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
              
              
              
              
               <div class="modal fade" id="modal-default_view{{$all'.strtolower(trim($get_model_name)).'_col->id}}">
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
 '.$fldsv.'

 
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
    {!! $all'.trim($get_model_name).'->render() !!}
            </div>

            </div>
            </div>

 

 @endsection

@section(\'scripts\')
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



	    ';

 
 		
 		
 				 
				 $fl = fopen($path."/".trim($get_model_name)."/".$filename,"w");
				 fwrite($fl,$content);
				 fclose($fl);


				 $fl2 = fopen($path."/".trim($get_model_name)."/".$filename2,"w");
				 fwrite($fl2,$content2);
				 fclose($fl2);
				 echo"Building file: Model ".$filename."...100% completed<br/>";




//delete Post model if exist

}





else
{


}
?>