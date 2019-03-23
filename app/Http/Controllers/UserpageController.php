<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\index\model\Record;
use Illuminate\Support\Facades\DB;
use App\Model\Index;

class UserpageController extends Controller
{
    //个人中心页面
    public function userpage(){
        $userlogin = '';
        if(empty(session('LoginInfo'))){
            $userlogin = 1;
        }
        return view('userpage',['userlogin'=>$userlogin]);
    }
}
