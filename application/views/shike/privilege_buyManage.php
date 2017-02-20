<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>优惠购买管理</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/privilege_buyManage.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧申请记录-->
        <div id="my_main" class="content_main left">
           <h1 class="title">优惠购买管理</h1>
            <!--任务说明--进展-->
            <div class="application_record">
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_privilege_buyManage/?order_status=0">所有优惠购买（<span><?php echo $sum_discount_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 1):?> class="personal_active" <?php endif;?> href="/shike_privilege_buyManage/?order_status=1">待领取优惠（<span><?php echo $sum_1_discount_list['count'];?></span>）</a></li>
                    </ul>
                </div>
                <!--商品发货状态-->
                <?php $discount_list_count=-1;?>
            <?php foreach($discount_list as $v):?>
            <?php $discount_list_count++;?>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>中奖时间：<?php echo substr($v['time'],0,10);?></span>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="<?php echo $v['product_img'];?>" alt=""></li>
                            <li>
                                <p class="clothes_name">商品名称：<span><?php echo $v['product_name'];?></span></p>
                                <p>店铺名称：<span><?php echo $v['shopname'];?></span></p>
                                <p>商品来源：<span><?php echo ($v['platform_id']==1 ? '淘宝':'天猫');?></span></p>
                                <p>商品件数：<span><?php echo $v['amount_perorder'];?>件</span>&nbsp; &nbsp; &nbsp; &nbsp;价格：<b>&yen;<?php echo $v['buy_sum'];?></b></p>
                            </li>
                        <?php if($v['status'] == 1):?>
                            <li>
                                <p>已开奖</p>
                            </li>
                            <li>
                                <p>恭喜您中了优惠购买商品的资格</p>
                                <p>快去领取优惠券购买吧！</p>
                                <p><input type="button" value="领券购买" onclick="click_ok(<?php echo $v['discount_id'];?>)"/></p>
                                 <p><span id="lefttime_<?php echo $v['discount_id'];?>"></span></p>
                            </li>
                        <?php elseif($v['status'] == 2):?>
                            <li>
                                <p>已开奖</p>
                            </li>
                            <li>
                                <p>已领取优惠</p>
                                <p></p>
                                <p>
                                    <span>联系客服QQ：</span>
                                    <a href="javascript:void(0)"><img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></a>
                                </p>
                            </li>
                        <?php else:?>
                            <li>
                                <p>已开奖</p>
                            </li>
                            <li>
                                <p>超时未领取优惠，领取通道已关闭</p>
                                <p></p>
                                <p>
                                    <span>联系客服QQ：</span>
                                    <a href="javascript:void(0)"><img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></a>
                                </p>
                            </li>
                        <?php endif;?>
                         <input type="hidden" id="discount_list_id_<?php echo $discount_list_count;?>" value="<?php echo $v['discount_id'];?>">
                        <input type="hidden" id="discount_list_time_<?php echo $discount_list_count;?>" value="<?php echo strtotime($v['time']);?>">
                        </ul>
                    </div>
                </div>
            <?php endforeach ?>
            <?php echo $pagin; ?>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script src="js/shike/left.js"></script>
<script>
    $(function(){

         var discount_list_count = <?php echo count($discount_list);?>;
        for(var i=0;i<discount_list_count;i++){
            var timestamp = $("#discount_list_time_"+i).val();
            var now ="<?php echo time();?>";
            var order_id = $("#discount_list_id_"+i).val();
            var obj = $("#lefttime_"+order_id);
            leftseconds = parseInt(timestamp)+ 3600*48 - parseInt(now);
            console.log(leftseconds);
            //console.log(obj);
            ydcountdown(leftseconds,obj);
        }
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
            $('.try_manage>ul>li').find('a').eq(2).addClass('left_nav_active');
        // });
    })


</script>
<script>
    function ydcountdown(s,obj){
    // console.log(s);
    //console.log(obj);
    var remain_seconds = s;
    // remain_seconds = remain_seconds%(3600*24);
    var hour = parseInt(remain_seconds/3600);
    hour = (hour<10?'0'+hour:hour);
    var minutes = parseInt(remain_seconds%3600/60);
    minutes = (minutes<10?'0'+minutes:minutes);
    var seconds = parseInt(remain_seconds%60);
    seconds = (seconds<10)?'0'+seconds:seconds;
    if(s<0){
        return;
    }
    // console.log(s);
    // console.log(obj);
    var timestring = '还剩'+hour+'小时'+minutes+'分'+seconds+'秒';
    var objid = obj.attr('id');
    if(!objid){
        return;
    }
    obj.text(timestring);
    //console.log(objid);
    //console.log(typeof objid);
    var discount_id = objid.substring(9);
    //console.log(objid.substring(9));
    if(s == 0){
        setTimeout("window.location.reload()",1000);
    }
    setTimeout("ydcountdown("+(s-1)+",$(\"#"+objid+"\"))","1000");
}
    
    function click_ok(o){
        var discount_id = o;
        $.ajax({
        url : admin.url+'shike_privilege_buyManage/click_ok',
        type : 'POST',
        dataType: "json",
        cache : false,
        timeout : 20000,
        data : {discount_id:discount_id},
        success : function (result){
            // console.log(result);
            window.open(result.win_url);
        },
        error : function (XMLHttpRequest, textStatus){
            console.log(XMLHttpRequest);
            console.log(textStatus);
        }
    })
    }
</script>
</body>
</html>









