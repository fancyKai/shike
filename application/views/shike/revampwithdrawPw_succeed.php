<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改提现密码</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/revamp_loginPw.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--修改登录密码成功-->
        <div id="my_main" class="basic_setup left">
            <h1 class="title">修改提现密码</h1>
            <div class="revamp_succeed">
                <p><img src="images/merchant/sj_zhxx_icon_right_default.png" alt=""></p>
                <p>恭喜您，修改成功！</p>
                <p>您的账户信息还能继续完善，快去
                    <a href="/shike_basic_setup">基本设置</a>
                    完善其他设置吧！
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/shike/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
            $('.account_information ul>li').find('a').eq(0).addClass('leftNav_active')
        // });
    })
</script>
</body>
</html>








