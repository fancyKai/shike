<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<title>商城头部</title>-->
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="<?=base_url('css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/mall/header.css')?>">
</head>
<body>
<!--商城的头部-->
<div class="header">
    <!--顶部-->
    <div class="top">
        <div class="top_main">
            <ul>
                <li><a href="<?=base_url('')?>">返回首页</a></li>
                <li><a href="<?=base_url('mall/help_center/help_center')?>">帮助中心</a></li>
            </ul>
        </div>
    </div>
    <!--Logo和搜索框-->
    <div class="search">
        <div style="padding-top:9px">
            <img class="logo" onclick="location.href='<?=base_url('')?>'" src="<?=base_url('images/mall/xqy_logo_default.png')?>" alt="">
            <span class="details_title">欢迎登录</span>
        </div>
    </div>
</div>
</body>
</html>