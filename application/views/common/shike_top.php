<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商家中心--头部</title>
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/header.css">
</head>
<body>
<!--商城的头部-->
    <div class="header">
        <!--顶部-->
        <div class="top">
            <div class="top_main">
                <ul>
                    <li ><a href="<?=base_url('')?>">返回首页</a></li>
                    <?php
                    echo '<li><a href="'.base_url('shike_personal').'">欢迎您：<span>'.$_SESSION['user_name'].'  <img src="'.base_url("images/mall/nav_icon_tx_default.png").'" alt=""></span></a></li>';
                    ?>
                    <li><a href="/login/logout">退出</a></li>
                    <li><a href="/mall/help_center/help_center">帮助中心</a></li>
                </ul>
            </div>
        </div>
        <!--Logo和搜索框-->
        <div class="search">
            <div class="left" style="padding-top: 9px;">
                <img class="logo" onclick="location.href='<?=base_url('')?>'" src="images/shike/xqy_logo_default.png" alt="">
                <span class="details_title">试客中心</span>
            </div>
        </div>
        <div class="line"></div>
    </div>
</body>
</html>










