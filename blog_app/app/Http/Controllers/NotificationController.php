<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use Auth;

use App\User;

use Session;

 
class NotificationController extends Controller
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
 

        $getnotification = Notification::where('by_user_id', $user->id)->orderBy('id', 'desc')->paginate(50);
      
            return  view('notification.all', [
                                       'allnotification' => $getnotification


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
        return view('notification.add');

 


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
'category' => 'required', 
'for_user_id' => 'required', 
'message' => 'required', 

                     
                  

              ]
          );
 
        

        
 
 
   
    



      $eloquentaddnotification = new Notification([
                  
               'category' => $request->category, 
'for_user_id' => $request->for_user_id, 
'message' => $request->message 
,
                'by_user_id' => $user->id 
              
          ]);


              $eloquentaddnotification->save();

               Session::flash('message', 'New Notification Added Successfuly');  

               return redirect('managenotification');


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
    $row_id = $request->notification_id;
    
        $notification = notification::findOrFail($row_id);
    
      $notification->category = $request->category; 
$notification->for_user_id = $request->for_user_id; 
$notification->message = $request->message; 

    

        

        


   
    
 

              $notification->save();

               Session::flash('message', 'New Notification Updated Successfuly');  

               return redirect('managenotification');


 }
  


   public function destroy(Request $request)
                    {


                    $notification = Notification::find($request->notification_id);
                    $notification->delete();

                    Session::flash('message', 'Notification has been removed sucessfully');  



                    return redirect('managenotification');
         

                     } 






}

    