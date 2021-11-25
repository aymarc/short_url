<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;


class AuthController extends Controller
{
    //
    public function _construct(){
        $this->middleware('auth:api', ['except'=>['login', 'register']]);
    }

    //
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'password'=> 'required|string|confirmed|min:6'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        } 

        try{
            $user = User::create(array_merge(
                $validator->validated(),
                ['password'=>bcrypt($request->password)]
            ));
            return response()->json([
                'message'=> 'User successfully registered',
                'user'=>$user
            ], 201);
        }catch(\Throwable $e){
         
            \Log::info(json_encode(["request"=>$request->all(), "error"=>$e]));
            return response()->json([
                'success'=>false,
                'message'=> 'Sorry something went wrong.',
            ], 500);
        }
       
    }

    //
    public function login(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=> 'required|string|min:6'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        } 

        try{
            if(!$token=auth()->attempt($validator->validated())){
                return response()->json(['error'=>'Unauthorized'], 401);
            }
            return $this->createNewToken($token);
        }catch(\Throwable $e){
            \Log::info(json_encode(["request"=>$request->all(), "error"=>$e]));
            return response()->json([
                'success'=>false,
                'message'=> 'Sorry something went wrong.',
            ], 500);
        }
        
    }


    public function createNewToken($token){

        return response()->json([
            'success'=>true,  
            'user'=>auth()->user(),
            'expires_in'=>auth()->factory()->getTTL()*800,
            'token_type'=>'bearer',
            'access_token'=>$token,
            
        ]);
       
    }


    public function logout(){
        try{
            auth()->logout();
            return response()->json([
                'message'=> 'User logged out successfully',
            ]);
        }catch(\Throwable $e){
            \Log::info(json_encode(["error"=>$e]));
            return response()->json([
                'success'=>false,
                'message'=> 'Sorry something went wrong.',
            ], 500);
        }

    }
}
