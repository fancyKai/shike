<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/activity_manage.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧活动中心-->
        <div class="content left">
            <div class="activity_manage">
                <h1 class="title">活动管理</h1>
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=0">所有活动（<span><?php echo $sum_activity_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 1):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=1">待付款活动（<span><?php echo $sum_1_activity_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 2):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=2">待发布活动（<span><?php echo $sum_2_activity_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 3):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=3">待开奖活动（<span><?php echo $sum_3_activity_list['count'];?></span>）</a></li>
                        <li class="order"><a <?php if($order_status == 4):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=4">已开奖活动（<span><?php echo $sum_4_activity_list['count'];?></span>）</a></li>
                    </ul>
                </div>
                <!--商品发货状态-->
                <?php foreach($activity_list as $v):?>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span><?php echo substr($v['gene_time'],0,10);?></span>
                            <span>活动编号：<?php echo $v['act_id'];?></span>
                        </p>
                        <p class="right">
                            <a href="/merchant_activity_details?act_id=<?php echo $v['act_id'];?>">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/sj_grzx_bg_sp_default.png" alt=""></li>
                            <li>
                                <p>商品名称：<span><?php echo $v['product_name'];?></span></p>
                                <p>店铺名称：<span><?php echo $v['shopname'];?></span></p>
                                <p>商品来源：<span><?php echo $v['platformid'];?></span></p>
                                <p>商品分类：<span>女装，每单拍1个</span></p>
                            </li>
                            <li>
                                <p>商品押金：<span><?php echo $v['deposit'];?>元</span></p>
                                <p>试用担保金：<span><?php echo $v['margin'];?>元</span></p>
                                <p>商品运费：<span><?php echo $v['freight'];?>元</span></p>
                                <p>订单合计：<span><?php echo $v['total_money'];?>元</span></p>
                            </li>                            
                            <?php if($v['status'] == 1):?>
                            <li>
                                <p><span>待付款</span></p>
                            </li>
                            <li>
                                <p class="status">
                                    <span>
                                        <input id="pay_now" type="button" value="立即付款"/>
                                    </span>
                                </p>
                                <p>还剩48小时00分00秒</p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 2):?>
                            <li>
                                <p><span>待发布</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动正在审核中</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 3):?>
                            <li>
                                <p><span>待开奖</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动待开奖</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 4):?>
                            <li>
                                <p><span>已开奖</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动已开奖</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 5):?>
                            <li>
                                <p><span>已取消</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动已取消</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--弹框--确认发货-->
<div class="pay_now_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认付款-->
           <p>请输入支付密码</p>
            <table>
                <tr>
                    <td><input type="text"/></td>
                    <td><input type="text"/></td>
                    <td><input type="text"/></td>
                    <td><input type="text"/></td>
                    <td><input type="text"/></td>
                    <td><input type="text"/></td>
                </tr>
            </table>
        </div>
        <div class="modal_submit">
            <input id="confirm_payment"type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<!--确认付款成功弹框-->
<div class="payment_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">支付成功！</p>
            <p>请等待客服审核任务审核通过后会上线发布。</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--确认付款失败弹框-->
<div class="paymentFailure_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="../../images/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="../../images/sj_fbsy_tc_icon_no_default.png" alt=""></p>
            <p class="payment_succeed">支付失败！</p>
            <p style="height:20px;"></p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/modal_scrollbar.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");
//        标题的点击事件
        $('.order').bind('click',function(){
            $(this).find('a').addClass('personal_active');
            $(this).siblings().find('a').removeClass('personal_active');
        });
//          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认付款弹框
        $('#pay_now').bind('click',function(){
            $('.pay_now_modal').css('display','block');
            disableScroll();
        });
//        付款成功弹框
//        $('#confirm_payment').bind('click',function(){
//            $('.payment_modal').css('display','block');
//            $('.pay_now_modal').css('display','none');
//            disableScroll();
//        });
//        付款失败弹框
       $('#confirm_payment').bind('click',function(){
        $('.paymentFailure_modal').css('display','block');
        disableScroll();
        });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.pay_now_modal,.paymentFailure_modal,.payment_modal').css('display','none');
            enableScroll();
        });
    })
</script>
</body>
</html>









