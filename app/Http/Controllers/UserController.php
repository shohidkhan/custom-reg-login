<?php

namespace App\Http\Controllers;

use App\Helper\JWTHelper;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function userRegistration(Request $request){
        try{
            User::create($request->input());
            return response()->json(["status"=>"success","message"=>"user created successfully"]);
        }catch(Exception $exception){
            return response()->json(["status"=>"faild","message"=>$exception->getMessage()]);
        }
    }

    function userLogin(Request $request){
        try{
            $user=User::where($request->input())->first();
            $id=$user->id;
            if($id>0 || $id===null){
                $token=JWTHelper::CreateToken($user->email,$id);
                return response()->json(["status"=>"success","message"=>"Login success"])
                ->cookie("token",$token);
            }else{
                return response()->json(["status"=>"faild","message"=>"user not found"]);
            }
        }catch(Exception $exception){
            return response()->json(["status"=>"faild","message"=>$exception->getMessage()]);
        }
    }

    function userDetails(Request $request){
        $id=$request->header("id");
        $id=$request->header("id");
        
        return User::where("id",$id)->first();
    }

    function logout(Request $request){
        return redirect("/login")->cookie("token",'',time()-60*60);
    }

}
