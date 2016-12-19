<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>绑定银行卡</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/bound_bankCard.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--修改登录密码-->
        <div class="bound_bankCard left">
            <h1 class="title">绑定银行卡</h1>
            <div class="bankCard_kind">
                <p class="bound_num">
                    <input onclick="location.href='/merchant_add_bankCard'" type="button" value="添加银行卡"/>
                    最多可以绑定1张银行卡，绑定的银行卡仅限于提现。联系客服QQ：
                    <a href="javascript:void(0);"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a>
                </p>
                <div class="notBound_bankCard">
                    <img src="images/merchant/sj_zhxx_bg_wbdyhk_default.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>

<script src="js/merchant/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");
    })
</script>
</body>
</html>









