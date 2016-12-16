<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情页</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/details.css")?>" >
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--<div class="line"></div>-->
    <div class="section_content">
        <div class="location">
            <ul>
                <li>您的位置：</li>
                <li>首页</li>
                <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
                <li>商品详情</li>
            </ul>
        </div>
        <!--商品详情-->
        <div class="commodity_details">
            <div class="commodity_picture left">
                <img src="<?php echo $product_details['picture_url'];?> " alt="">
            </div>
            <div class="commodity_content left">
                <h1><?php echo $product_details['product_name'];?></h1>
                <div class="serve">
                    <p class="price">价值：<b>&yen;<?php echo $product_details['amount'];?></b></p>
                    <p class="freight">运费：<b>&yen;<?php if($product_details['freight']){
                                echo number_format($product_details['freight'],2).'</b>';
                            }else
                            {
                                echo '0.00</b> <span>包邮试用</span>';
                            }?></p>
                    <p class="offer">提供<span><?php echo $product_details['amount'];?></span>份试用,目前已有<span><?php echo $product_details['apply_amount'];?></span>人申请</p>
                </div>
                <!--规格-->
                <p class="standard">指定规格：<b><?php echo $product_details['color'];?>，<?php echo $product_details['size'];?></b></p>
                <p class="number">购买数量：<b><?php echo $product_details['amount_perorder'];?>件</b></p>
                <input onclick="location.href='../apply_try/applyTry_one.html'" class="application_button" type="button" value="免费申请">
            </div>
            <div class="activity left">
                <div class="activity_time">
                    <p>活动倒计时：<span>4天23小时05分</span></p>
                </div>
                <div class="apply_step">
                    <h1>申请步骤：</h1>
                    <ul>
                        <li><span>1</span> 找宝贝</li>
                        <li><span>2</span> 加入购物车</li>
                        <li><span>3</span> 提交申请</li>
                    </ul>
                </div>
                <p>商家已缴纳试用保证金，请放心申请</p>
            </div>
        </div>
        <!--试用流程-->
        <div class="use_flow">
            <div class="has_apply"><span>已申请试用（<b><?php echo $product_details['apply_amount'];?></b>）</span></div>
            <img src="../../images/xqy_bg_lc_default.png" alt="">
        </div>
        <!--商品试用-->
        <div class="commodity_try">
            <!--左侧试用的其他的商品-->
            <div class="others_try left">
                <?php
                    echo '<h1>该商家试用的其他商品</h1>';
                    foreach($seller_else as $k=>$v) {
                        $freight = ($v['freight']) ? '' : '包邮';
                        echo '<div class="products">
                            <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="' . $v['picture_url'] . '" alt=""></a>
                            <p class="product_introduction">' . $v['product_name'] . '</p>
                            <p class="quantity">
                            <span>限量版' . $v['amount'] . '</span><span>' . $freight . '</span>
                        </p>
                        <p class="price">
                            <span>&yen;' . $v['margin'] . '</span><span>已申请<b>' . $v['apply_amount'] . '</b>次</span>
                        </p>
                    </div>';
                    }

                    echo '<h1>申请了本商品的还申请了</h1>';
                    foreach ($seller_else as $k => $v) {
                        $freight = ($v['freight']) ? '' : '包邮';
                        echo '<div class="products">
                        <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="' . $v['picture_url'] . '" alt=""></a>
                        <p class="product_introduction">' . $v['product_name'] . '</p>
                        <p class="quantity">
                        <span>限量版' . $v['amount'] . '</span><span>' . $freight . '</span>
                    </p>
                    <p class="price">
                        <span>&yen;' . $v['margin'] . '</span><span>已申请<b>' . $v['apply_amount'] . '</b>次</span>
                    </p>
                </div>';
                    }
                ?>

            </div>
            <!--右侧试用商品的详情-->
            <div class="try_details left">
                <h1>试用详情</h1>
                <div class="details_picture">
                    <img src="../../images/xqy_bg_xq1_default.png" alt="">
                    <img src="../../images/xqy_bg_xq2_default.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="../../js/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load('../common/details_header.html');
        $('#footer').load('../common/footer.html');
    })
</script>
</body>
</html>