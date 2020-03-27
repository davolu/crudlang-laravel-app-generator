<?php
							

namespace App; 	


use Illuminate\Database\Eloquent\Model;		


class Notification extends Model  	

{		

  
      protected $fillable =['category','for_user_id','message','by_user_id'];   

}
    //