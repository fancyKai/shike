<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <!--<link rel="stylesheet" href="../../css/reset_content.css">-->
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/activity_details.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--活动详情-->
    <div class="activity_details">
        <!--所在位置-->
        <div class="location_title">
            <ul>
                <li>你所在的位置：</li>
                <li class="order">
                    <a class="personal_active" href="javascript:void(0);">首页</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="/merchant_activity_manage">活动管理</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">活动详情</li>
            </ul>
        </div>
        <!--商品发货状态-->
        <div class="commodity_information">
            <h1>试用信息：</h1>
            <div class="title">
                        <p class="left">
                            <span><?php echo substr($act['gene_time'],0,10);?></span>
                            <span>活动订单号：<?php echo $act['act_id'];?></span>
                        </p>
                    </div>
            <div class="details">
                <ul>
                            <li><img src="images/merchant/sj_grzx_bg_sp_default.png" alt=""></li>
                            <li>
                                <p>商品名称：<span><?php echo $act['product_name'];?></span></p>
                                <p>商品分类：<span><?php echo $act['product_classify'];?></span></p>
                                <p>商品规格：<span><?php echo $act['color'];?>.<?php echo $act['size'];?></span></p>
                                <p>商品分类：<span><a href="javascript:void(0);">https://wwww.yuntuigpi.com</a></span></p>
                            </li>
                            <li>
                                <p>店铺名称：<span><?php echo $act['shopname'];?></span></p>
                                <p>平台：<span><?php echo $act['platformid'];?></span></p>
                                <p><span>通过淘宝自然搜索</span></p>
                            </li>
                            <li>
                                <p>商品关键词：<span><?php echo $act['product_classify'];?></span></p>
                                <p>筛选列表：<span>香奈儿、裙装...</span></p>
                                <p>折扣和服务：<span>24小时发货、货到付款</span></p>
                                <p>排列方式：<span>综合排序</span></p>
                            </li>
                            <li>
                                <p>单价：<span><b>&yen;1000</b>每单拍<b>1</b></span></p>
                                <p>试用份数：<b><?php echo $act['amount'];?>份</b></p>
                                <p>发货地：<span>全国</span></p>
                                <p>商品运费：<span>全国包邮</span></p>
                            </li>
                        </ul>
            </div>
            <h1>订单信息：</h1>
            <table>
                <tr>
                    <th></th>
                    <th>商品单价</th>
                    <th>免单数量</th>
                    <th>备注</th>
                    <th>合计</th>
                </tr>
                <tr>
                    <td>商品押金</td>
                    <td><span>20元</span></td>
                    <td><span>5单</span></td>
                    <td>
                        <p><span>商品押金=商品单价*免单数量</span></p>
                        <p>试用完成后，平台直接将押金返给试客</p>
                    </td>
                    <td><b>100元</b></td>
                </tr>
                <tr>
                    <td>试用担保金</td>
                    <td><span>20元</span></td>
                    <td><span>5单</span></td>
                    <td>
                        <p><span>试用担保金=商品押金*5%</span></p>
                        <p>试用完成后，平台会自动将试用担保金返回到您的账户可用押金中。</p>
                    </td>
                    <td><b>5元</b></td>
                </tr>
            </table>
            <p class="total">订单合计：<span>10005元</span></p>
            <div class="order_status">
                <p>订单状态：<span>待付款</span></p>
                <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></p>
            </div>
            <!--实际付款-->
            <div class="payment_box">
            <div class="actual_payment">
                <p class="real_payment">实付款：<span>&yen;105.00</span></p>
                <p class="deposit">使用押金支付：可用押金：<span>&yen;20</span></p>
                <p class="explain">可用押金不足，请先充值押金，然后在试用活动-待付款活动中进行支付</p>
                <div class="payment_code">
                    <p>请输入支付密码：</p>
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
            </div>
            </div>

            <div class="nextStep_btn">
                <input id="cancel_order" type="button" value="取消订单"/>
                <input id="confirm_payment" type="button" value="确认付款"/>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--弹框--取消订单-->
<div class="cancel_order_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="../../images/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认付款-->
           <p class="confirm_cancel">确认取消订单？</p>
        </div>
        <div class="modal_submit">
            <input type="button" value="确定"/>
            <input class="cancel" type="button" value="取消"/>
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
                <img src="../../images/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="../../images/sj_fbsy_tc_icon_right_default.png" alt=""></p>
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
        $('#cancel_order').bind('click',function(){
            $('.cancel_order_modal').css('display','block');
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
            $('.cancel_order_modal,.paymentFailure_modal,.payment_modal').css('display','none');
            enableScroll();
        });
    })
</script>
</body>
</html>









