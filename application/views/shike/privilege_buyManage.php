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
        <div class="content_main left">
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
            <?php foreach($discount_list as $v):?>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>申请时间：<?php echo substr($v['apply_time'],0,10);?></span>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/shike/sj_grzx_bg_sp_default.png" alt=""></li>
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
                                <p><input type="button" value="领券购买"/></p>
                                <p><span>还剩48小时00分00秒</span></p>
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
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.try_manage>ul>li').find('a').eq(2).addClass('left_nav_active');
        // });
    })
</script>
</body>
</html>









