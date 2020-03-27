<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;

use Auth;

use App\User;

use Session;

 
class WalletController extends Controller
{
 
 

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $user = Auth::user();
 

        $getwallet = Wallet::where('by_user_id', $user->id)->orderBy('id', 'desc')->paginate(50);
      
            return  view('wallet.all', [
                                       'allwallet' => $getwallet


                                       ] );


 
    }



 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('wallet.add');

 


    }



    	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
   

        $user = Auth::user();

          $this->validate($request, 
                  [
'payment_method' => 'required', 
'rider_id' => 'required', 
'customer_id' => 'required', 
'amount' => 'required', 
'trip_id' => 'required', 

                     
                  

              ]
          );
 
        

        
 
 
   
    



      $eloquentaddwallet = new Wallet([
                  
               'payment_method' => $request->payment_method, 
'rider_id' => $request->rider_id, 
'customer_id' => $request->customer_id, 
'amount' => $request->amount, 
'trip_id' => $request->trip_id 
,
                'by_user_id' => $user->id 
              
          ]);


              $eloquentaddwallet->save();

               Session::flash('message', 'New Wallet Added Successfuly');  

               return redirect('managewallet');


 }
  




  	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
   

        $user = Auth::user();
    $row_id = $request->wallet_id;
    
        $wallet = wallet::findOrFail($row_id);
    
      $wallet->payment_method = $request->payment_method; 
$wallet->rider_id = $request->rider_id; 
$wallet->customer_id = $request->customer_id; 
$wallet->amount = $request->amount; 
$wallet->trip_id = $request->trip_id; 

    

        

        


   
    
 

              $wallet->save();

               Session::flash('message', 'New Wallet Updated Successfuly');  

               return redirect('managewallet');


 }
  


   public function destroy(Request $request)
                    {


                    $wallet = Wallet::find($request->wallet_id);
                    $wallet->delete();

                    Session::flash('message', 'Wallet has been removed sucessfully');  



                    return redirect('managewallet');
         

                     } 






}

    