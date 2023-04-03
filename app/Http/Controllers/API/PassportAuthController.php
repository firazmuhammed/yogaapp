<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Response;
use DB;
class PassportAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|unique:users',
    
           
        ]);
        if ($validator->fails()) {
            
            $responseArr['message'] = "The email has already been taken";
            $responseArr['status'] = false;
            return response()->json($responseArr);
        }
   
   
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => "User",
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password)
        ]);
       
        $token = $user->createToken('LaravelAuthApp')->accessToken;
 
        return response()->json(['token' => $token,'status'=>true,'data'=> $user ], 200);
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            
           
            return response()->json(['token' => $token,'status'=>true], 200);
        } else {
            return response()->json(['error' => 'Unauthorised','status'=>false], 401);
        }
    } 

    public function getData()
    {
        $data = Auth::guard('api')->user();
            if($data)
            {
                return response()->json([
                    'success' => true,
                    'data' => $data
                ]);
            }
            else {
                return response()->json([
                    'success' => false,
                    'data' => ""
                ]);
            }
        
    }
}
