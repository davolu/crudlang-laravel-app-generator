<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

use Session;

class UserController extends Controller
{
	//
	
	public function getDashboard()
	{
		return view('dashboard');

	}

     public function loginview()
     {
        return view('login');

     }

     
     public function RegisterUser(Request $req)
    {


 


                            $this->validate($req, 
                                    [

                                        'email' => 'email|required|unique:users',
                                        'password' => 'required|min:2'	,
                                        'name' => 'required'	,
                                    
                                ]
                            );



 
                            $user = new User([
                                'email' => $req->input('email'),
                                'password' => bcrypt($req->input('password')),
								'name' => $req->input('name') ,
								'user_photo' =>''
                                
                                            ]);
 

			        	 $user->save();
                         Session::flash('message', 'Signup was sucessful. You can now Login');  

		                return redirect()->route('user.loginview');


                        }


                        
			public function doLogin(Request $req)
			{



			$this->validate($req, 
					[

					'email' => 'email|required',
					  'password' => 'required'	
				]
			);


			if(Auth::attempt([
			'email' => $req->input('email'),
			'password' => $req->input('password')

			]) )
			{

 			   
 			  				//admission officer
 			 		 return redirect('dashboard');
 

			}
		Session::flash('message', 'Wrong Login Credentials Provided. Please try again.');  


              return redirect()->back();


			//	return redirect()->route('product.index');

			}



				        public function doLogout()
						{


							   	            Auth::logout();

									        return redirect('login');


 

						}
			  



                        


                    }
