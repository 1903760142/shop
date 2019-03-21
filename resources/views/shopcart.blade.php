@extends('master')

@section('title', '黑市 购物车')

@section('content')
    <body id="loadingPicBlock" class="g-acc-bg">
    <input name="hidUserID" type="hidden" id="hidUserID" value="-1" />
    <div>
        <!--首页头部-->
        <div class="m-block-header">
            <a href="/" class="m-public-icon m-1yyg-icon"></a>
            <a href="/" class="m-index-icon">编辑</a>
        </div>
        <!--首页头部 end-->
        <div class="g-Cart-list">
            <ul id="cartBody">
                @foreach($goodsInfo as $v)
                <li>
                    <s class="xuan current"></s>
                    <a class="fl u-Cart-img" href="{{url("shopcontent/$v->goods_id")}}">
                        <img src="/uploads/{{$v->goods_img}}" border="0" alt="">
                    </a>
                    <div class="u-Cart-r">
                        <a href="{{url("shopcontent/$v->goods_id")}}" class="gray6">(已更新至第338潮){{$v->goods_name}}</a>
                        <span class="gray9">
                            <em>价值：￥{{$v->self_price}}</em>
                        </span>
                        <div class="num-opt">
                            <em class="num-mius dis min"><i></i></em>
                            <input class="text_box" name="num" maxlength="6" type="text" value="{{$v->buy_number}}" codeid="12501977">
                            <em class="num-add add"><i></i></em>
                            <input type="hidden" value="{{$v->goods_id}}" class="input">
                        </div>
                        <input type="hidden" value="{{$v->goods_id}}" class="input">
                        <a href="javascript:;" name="delLink" cid="12501977" isover="0" class="z-del" id="delete"><s></s></a>
                    </div>
                </li>
                 @endforeach
            </ul>
            <div id="divNone" class="empty "  style="display: none"><s></s><p>您的购物车还是空的哦~</p><a href="https://m.1yyg.com" class="orangeBtn">立即潮购</a></div>
        </div>
        <div id="mycartpay" class="g-Total-bt g-car-new" style="">
            <dl>
                <dt class="gray6">
                    <s class="quanxuan current"></s>全选
                    <p class="money-total">合计<em class="orange total"><span>￥</span>17.00</em></p>

                </dt>
                <dd>
                    <a href="javascript:;" id="a_payment" class="orangeBtn w_account remove">删除</a>
                    <a href="javascript:;" id="a_payment" class="orangeBtn w_account">去结算</a>
                </dd>
            </dl>
        </div>
        <div class="hot-recom">
            <div class="title thin-bor-top gray6">
                <span><b class="z-set"></b>人气推荐</span>
                <em></em>
            </div>
            <div class="goods-wrap thin-bor-top">
                <ul class="goods-list clearfix">
                    @foreach($data as $v)
                    <li>
                        <a href="{{url("shopcontent/$v->goods_id")}}" class="g-pic">
                            <img src="/uploads/{{$v['goods_img']}}" width="136" height="136">
                        </a>
                        <p class="g-name">
                            <a href="https://m.1yyg.com/v44/products/23458.do">(第<i>368671</i>潮){{$v['goods_name']}}</a>
                        </p>
                        <ins class="gray9">价值:￥{{$v['self_price']}}</ins>
                        <div class="btn-wrap">
                            <div class="Progress-bar">
                                <p class="u-progress">
                                    <span class="pgbar" style="width:1%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                            </div>
                            <div class="gRate" data-productid="23458">
                                <a href="javascript:;"><s></s></a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
        <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
@endsection

@section('my-js')
<!---商品加减算总数---->
<script type="text/javascript">
    $(function () {
        //点击加号
        $(".add").click(function () {
            var add = $(this).prev();
            var _this = $(this);
            add.val(parseInt(add.val()) + 1);
            var buy_num = _this.siblings("input[class='text_box']").val();
            var goods_id = _this.siblings("input[class='input']").val();
            var _token = $("#_token").val();
            //console.log(buy_num);
            $.post(
                "{{url('shopcartNum')}}",
                {buy_num:buy_num,_token:_token,goods_id:goods_id},
                function (res) {
                    console.log(res);
                }
            );
            GetCount();
        });
        //点击减号
        $(".min").click(function () {
            var min = $(this).next();
            var _this = $(this);
            var buy_num = _this.siblings("input[class='text_box']").val()-1;
            var _token = $("#_token").val();
            var goods_id = _this.siblings("input[class='input']").val();
            if(min.val()>1){
                min.val(parseInt(min.val()) - 1);
                GetCount();
            }
            //console.log(buy_num);
            $.post(
                "{{url('shopcartNum')}}",
                {buy_num:buy_num,_token:_token,goods_id:goods_id},
                function (res) {
                    console.log(res);
                }
            )
        })

        //数量框改变
        $(".text_box").blur(function () {
            var _this = $(this);
            var buy_num = _this.attr("value");
            console.log(buy_num);
            var _token = $("#_token").val();
            var goods_id = _this.siblings("input[class='input']").val();
        })
    })

    //删除
    $(document).on('click',"#delete",function () {
        //alert(1);
        var _this = $(this);
        var goods_id = _this.prev('input').val();
        console.log( $(this).parents('li'));
        var _token = $("#_token").val();
        $.post(
            "{{url('shopcartDel')}}",
            {goods_id:goods_id,_token:_token},
            function (res) {
                if( res==1)
                {
                    layer.msg('删除成功',{time:2000},function(){
                        _this.parents('li').remove();
                    });

                }

            }
        )
    })
</script>
<script>

    // 全选
    $(".quanxuan").click(function () {
        if($(this).hasClass('current')){
            $(this).removeClass('current');

            $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    $(this).removeClass("current");
                } else {
                    $(this).addClass("current");
                }
            });
            GetCount();
        }else{
            $(this).addClass('current');

            $(".g-Cart-list .xuan").each(function () {
                $(this).addClass("current");
                // $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
            });
            GetCount();
        }


    });
    // 单选
    $(".g-Cart-list .xuan").click(function () {
        if($(this).hasClass('current')){


            $(this).removeClass('current');

        }else{
            $(this).addClass('current');
        }
        if($('.g-Cart-list .xuan.current').length==$('#cartBody li').length){
            $('.quanxuan').addClass('current');
        }else{
            $('.quanxuan').removeClass('current');
        }
        // $("#total2").html() = GetCount($(this));
        GetCount();
        //alert(conts);
    });
    // 已选中的总额
    function GetCount() {
        var conts = 0;
        var aa = 0;
        $(".g-Cart-list .xuan").each(function () {
            if ($(this).hasClass("current")) {
                for (var i = 0; i < $(this).length; i++) {
                    conts += parseInt($(this).parents('li').find('input.text_box').val());
                    // aa += 1;
                }
            }
        });

        $(".total").html('<span>￥</span>'+(conts).toFixed(2));
    }
    GetCount();
</script>
@endsection