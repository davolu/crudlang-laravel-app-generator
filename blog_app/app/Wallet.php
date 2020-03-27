<?php
							

namespace App; 	


use Illuminate\Database\Eloquent\Model;		


class Wallet extends Model  	

{		

  
      protected $fillable =['payment_method','rider_id','customer_id','amount','trip_id','by_user_id'];   

}
    //