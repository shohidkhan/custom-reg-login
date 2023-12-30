<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHelper{
   
    public static function CreateToken($email,$id){
        $key="123-XYZ-abc";
        $payload=[
            "iss"=>"laravel-demo",
            "iat"=>time(),
            "exp"=>time()+60*60,
            "email"=>$email,
            "id"=>$id
        ];
        return JWT::encode($payload,$key,"HS256");

    }
    public static function DecodeToken($token){
        try{
            if($token===null){
                return "Unauthorized";
            }else{
                $key="123-XYZ-abc";
                $decode=JWT::decode($token,new Key($key,"HS256"));
                return $decode;
            }
        }catch(Exception $exception){
            return "Unauthorized";
        }
    }
   
}