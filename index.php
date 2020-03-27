  <html>
 <head>
     <link rel="stylesheet" href="assets/css/bootstrap.css"/>
 	    <script src="assets/js/jquery.js"> </script>
  	    <script src="assets/js/bootstrap.min.js"> </script>
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 		 <link rel="stylesheet" href="assets/lib/codemirror.css">
 		 <title>CrudLang - Laravel</title>
	 
		
 </head>
 
 <body style="background:#f5f5f5;">
 
 <div class="container">

 <span class="pull-right text-muted">Author: David Oluyale</span>
<div class="jumbotron text-center">
 <h3 class="text-danger">CRUDLANG V.10 for Laravel</h3>
 <p>Domain Specific Language for generating CRUD Application </p>
 </div>

 <div style="  margin-top:5%;">

<STRONG class="text-danger">CRUDLANG SOURCE CODE: </STRONG>
 <textarea id="code" style="width:100%; height:300px;">
 
#CRUD.L;
#APPNAME : blog_app;

blogpost : title, content(LTXT), photo(U), category;
category: title, description;


 </textarea>
 
 <br/>
 
 <div class="text-center">
 <Br/>
 <button  class="btn btn-danger" onclick="runcompiler()">Compile to  Laravel App</button>
 </div>

 <br/><br/>
 <STRONG class="text-danger">CONSOLE OUTPUT: </STRONG>
 <div id="result" style="background:black; color:green; height:250px; overflow:scroll;">
 
 </div>
 

 </div>
 
 <script>
 
  var result_console = document.getElementById("result");

	 var thecode = document.getElementById("code").value;

 var token = thecode.split(";");

var database_name="";

	 for(i=0; i<token.length; i++)
	 {


		 database_name_match = token[i].match(/#APPNAME\s*\:\s*[A-Z 0-9 \_]+/gi);
		  if(database_name_match)
		  {
			   database_name = database_name_match.toString().replace(/#APPNAME/gi,"").replace(/:/gi,"");
		  }else{}

}



 function  runcompiler()
 {


 
 
	 result_console.innerHTML+="CrudLang to Laravel App generator  <Br/> Author: Oluyale David (oluyaled@gmail.com) <br/> initialising......";
	 

	      	
     init(); 
	 
 }
 


 function init()
{
  

     document.getElementById("result").innerHTML+='initialising...<Br/>Cloning dummy app to '+database_name;


 

	 $.ajax({
		
			url:"server.php",
			type:"post",
			
			data:{
				
				init:"init" ,
				dbname: database_name //aka appname
				
			},
			
			success: function(r)
			{
				
				
				// alert(r);
		
                  document.getElementById("result").innerHTML+=r;
                 	  compiler();
		}
		
			 
		 });
 
 
}



 function compiler()
 {

 result_console.innerHTML+="<br/>Parsing <br/>";
	 //The source code
	 var thecode = document.getElementById("code").value;
	 
	 //Split each lines by ';'
	 
	 var token = thecode.split(";");


	 for(i=2; i<token.length-1; i++)
	 {

    //console.log(token[i]);
     		
      		//get the models 

       var get_model = token[i].split(":")[0];
           result_console.innerHTML+="<br/>Creating Model: "+get_model+"<br/>";
     
     	makeModel(''+token[i]+'', get_model);
     	

       


     //  console.log(get_model);		 

	 }
	 
	 
	 


}





function makeModel(token,model_name) 
{
 

alert(token);


 document.getElementById("result").innerHTML+='creating model '+model_name;

	 $.ajax({
		
			url:"server.php",
			type:"post",
			
			data:{
				
				createModel:"createModel",
			     token : token,
			     dir: database_name
				
			},
			
			success: function(r)
			{
				
				
 		
                 document.getElementById("result").innerHTML+='<Br/>created model '+model_name;

                 result_console.innerHTML+="<br/>"+r;
	                 document.getElementById("result").innerHTML+='<Br/>Making Migration File';
      makeMigration(token,model_name) 


		}
		
			 
		 });


 

}
 



function makeMigration(token,model_name) 
{
 



 document.getElementById("result").innerHTML+='creating migration file for model '+model_name;

	 $.ajax({
		
			url:"server.php",
			type:"post",
			
			data:{
				
				createMigration:"createMigration",
			     token : token,
			     dir: database_name
				
			},
			
			success: function(r)
			{
				
				
 		
//                 document.getElementById("result").innerHTML+='<Br/>created migr '+model_name;

                 result_console.innerHTML+="<br/>"+r;
                                  document.getElementById("result").innerHTML+='<Br/>Making Controller File';

		makeController(token,model_name) 
		}
		
			 
		 });

 

}
 
 

 function makeController(token,model_name) 
		{
 




   document.getElementById("result").innerHTML+='creating controller for model '+model_name;

	 $.ajax({
		
			url:"server.php",
			type:"post",
			
			data:{
				
				createController:"createController",
			     token : token,
			     dir: database_name
				
			},
			

			success: function(r)
			{
				
				
				//alert(r);
 		
		//                 document.getElementById("result").innerHTML+='<Br/>created migr '+model_name;

                 result_console.innerHTML+="<br/>"+r;



result_console.innerHTML="Creating Web Routes...";

makeWebRoute(token,model_name)  
      

		}
		
			 
		 });

 

}



 function makeWebRoute(token,model_name) 
		{
 




   document.getElementById("result").innerHTML+='creating web routes crud for model '+model_name;

	 $.ajax({
		
			url:"server.php",
			type:"post",
			
			data:{
				
				createWebRoute:"createWebRoute",
			     token : token,
			     dir: database_name
				
			},
			

			success: function(r)
			{
				
				
			//alert(r);
 		
		//                 document.getElementById("result").innerHTML+='<Br/>created migr '+model_name;

                 result_console.innerHTML+="<br/>"+r;


result_console.innerHTML="Creating views ...";

makeViews(token,model_name)  



		}
		
			 
		 });

      
 

}


function makeViews(token,model_name)
{




   document.getElementById("result").innerHTML+='creating view crud for model '+model_name;

	 $.ajax({
		
			url:"server.php",
			type:"post",
			
			data:{
				
				createViews:"createViews",
			     token : token,
			     dir: database_name
				
			},
			

			success: function(r)
			{
				
				
		//	alert(r);
 		
		//                 document.getElementById("result").innerHTML+='<Br/>created migr '+model_name;

                 result_console.innerHTML+="<br/>"+r;

  makeSideBar(token,"")  



		}
		
			 
		 });

      
 

}


 
 
 function makeSideBar(token,model_name) 
		{
 


 
var models="";

 //The source code
	 var thecode = document.getElementById("code").value;
	 
	 //Split each lines by ';'
	 
	 var token = thecode.split(";");


	 for(i=2; i<token.length-1; i++)
	 {

   //console.log(token[i]);
     		

     		//get the models 

       var get_model = token[i].split(":")[0];
 
 models+=get_model+",";     
      	

       


 
	 }

 


   document.getElementById("result").innerHTML+='creating web sidebar nav crud for model '+model_name;

	 $.ajax({
		
			url:"server.php",
			type:"post",
			
			data:{
				
				createSideBar:"createSideBar",
			     token : token,
			     dir: database_name,
			     models: models
				
			},
			

			success: function(r)
			{
				
				
 	//alert(r);
 		
		//                 document.getElementById("result").innerHTML+='<Br/>created migr '+model_name;

                 result_console.innerHTML+="<br/>"+r;




		}
		
			 
		 });

      
alert("Congrats app made. ");
result_console.innerHTML="App created";

 

}

	 
 </script>
 
 
 
 

</div>
 
<script src="assets/lib/codemirror.js"></script>

<script src="assets/mode/javascript/javascript.js"></script>

<script type="text/javascript">
/*CodeMirror.fromTextArea(document.getElementById('code'), {
  // your settings here
}); */
</script>


 </body>
 </html>
 
 
 