<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商家注册</title>
    <link rel="stylesheet" href="<?=base_url('css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/mall/forget_password.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/mall/modal_alert.css')?>">
</head>
<body>
<header id="header"></header>
<div class="line"></div>
<section id="section">
    <!--修改密码-->
    <div class="change_password left">
        <div class="new_password">
            <span>用&nbsp;户&nbsp;名</span>
            <input id="username" type="user_name" class="user_name" placeholder="您的账户名和登录名" />
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
            <input id="qq" type="text" class="user_qq" placeholder="建议使用常用的QQ号" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="qq_error"></span></p>
        <div class="auth_code">
            <span>验&nbsp;证&nbsp;码</span>
            <input type="text" class="verification_code" placeholder="请输入手机验证码" />
            <span class="gain"><input onclick="get_phone_code()" id="testGetCode" type="button" value="获取验证码"/></span>
        </div>
        <!--错误提示-->
        <p class="error"><span></span></p>
        <!--注册协议-->
        <div class="registration_protocol">
            <input type="checkbox"  disabled="disabled" checked><span>我已认证阅读并同意试客巴的 <a target="_blank" href="<?=base_url('mall/help_center/service_agreement')?> ">《用户注册协议》</a></span>
        </div>
        <div class="register_now">
            <input type="button" class="enter" onclick="register()" value="立即注册">
        </div>
    </div>
    <!--账户信息-->
    <div class="account_related right">
        <div class="has_account">
            <h1>你还可以：</h1>
            <input onclick="location.href='<?=base_url('mall/register/shike_register')?>'" type="button" value="注册试客"/>
        </div>
        <div class="no_account">
            <h1>已有账号？</h1>
            <input  onclick="location.href='<?=base_url('login/index')?>'" type="button" value="立即登录"/>
        </div>
    </div>
</section>
<div class="myAlert">

</div>
<footer id="footer"></footer>
<script src="<?=base_url('js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url("js/mall/input_verify.js")?>"></script>
<script src="<?=base_url("js/mall/modal_scrollbar.js")?>"></script>
<script src="<?=base_url("js/mall/mask_layer.js")?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/login_header.html',function(){

         });*/
        $('.details_title').text('商家注册');
        //$('#footer').load('../common/footer.html');
    })

    function get_phone_code(obj)
    {
        var phone = $('.phone2').val();
        var phone_error = $(".phone_error").text();
        if(!phone || phone_error){
            return;
        }
        $.ajax({
            url:"<?=base_url('sendcloud')?>",
            method:'post',
            data:{
                tel:phone
                },
            success : function (result){
                if(result == 1){
                    console.log('send');
                    //$("#testGetCode").text("验证码已发送，请稍后");
                    //$(obj).unbind('click').removeAttr('onclick').click(function(){$("#testGetCode").text("验证码已发送，请稍后");});
                }
            }
        })
    }



    function register()
    {
        var user_name = $('.user_name').val();
        var phone = $('.phone2').val();
        var password = $('.password').val();
        var user_qq = $('.user_qq').val();
        var verification_code = $('.verification_code').val();
        var username_error = $(".username_error").text();
        if(!(user_name && phone && password && user_qq &&verification_code))
        {
            return
        }
        if(username_error)
        {
            return
        }

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
                    //alert('注册成功')
                    myalert = '<div class="modal">'+
                        '<div class="modal_box">'+
                        '<div class="modal_prompt">'+
                        '<span>提示</span>'+
                        '<a class="close" href="javascript:void(0);">'+
                        '<img src="../../images/mall/sj_grzx_tc_off_default.png" alt="">'+
                        '</a>'+
                        '</div>'+
                        '<div class="modal_content">'+
                        '<p>注册成功</p>'+
                        '</div>'+
                        '<div class="modal_submit">'+
                        '<input class="confirm" type="button" value="确定"/>'+
                        '</div>'+
                        '</div>'+
                        '<div class="mask_layer"></div>'+
                        '</div>';
                    $('.myAlert').append(myalert);
                }
                else{
                    code = result.code;
                    if(code == 1)
                    {
                        console.log('yizhuce');
                        alert('手机号已注册');
                    }else if(code == 2)
                    {
                        alert('验证码不正确');
                    }
                }
            },
            error:function(){
                alert('error');
            }
        })
    }

    $('.myAlert').on('click','.close,.cancel,.confirm',function(){
        $('.modal').css('display','none');
        enableScroll();
        location.href = "<?=base_url('login')?>";
    })

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
                            $('.username_error').show();
                            $('.username_error').text('用户名已注册')
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

    $('.phone2').on('blur',function(){
        var phone = $('.phone2').val();
        var reg=/^1[3|4|5|7|8]\d{9}$/;
        if($('#phone').val()==""){
            $('.phone_error').text('手机号码不能为空！');
            $('#testGetCode').attr('disabled','disabled')
            return false;
        }else if(!(reg.test(phone))){
            $('.phone_error').text('手机号码格式不正确！');
            $('#testGetCode').attr('disabled','disabled')
            return false;
        }else{
            $('.phone_error').css('display','none');
            $.ajax({
                url:"<?=base_url('mall/register/check_phone')?>",
                method: 'post',
                data:{
                    phone:phone
                },
                success:function(result){
                    result = JSON.parse(result);
                    if(result.success==true){
                        $('.phone_error').text('')
                        $('.phone_error').show();
                        $('#testGetCode').removeAttr('disabled')
                    }
                    else{
                        code = result.code;
                        if(code == 1)
                        {
                            $('.phone_error').show();
                            $('.phone_error').text('手机号已注册')
                            $('#testGetCode').attr('disabled','disabled')
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