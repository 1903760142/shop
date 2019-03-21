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
        return view('userpage');
    }
}
