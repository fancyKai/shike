<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商家中心--头部</title>
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/merchant_header.css">
</head>
<body>
<!--商城的头部-->
    <div class="header">
        <!--顶部-->
        <div class="top">
            <div class="top_main">
                <ul>
                    <li ><a href="<?=base_url('mall/homepage/index')?>">返回首页</a></li>
                    <li><a class="merchant_active" href="/merchant_personal"><?php echo $this->session->userdata('user_name');?></a></li>
                    <li><a href="javascript:void(0);">退出</a></li>
                    <li><a href="/mall/help_center/help_center">帮助中心</a></li>
                </ul>
            </div>
        </div>
        <!--Logo和搜索框-->
        <div class="search">
            <div class="left">
                <img class="logo" onclick="location.href='<?=base_url('mall/homepage/index')?>'" src="images/merchant/xqy_logo_default.png" alt="">
                <span class="details_title">商家中心</span>
            </div>
        </div>
        <div class="line"></div>
    </div>
</body>
</html>
