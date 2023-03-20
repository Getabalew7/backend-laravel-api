<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Hash;
class AuthController extends Controller
{
    //create a function for user registration
    public function register(Request $request){
       
        //validate the data
        $validator = Validator::make($request->all(),[
            'fullName'=>'required|max:191',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'validator_errors'=> $validator->messages(),
            ]);
        }else{ 
           
            $user= User:: create([
                'name'=> $request->fullName,
                'email' => $request->email,
                'password' =>Hash::make( $request->password),
                
            ]);
            $token = $user->createToken($user->email.'_Token')->plainTextToken;
            return response()->json([
                'status'=>200,
                'username'=>$user->name,
                'token'=>$token,
                'message'=> "Registered successfully",
            ]);
        }

    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails()){
        return response()->json([
            'validator_errors'=> $validator->messages(),
            ]);
        }else{
            $user= User::where('email', $request->email)->first();
            if(! $user || ! Hash::check($request->password,$user->password)){
                return response()->json([
                    'status'=>401,
                    //'pass'=>Hash::make($request->password),
                   // 'accpass'=>$user->password,
                    'message'=>"Invalid Credentials"
                ]);
            }else{
                $token = $user->createToken($user->email.'_Token')->plainTextToken;

                return response()->json([
                    'status'=>200,
                    'username'=>$user->name,
                    'token'=>$token,
                    'message'=>'loged in successfully;'
                ]);
            }
        }
    }
    public function logout(){
    	auth()->user()->tokens()->delete();
    	return response()->json([
    		'status'=>200,
    		'message'=> 'logged out successfully',
    	]);
    }

    
}
