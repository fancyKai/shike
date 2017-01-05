<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>忘记密码</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/forget_password.css">
</head>
<body>
<header id="header"></header>
<div class="line"></div>
<section id="section">
    <!--修改密码-->
    <div class="change_password left">
        <div class="phone">
            <span>手机号码</span>
            <input type="text" placeholder="您在注册时填写的手机号码" />
        </div>
        <!--错误提示-->
        <p class="error"><span>手机号码不能为空</span></p>
        <div class="new_password">
            <span>新&nbsp;密&nbsp;码</span>
            <input type="password" placeholder="建议使用至少两种字符组合" />
        </div>
        <!--错误提示-->
        <p class="error"><span></span></p>
        <div class="affirm_password">
            <span>确认密码</span>
            <input type="password" placeholder="请再次输入密码" />
        </div>
        <!--错误提示-->
        <p class="error"><span></span></p>
        <div class="auth_code">
            <span>验&nbsp;证&nbsp;码</span>
            <input type="text" placeholder="请输入手机验证码" />
            <span class="gain">获取验证码</span>
        </div>
        <!--错误提示-->
        <p class="error"><span></span></p>
        <div class="register_now">
            <input type="button" value="提交">
        </div>
    </div>
    <!--账户信息-->
    <div class="account_related right">
        <div class="has_account">
            <h1>已有账号？</h1>
            <input onclick="location.href='login.html'" type="button" value="立即登录"/>
        </div>
        <div class="no_account">
            <h1>还没有账号？</h1>
            <input  onclick="location.href='business_registration.html'" type="button" value="注册商家"/>
            <input type="button" value="注册试客"/>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="../../js/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load('../common/login_header.html',function(){
            $('.details_title').text('忘记密码')
        });
        $('#footer').load('../common/footer.html');
    })
</script>
</body>
</html>