<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\index\model\Record;
use Illuminate\Support\Facades\DB;
use App\Model\Index;
use App\Model\Allshops;

class IndexController extends Controller
{
    //首页
    public function index(){
        $data = Index::all();
        $pid = Allshops::where('pid',0)->get();
        //dd($data);
        return view('index',['data'=>$data,'pid'=>$pid]);
    }
}
