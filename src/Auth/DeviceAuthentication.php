<?php

namespace Chamal\DeviceAuthentication\Auth;

use DB;
use Chamal\DeviceAuthentication\Entities\Token;
use Request;
use Carbon\Carbon;

class DeviceAuthentication
{
    public function getToken($device_id,$user_id) {
        $token = Token::where('device_id',$device_id)
                ->where(function($query) use($user_id){
                    $query->where('user_id',$user_id);
                })
                ->first();
        if($token==null)
        {
            return 0;
        }
        else
        {
            return $token->token;
        }
    }
    public function setToken($device_id,$device_type,$device_push_token,$user_id) {
        //generate token
        $token = str_random(32);
        $data = Token::create(['device_id'=> $device_id,'token'=>$token,'device_type'=> $device_type,'device_push_token'=> $device_push_token,'user_id'=> $user_id,]);
        return $token;
    }
    public function validateToken($token) {
        $token = Token::where('token',$token)->first();
        if($token==null)
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
    public function discardToken($device_id,$token=0) {
        if($token==0)
        {
            //delete all the tokens associated with device
            $tokens = Token::where('device_id',$device_id)->get();
            $tokens = delete();
        }
        else
        {
            $token = Token::where('token',$token)->get();
            $token = delete();
        }
        return 1;
    }
}