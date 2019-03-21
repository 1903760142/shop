<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\index\model\Record;
use Illuminate\Support\Facades\DB;
use App\Model\User;


class LoginController extends Controller
{
    //登录页面
    public function LoginIndex(){
        return view('login');
    }
    //登录
    public function LoginAdd(Request $request){
        $LoginInfo = $request->post();
        unset($LoginInfo['_token']);
        //dd($LoginInfo);
        $res = User::where('user_name',$LoginInfo['login_name'])->first();
        //dd($res);
        //dd(session('verifycode'));
        //验证手机号和密码
        if($LoginInfo['login_name']!=$res['user_name']||$LoginInfo['login_pwd']!=decrypt($res['user_pwd'])){
            echo 2;die;
        }
        //验证验证码
        if($LoginInfo['verifycode']!=session('verifycode')){
            echo 3;die;
        }

        $user['user_id'] = $res['user_id'];
        $user['user_name'] = $res['user_name'];
        //dd($user);
        if(decrypt($res['user_pwd'])==$LoginInfo['login_pwd']){
            echo 1;
            session(['LoginInfo'=>$user]);
        }else{
            echo 2;
        }

    }
}
