<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商家注册</title>
    <link rel="stylesheet" href="<?=base_url('css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/mall/forget_password.css')?>">
</head>
<body>
<header id="header"></header>
<div class="line"></div>
<section id="section">
    <!--修改密码-->
    <div class="change_password left">
        <div class="new_password">
            <span>用&nbsp;户&nbsp;名</span>
            <input id="username" type="password" class="user_name" placeholder="您的账户名和登录名" />
        </div>
        <!--错误提示-->
        <p class="user_name error"><span class="username_error"></span></p>
        <div class="phone">
            <span>手机号码</span>
            <input type="text" id="phone" class="phone2" placeholder="建议使用常用手机" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="phone_error"></span></p>
        <div class="affirm_password">
            <span>登录密码</span>
            <input type="password" id="loginPwd" class="password" placeholder="建议使用至少两种字符组合" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="loginPwd_error"></span></p>
        <div class="affirm_password">
            <span>确认密码</span>
            <input id="confirmPwd" type="password" class="re_password" placeholder="请再次输入密码" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="confirmPwd_error"></span></p>
        <div class="new_password">
            <span>Q&nbsp;Q&nbsp;号</span>
            <input id="qq" type="password" class="user_qq" placeholder="建议使用常用的QQ号" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="qq_error"></span></p>
        <div class="auth_code">
            <span>验&nbsp;证&nbsp;码</span>
            <input type="text" class="verification_code" placeholder="请输入手机验证码" />
            <span class="gain"><input id="testGetCode" type="text" value="获取验证码"/></span>
        </div>
        <!--错误提示-->
        <p class="error"><span></span></p>
        <!--注册协议-->
        <div class="registration_protocol">
            <input type="checkbox" checked><span>我已认证阅读并同意云推购的 <a target="_blank" href="service_agreement.html ">《用户注册协议》</a></span>
        </div>
        <div class="register_now">
            <input type="button" onclick="register()" value="立即注册">
        </div>
    </div>
    <!--账户信息-->
    <div class="account_related right">
        <div class="has_account">
            <h1>你还可以：</h1>
            <input onclick="location.href='<?=base_url('mall/register/merchant_register')?>'" type="button" value="注册商家"/>
        </div>
        <div class="no_account">
            <h1>已有账号？</h1>
            <input  onclick="location.href='login.html'" type="button" value="立即登录"/>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="<?=base_url('js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url("js/mall/input_verify.js")?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/login_header.html',function(){

         });*/
        $('.details_title').text('商家注册');
        //$('#footer').load('../common/footer.html');
    })

    function register()
    {
        var user_name = $('.user_name').val();
        var phone = $('.phone2').val();
        var password = $('.password').val();
        var user_qq = $('.user_qq').val();
        var verification_code = $('.verification_code').val();
        $.ajax({
            url:"<?=base_url('mall/register/register_merchant')?>",
            method: 'post',
            data:{
                user_name:user_name,
                phone:phone,
                password:password,
                user_qq:user_qq,
                verification_code:verification_code
            },
            success:function(result){
                console.log(result);
                result = JSON.parse(result);
                if(result.success==true){
                    alert('注册成功')
                }
                else{
                    code = result.code;
                    if(code == 1)
                    {
                        console.log('yizhuce');
                        alert('手机号已注册');
                    }
                }
            },
            error:function(){
                alert('error');
            }
        })
    }

    $('.user_name').on('blur',function(){
        var user_name = $('.user_name').val();
        if (user_name === '')
        {
            console.log('1');
            $('.user_name.error span').text('用户名不能为空!')
            console.log('2');
        }else {
            $.ajax({
                url:"<?=base_url('mall/register/check_username')?>",
                method: 'post',
                data:{
                    user_name:user_name,
                    type:2
                },
                success:function(result){
                    result = JSON.parse(result);
                    if(result.success==true){
                        $('.user_name.error span').text('')
                    }
                    else{
                        code = result.code;
                        if(code == 1)
                        {
                            $('.user_name.error span').text('用户名已注册')
                        }
                    }
                },
                error:function(){
                    //alert('error');
                    console.log('error');
                }
            })
        }
    })
</script>
</body>
</html>