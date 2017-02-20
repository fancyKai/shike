<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>消息详情</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/message_details.css">
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
                    <a class="personal_active" href='<?=base_url('')?>'>首页</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a class="personal_active" href="/shike_personal">试客中心</a>
                </li>
                <li class="order"><img src="images/shike/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="/shike_message_center">消息通知</a>
                </li>
                <li class="order"><img src="images/shike/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">消息详情</li>
            </ul>
        </div>
        <h1><?php echo $message['title'];?></h1>
        <p>时间：<?php echo $message['message_time'];?></p>
        <div  class="content">
            <p>
                <?php echo $message['description'];?>
            </p>
        </div>
    </div>
</section>
<footer id="footer"></footer>

<script src="../../js/jquery-1.10.2.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
            $('.message_center').find('a').addClass('left_nav_active');
        // });

    })
</script>
</body>
</html>









