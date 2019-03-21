<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\index\model\Record;
use Illuminate\Support\Facades\DB;
use App\Model\User;

class RegisterController extends Controller
{
    //注册页面
    public function registerIndex(){
        return view('register');
    }

    //注册
    public function registerAdd(Request $request){
        $data = $request->post();
        unset($data['_token']);
        //dd($data);
        $user = new User;
        $user->user_name = $data['user_name'];
        $user->user_pwd = encrypt($data['user_pwd']);
        $res = $user->save();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }


    //注册执行
    public function registerDo(CheckForm $request)
    {
        $request->validated();
        //验证短信验证码
        if(session('code')!=$request->code){
            echo '验证码错误,请重新输入';die;
        }

        $u_name=$request->u_name;
        //验证手机号码是否一致
        if(session('mobile')!=$u_name){
            echo '手机号与验证码不匹配';die;
        }
        $user=new User();
        //接收数据
        $user->u_name=$u_name;
        $user->u_pwd=encrypt($request->u_pwd);
        $res=$user->save();
//        获取保存的id
        $u_id=$user->u_id;
        if($res){
            session(['u_id'=>$u_id,'username'=>$u_name]);
            echo 1;
        }else{
            echo '注册失败';
        }
    }

    //发送短信验证码
    public function note($mobile){
        $host = env("MOBILE_HOST");
        $path = env("MOBILE_PATH");
        $method = "POST";
        $appcode = env("MOBILE_APPCODE");
        $headers = array();
        $code = createcode(4);
        session(['code'=>$code,'mobile'=>$mobile]);
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：".$code."，3分钟内有效！&mobile=".$mobile;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        return curl_exec($curl);
    }


}
