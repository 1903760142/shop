<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\index\model\Record;
use Illuminate\Support\Facades\DB;
use App\Model\Index;
use App\Model\User;

class UserpageController extends Controller
{
    //个人中心页面
    public function userpage(){
        $userlogin = '';
        if(empty(session('LoginInfo'))){
            $userlogin = 1;
        }
        $data = User::where('user_id',session("LoginInfo.user_id"))->first();
        //dd($data);
        return view('userpage',['userlogin'=>$userlogin,'data'=>$data]);
    }

    //个人资料
    public function EdituserIndex(){
        $data = User::where('user_id',session("LoginInfo.user_id"))->first();
        return view("edituser",['data'=>$data]);
    }

    //超购记录
    public function BuyrecordIndex(){
        return view('buyrecord');
    }

    //我的钱包
    public function MywalletIndex(){
        return view('mywallet');
    }

    //宣传我们
    public function InviteIndex(){
        return view('invite');
    }
    //晒单
    public function WillshareIndex(){
        return view('willshare');
    }
    //退出登录
    public function Userquit(){
        session(['LoginInfo'=>null]);
        if(empty(session('LoginInfo'))){
            return redirect('LoginIndex');
        }
    }
}
