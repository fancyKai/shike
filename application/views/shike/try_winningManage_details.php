<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>试用中奖详情</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/winningManage_details.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--订单详情-->
    <div class="order_details">
        <!--所在位置-->
        <div class="location_title">
            <ul>
                <li>你所在的位置：</li>
                <li class="order">
                    <a class="personal_active" href="/shike_personal">个人中心</a>
                </li>
                <li class="order"><img src="images/shike/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="/shike_try_winningManage">试用中奖管理</a>
                </li>
                <li class="order"><img src="images/shike/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">试用中奖详情</li>
            </ul>
        </div>
        <!--商品发货状态-->
        <div class="commodity_information">
            <h1>中奖试用信息：</h1>
            <div class="title">
                <p class="left">
                    <span><?php echo substr($order['time'],0,10);?></span>
                    <span>活动订单号：<?php echo $order['order_id'];?></span>
                </p>
            </div>
            <div class="details">
                <ul>
                    <li><img src="images/merchant/merchant.png" alt=""></li>
                    <li>
                        <p>商品名称：<span><?php echo $order['product_name'];?></span></p>product_classify
                        <p>商品分类：<span><?php echo $order['product_classify'];?></span></p>
                        <p>商品规格：<span><?php echo $order['color'];?>.<?php echo $order['size'];?></span></p>
                        <p>商品链接：<span><a href="javascript:void(0);"><?php echo $order['product_link'];?></a></span></p>
                    </li>
                    <li>
                        <p>店铺名称：<span><?php echo $order['shopname'];?></span></p>
                        <p>平台：<span><?php  echo ($order['platform_id']==1 ? '淘宝':'天猫');?></span></p>
                        <p>单价：<span><b>&yen;<?php echo $order['unit_price'];?></b>每单拍<b><?php echo $order['amount_perorder'];?></b>个</span></p>
                        <p>商品：<span>全国包邮</span></p>
                    </li>
                </ul>
            </div>
        <!--状态为8 已取消状态处理流程-->
        <?php if($order['status'] == 8):?>
            <h1>试用下单信息：</h1>
            <div class="application_information">
                <p class="no_information">暂无申请信息</p>
            </div>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>已取消</span></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
        <!--状态为4 待领取状态处理流程-->
        <?php elseif($order['status'] == 4):?>
            <h1>下单领取规则：</h1>
            <div class="placeOrder_rule">
                <p>1、请在中奖后的<b>48小时内完成</b>下单领取，超时系统将取消中奖资格；</p>
                <p>2、请核对下单淘宝账号为平台绑定淘宝账号：<b></b>asd</b>，禁止用其他淘宝账号下单；</p>
                <p>3、此次使用商品指定规格为：<b>每单拍<?php echo $order['amount_perorder'];?>件  <?php echo $order['color'];?>  <?php echo $order['size'];?></b> 请勿拍错；</p>
                <p>4、旺旺聊天时禁止提及试用、免费送等敏感字眼；</p>
                <p>5、下单禁止使用淘宝客、返利网、花呗、信用卡、代付等返利方式下单；</p>
                <p>6、未收到商品前，禁止提前确认收货好评。</p>
                <p><span>如违反以上规则，发现第1次冻结账号7天，第2次冻结账号15天，第3次及以上永久封号不予中奖！</span></p>
            </div>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>待领取下单</span></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
        <!--除状态8和状态4外均有试用详细信息-->
        <?php else:?>
            <h1>试用下单信息</h1>
            <!--下单领取规则-->
            <div class="application_information">
                <!--收藏宝贝与店铺-->
                <div class="content">
                    <p class="application_title">收藏宝贝与店铺</p>
                    <div class="screenshot">
                        <div class="left collect">
                            <p>宝贝收藏截图：</p>
                            <div class="picture">
                                <img src="../../images/sj_ddgl_bg_scbb_default.png" alt="">
                            </div>
                        </div>
                        <div class="left collect">
                            <p>店铺收藏截图</p>
                            <div class="picture">
                                <img src="../../images/sj_ddgl_bg_scdp_default.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--浏览店铺-->
                <div class="content">
                    <p class="application_title">浏览店铺</p>
                    <div class="browse_shop">
                        <p class="baby_url">宝贝链接1：http://item.taobao.comitem.taohttp://item.taobao.comitem.taohttp://item.taobao.comitem.taohttp://item.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.com</p>
                        <p class="baby_url">宝贝链接1：http://item.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.com</p>
                        <p class="baby_url">宝贝链接1：http://item.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.comitem.taobao.com</p>
                    </div>
                </div>
                <!--客服聊天-->
                <div class="content">
                    <p class="application_title">客服聊天</p>
                    <div class="serviceChat">
                        <div class="left collect">
                            <div class="picture">
                                <img src="../../images/sj_ddgl_bg_ltjt1_default.png" alt="">
                            </div>
                        </div>
                        <div class="left collect">
                            <div class="picture">
                                <img src="../../images/sj_ddgl_bg_ltjt2_default.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--淘宝订单-->
                <div class="content">
                    <p class="application_title">淘宝订单</p>
                    <div class="taobao_order">
                        <p><span>订单号：12345678978943</span><span>实际付款金额：&yen;123.00</span></p>
                        <div>
                            <img src="images/shike/sj_ddgl_bg_tbdd_default.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <!--当为状态2 3 5 7时 出现评价信息的详细信息-->
        <?php if($order['status'] == 2 || $order['status'] == 3 || $order['status'] == 5 || $order['status'] == 7):?>
            <!--评价信息-->
            <h1>评价信息</h1>
            <div class="evaluate_information">
                <!--评价内容-->
                <div class="content">
                    <p class="application_title">评价内容</p>
                    <div class="evaluate_content">
                        <p>
                            yingyignyigngiigjigigggggggggggggggggggggggggggggggggg
                            gggggggggggggggggggggggggggggggggggggggggggggggggggg
                            ggggggggggggggggggggggggggggggggggggggggggggggggggggggg
                            ggggggggggggggggggggggggggggggggggggggggggggggggggggggg
                        </p>
                    </div>
                </div>
                <!--晒单照片-->
                <div class="content">
                    <p class="application_title">晒单照片</p>
                    <div class="show_picture">
                        <ul>
                            <li><img src="../../images/sj_ddgl_bg_sdzp3_default.png" alt=""></li>
                            <li><img src="../../images/sj_ddgl_bg_sdzp3_default.png" alt=""></li>
                            <li><img src="../../images/sj_ddgl_bg_sdzp3_default.png" alt=""></li>
                            <li><img src="../../images/sj_ddgl_bg_sdzp3_default.png" alt=""></li>
                            <li><img src="../../images/sj_ddgl_bg_sdzp3_default.png" alt=""></li>
                        </ul>
                    </div>
                </div>
            <?php if($order['status'] == 3 || $order['status'] == 7):?>
                <!--淘宝评价截图-->
                <div class="content">
                    <p class="application_title">淘宝评价截图</p>
                    <div class="taobao_evaluate">
                        <img src="../../images/sj_ddgl_bg_pjjt_default.png" alt="">
                    </div>
                </div>
            <?php endif;?>
            </div>
        <?php endif;?>
        <?php if($order['status'] == 1):?>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>待发货</span></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
        <?php elseif($order['status'] == 2):?>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>待审核评价</span></p>
                <p>物流公司：<b><?php echo $order['wuliu'];?></b></p>
                <p>运单号：<b><?php echo $order['yundan'];?></b></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
        <?php elseif($order['status'] == 3):?>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>待确认评价</span></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
        <?php elseif($order['status'] == 5):?>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>待复制评价</span></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
            <!--淘宝评价按钮-->
            <div class="btn">
                <input id="confirm_pass" type="button" value="淘宝评价"/>
            </div>
        <?php elseif($order['status'] == 6):?>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>待收货评价</span></p>
                <p>物流公司：<b>申通快递</b></p>
                <p>运单号：<b>123456789</b></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
            <!--收货评价按钮-->
            <div class="btn">
                <input id="confirm_pass" type="button" value="收货评价"/>
            </div>
        <?php elseif($order['status'] == 7):?>
            <!--订单状态-->
            <div class="order_status">
                <p>订单状态：<span>已完成</span></p>
                <p>联系客服：<img src="images/shike/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
        <?php endif;?>
        </div>
    </div>
</section>
<footer id="footer"></footer>

<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
    })
</script>
</body>
</html>









