<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Url;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    //
    public function _construct(){
        $this->middleware('auth:api', ['except'=>['login', 'register']]);
    }

    //
    public function saveUrl(Request $request){
        
        $validator = Validator::make($request->all(),[
            'destination'=>'required|string|url',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        } 

        try{
            $slug =  Str::random(5);
            $isUsed = Url::whereSlug($slug)->first();
            $counter = 0;
            $thresh = 1000000000; //62^5 = 916,132,832 possible characters could be generatd as a slug
            while($isUsed && $counter <= $thresh ){
                $counter++;
            }
            if($counter === $thresh){
                \Log::info(json_encode(["error"=>"timedout request: can not generate a new token"]));
                return response()->json([
                    'success'=>false,
                    'message'=> 'Sorry something went wrong.',
                ], 500);
            }
           
            $url = Url::create(array_merge(
                $validator->validated(),
                ['slug' => $slug]
            ));
            
            $allUrls = Url::all();
          
            return response()->json([
                "success"=>true,  
                "urls"=>$allUrls
            ], 201);
         
        }catch(\Throwable $e){
            \Log::info(json_encode(["request"=>$request->all(), "error"=>$e]));
            return response()->json([
                'success'=>false,
                'message'=> 'Sorry something went wrong.',
            ], 500);
        }
        
    }

    public function getUrls(Request $request){
        
       
        try{
          
            $allUrls = Url::all();
          
            return response()->json([
                "success"=>true,  
                "urls"=>$allUrls
            ], 201);
         
        }catch(\Throwable $e){
            \Log::info(json_encode(["request"=>$request->all(), "error"=>$e]));
            return response()->json([
                'success'=>false,
                'message'=> 'Sorry something went wrong.',
            ], 500);
        }
        
    }

    public function getFullUrl(Request $request){
        try{
          
            $slug = $request->s;
            $url_and_slug = Url::select('destination','slug')->where('slug', $slug)->get();
            $fullUrl = $url_and_slug[0]['destination'];
            return redirect(fullUrl);
            // return response()->json([
            //     'success'=>true,
            //     'fullUrl'=>$fullUrl,
            // ], 201);
         
        }catch(\Throwable $e){
            \Log::info(json_encode(["request"=>$request->all(), "error"=>$e]));
            return response()->json([
                'success'=>false,
                'message'=> 'Sorry something went wrong.',
            ], 500);
        }
    }

    public function viewDashboard(Request $request){
        try{
          
            return view('dashboard');  //['latestUrls'=>Url::orderBy('id', 'desc')->paginate(8)]
         
        }catch(\Throwable $e){
            \Log::info(json_encode(["request"=>$request->all(), "error"=>$e]));
            return response()->json([
                'success'=>false,
                'message'=> 'Sorry something went wrong.',
            ], 500);
        }
    }
}
