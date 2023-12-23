<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function Login(Request $request)
    {  

        try{
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
         } catch (\Throwable $th) {
            return response()->json([
           'status' => false,
           'message' => $th->getMessage()
            ], 500);
            }

            

        $user = User::where("email", $request->email)->first();

        if($user &&  Hash::check( $request->password, $user->password)) {
        
           $msg='logged in Seccessfully';

           return response()->json([ 'token' => $user->createToken($user->email)->plainTextToken]);
        
         }
         else{
            return "Incorrect Email and Password";
         }
 

    }







    public function Register(Request $request)
    {
        
       try{
        $request->validate([
            
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required', 
        ]);
            }catch (\Throwable $th) {
             return response()->json([
            'status' => false,
            'message' => $th->getMessage()
             ], 500);
             }
          
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        $user->save();
        $msg='Registered Seccessfully';
        return response()->json(['token' => $user->createToken($user->email)->plainTextToken]);

          }



          public function refresh(Request $request)
          {
              $user = $request->user();
              $user->tokens()->delete();
              return response()->json(['token' => $user->createToken($user->email)->plainTextToken]);
          }


          public function users(Request $request){

            $users=User::all();

            return $users;
          }

          public function logout(Request $request)
          {
              $user = $request->user();
              $user->tokens()->delete();
          }
      
    
}
