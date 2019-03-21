<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//首页
route::any('index','IndexController@index');
//全部商品
route::any('allshops/{id?}','AllshopsController@allshops');
route::any('allshopsSearch','AllshopsController@allshopsSearch');
route::any('goodsInfo','AllshopsController@goodsInfo');
//个人中心
route::any('userpage','UserpageController@userpage')->middleware('login');
//商品详情
route::any('shopcontent/{goods_id?}','ShopcontentController@shopcontent');
//登录
route::any('LoginIndex','LoginController@LoginIndex');
route::any('LoginAdd','LoginController@LoginAdd');
//注册
route::any('register','RegisterController@registerIndex');
route::any('registerAdd','RegisterController@registerAdd');
//购物车
route::any('shopcart','ShopcartController@shopcart')->middleware('login');
route::any('shopcartAdd/{goods_id?}','ShopcartController@shopcartAdd');
route::any('shopcartIndex','ShopcartController@shopcartIndex');
route::any('shopcartDel','ShopcartController@shopcartDel');
route::any('shopcartNum','ShopcartController@shopcartNum');
//验证码
route::any('verify/create','CaptchaController@create');
route::any('note','LoginController@note');
