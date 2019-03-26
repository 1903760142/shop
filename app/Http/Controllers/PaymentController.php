<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\index\model\Record;
use Illuminate\Support\Facades\DB;
use App\Model\Shopcart;
use App\Model\Index;
use App\Model\Ordersite;
use App\Model\Order;
use App\Model\Orderdetail;

class PaymentController extends Controller
{
    //结算页面
    public function PaymentIndex(){
        $goods_id = session('GoodsId');
        $goods_id = explode(',',$goods_id);
        //dd($goods_id);
        $goods = new Index();
        $data = $goods->where('user_id',session('LoginInfo.user_id'))
                      ->whereIn('shop_cart.goods_id',$goods_id)
                      ->join('shop_cart', 'shop_goods.goods_id', '=', 'shop_cart.goods_id')
                      ->get(['goods_name','goods_img','self_price','buy_number']);

        //dd($data);
        foreach($data as $v){
            $price = intval($v['self_price'])*intval($v['buy_number']);
        }
        return view('payment',['data'=>$data,'price'=>$price]);
    }

    //接收goods_id
    public function paymentGoodId(Request $request){
        $goods_id = $request->goods_id;
        //dd($goods_id);
        session(["GoodsId"=>$goods_id]);
        //dd( session("GoodsId"));
        if(session("GoodsId")!=''){
            echo  1;
        }
    }
}
