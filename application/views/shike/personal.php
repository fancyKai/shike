<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/modal_alert.css">
    <link rel="stylesheet" href="css/shike/personal_center.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧个人中心-->
        <div class="content left">
            <!--会员信息及试用押金说明-->
            <div class="member_power">
                <!--个人信息-->
                <div class="left personal_details">
                    <div class="left  avatar">
                        <img src="images/merchant/sj_grzx_icon_touxiang_default.png" alt="">
                    </div>
                    <div class="left username">
                        <h1>无所谓A <span>请先 <a href="../03_account_information/01_basic_setup.html">绑定淘宝账号</a></span></h1>
                        <p>会员等级：<span>普通会员</span> <b>2016.12.12会员到期</b></p>
                        <input onclick="location.href='../03_account_information/03_member_recharge.html'" type="button" value="开通VIP会员"/>
                    </div>
                </div>
                <!--可提现本金-->
                <div class="left capital_sum">
                    <p>
                        可提现本金：<span>890.00</span>元
                        <input onclick="location.href='../04_funds_manage/01_deposit_withdraw.html'" type="button" value="立即提现"/>
                    </p>
                    <p>
                        待平台返还本金：<span>1589.00</span>元（<b>6</b>）笔
                    </p>
                </div>
            </div>


            <!--任务说明--进展-->
            <div class="task_specification">
                <h1>
                    <span>任务进展</span>
                    下方如有提示请点击操作，超过48小时未操作，平台自动确认。
                </h1>
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_personal?order_status=0">所有中奖试用（<span><?php echo $sum_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_personal?order_status=4">待领取下单（<span><?php echo $sum_4_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_personal?order_status=6">待收货评价（<span><?php echo $sum_6_order_list['count'];?></span>）</a><b>|</b></li>
                    </ul>
                </div>
                <!--商品发货状态-->
                <?php $order_list_count=-1;?>
            <?php foreach($order_list as $v):?>
                <?php $order_list_count++;?>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>申请时间：<?php echo substr($v['time'],0,10);?></span>
                            <span>任务编号：<?php echo $v['order_id'];?></span>
                            <span>淘宝商品订单号：<?php echo $v['out_sorderid']?></span>
                        </p>
                        <p class="right">
                            <a href="/shike_try_winningManage_details?order_id=<?php echo $v['order_id'];?>">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/order_<?php echo $v['order_id'];?>.png" alt=""></li>
                            <li>
                                <p class="clothes_name"><span><?php echo $v['product_name'];?></span></p>
                                <p class="two">店铺：<span><?php echo $v['shopname'];?></span></p>
                                <p>来源：<span><?php  echo ($v['platform_id']==1 ? '淘宝':'天猫');?></span></p>
                            </li>
                        <?php if($v['status'] == 1):?>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status">试用待商家发货</p>
                                <p>
                                    <span>联系客服QQ:</span>
                                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                        <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                    </a>
                                </p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 2):?>
                            <li>
                                <p>待审核评价</p>
                            </li>
                            <li>
                                <p class="status">试用待商家审核评价</p>
                                <p>
                                    <span>联系客服QQ:</span>
                                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                        <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                    </a>
                                </p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 3):?>
                            <li>
                                <p>待确认评价</p>
                            </li>
                            <li>
                                <p class="status">试用待商家确认评价</p>
                                <p>
                                    <span>联系客服QQ:</span>
                                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                        <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                    </a>
                                </p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 4):?>
                            <li>
                                <p>待领取下单</p>
                            </li>
                            <li>
                                <p class="place_order">
                                    <input onclick="location.href='getOrders_stepOne.html'" type="button" value="领取下单"/>
                                </p>
                                <p><span>还剩48小时00分00秒</span></p>
                                <p><a  id="place_order" href="javascript:void(0);">查看下单领取规则</a></p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 5):?>
                            <li>
                                <p>待复制评价</p>
                            </li>
                            <li>
                                <p onclick="location.href='taobao_evaluation.html'"  class="btn" id="audit"><input type="button" value="淘宝评价"/></p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 6):?>
                            <li>
                                <p>待收货评价</p>
                            </li>
                            <li>
                                <p class="btn"><input onclick="location.href='preliminary_evaluation.html'" type="button" value="初步评价"/></p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 7):?>
                            <li>
                                <p>已完成</p>
                            </li>
                            <li>
                                <p class="try_finish">试用已完成</p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 8):?>
                            <li>
                                <p>已取消</p>
                            </li>
                            <li>
                                <p class="status">试用已取消</p>
                                <p>
                                <span>联系客服QQ:</span>
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                    <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                </a>
                                </p>
                            </li>
                        <?php endif;?>
                        </ul>
                    </div>
                </div>
            <?php endforeach ?>
            <?php echo $pagin; ?>

                <!--查看更多按钮-->
                <div class="see_more">
                    <input onclick="location.href='/shike_try_winningManage'" type="button"/>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--弹框--下单-->
<div class="place_order_modal ">
    <div class="modal_box">
        <div class="modal_content">
            <h1>下单领取规则：</h1>
            <p>1、请在中奖后的48小时内完成下单领取，超时系统将取消中奖资格；</p>
            <p>2、请核对下单淘宝账号为平台绑定淘宝账号：asd，禁止用其他淘宝账号下单；</p>
            <p>3、此次使用商品指定规格为：每单拍1件  红色  大号 请勿拍错；</p>
            <p>4、旺旺聊天时禁止提及试用、免费送等敏感字眼；</p>
            <p>5、下单禁止使用淘宝客、返利网、花呗、信用卡、代付等返利方式下单；</p>
            <p>6、未收到商品前，禁止提前确认收货好评。</p>
            <p><span>如违反以上规则，发现第1次冻结账号7天，第2次冻结账号15天，第3次及以上永久封号不予中奖！</span></p>
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
        $('#left_nav').load("../common/left_nav.html",function(){
            $('.personal_center').find('a').addClass('left_nav_active');
        });
//        标题的点击事件
        $('.order').bind('click',function(){
            $(this).find('a').addClass('personal_active');
            $(this).siblings().find('a').removeClass('personal_active');
        });
//          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认发货
        $('#place_order').bind('click',function(){
            $('.place_order_modal').css('display','block');
            disableScroll();
        });

        $('.confirm').bind('click',function(){
            $('.place_order_modal').css('display','none');
            enableScroll();
        });
    })
</script>
</body>
</html>









