<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改登录密码</title>
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
        <!--修改登录密码-->
        <div id="my_main" class="basic_setup left">
            <h1 class="title">修改登录密码</h1>
            <form class="revamp_content">
                <label for="phone">已验证手机：</label>
                <input id="phone" type="text" onblur="verify_phone()"/>
                <br/>
                <p><span id="phone_error"></span></p>

                <label for="mewPw">新密码：</label>
                <input style="padding-left:10px;" id="mewPw" type="password" onblur="verify_pwd()"/>
                <br/>
                <p><span></span></p>

                <label for="confirmPw">确认新密码：</label>
                <input style="padding-left:10px;"   id="confirmPw" type="password" onblur="verify_pwd()"/>
                <br/>
                <p><span id="confirmPw_error"></span></p>

                <label for="authCode">验证码：</label>
                <input id="authCode" type="text"/>
                <input id="get_code" type="button" value="获取验证码" onclick="get_phone_code(this)">
                <br/>
                <p><span id="yzm_errors"></span></p>
              <!--  <p><span id="yzm_send" style="color:black"></span></p>-->

                <p class="btns">
                    <input onclick="info_post()" type="button" value="确定"/>
                    <input type="button" onclick="location.href='/merchant_basic_setup'" value="取消"/>
                </p>
            </form>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html",function(){
        $('.account_information ul>li').find('a').eq(0).addClass('leftNav_active')
        });
    })

    // function verify_phone(){
    //     var tel = $("#phone").val();
    //     if(isNaN(tel)){
    //         $("#phone_error").text("手机号不正确");
    //         return;
    //     }
    //     if(tel.length!=11){
    //         $("#phone_error").text("手机号不正确");
    //         return;
    //     }
    //     if((tel.substring(0,2).toString()!='13')&&(tel.substring(0,2).toString()!='18')&&(tel.substring(0,2).toString()!='15')){
    //        $("#phone_error").text("手机号不正确");
    //         return;
    //     }
    //     $("#phone_error").text("");
    // }
    function check_pw(){
        if($("#mewPw").val()==''){
            $("#mewPw_errors").text("密码不能为空");
        }else{
            $("#mewPw_errors").text("");
        }
    }
    function verify_phone(){
        var tel = $("#phone").val();
        if(!(/^1[34578]\d{9}$/.test(tel))){ 
            $("#phone_error").text("手机号不正确");
            return;
        } 
        $("#phone_error").text("");
    }

    function verify_pwd(){
        var mewPw = $("#mewPw").val();
        var confirmPw = $("#confirmPw").val();
        if(mewPw != confirmPw){
             $("#confirmPw_error").text("两次密码输入不同");
            return;
        }
        $("#confirmPw_error").text("");
    }
     var seconds=60;
    function get_phone_code(obj){
        var phone_error = $("#phone_error").text();
        if(phone_error){
            return;
        }
        var mewPw = $("#mewPw").val();
        var confirmPw = $("#confirmPw").val();
        if(!mewPw){
            $("#mewPw_errors").text("密码不能为空");
            return;
        }
        $("#mewPw_errors").text("");
        if(mewPw != confirmPw){
            $("#confirmPw_error").text("两次密码输入不同");
            return;
        }
        $("#confirmPw_error").text("");

        var tel = $("#phone").val();
        $.ajax({
        url : admin.url+'sendcloud',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {tel:tel},
        success : function (result){
            if(result == 1){
                $("#yzm_send").text("验证码已发送，请稍后");
                $(obj).unbind('click').removeAttr('onclick').click(function(){$("#yzm_send").text("验证码已发送，请稍后");}); 
                $("#get_code").val('重新发送（'+seconds+'s）');
                setTimeout("countdown()",1000);
            }
            
        }
    })
    }

    function countdown(){
        var obj = $("#get_code");
       <!-- var seconds = $("#get_code").val();-->
        if(seconds == 0){
            $("#get_code").val("获取验证码");
            $("#get_code").unbind('click').removeAttr('onclick').click(function(){get_phone_code(obj);}); 
            $("#yzm_send").text("");
            return;
        }
        seconds -=1;
        $("#get_code").val('重新发送（'+seconds+'s）');
        setTimeout("countdown()",1000);

    }

    function info_post(){
        var authcode = $("#authCode").val();
        var mewPw = $("#mewPw").val();
        var confirmPw = $("#confirmPw").val();
        if(!mewPw){
            $("#mewPw_errors").text("密码不能为空");
            return;
        }
        $("#mewPw_errors").text("");
        if(!authcode){
            $("#yzm_errors").text("验证码不能为空");
            return;
        }
        $("#yzm_errors").text("");
        if(mewPw != confirmPw){
             $("#confirmPw_error").text("两次密码输入不同");
            return;
        }
        $("#confirmPw_error").text("");
        $.ajax({
        url : admin.url+'merchant_userapi/get_session',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {authcode:authcode,passwd:mewPw},
        success : function (result){
            console.log(result);
            if(result.res == 1){
                window.location.href="/merchant_loginPw_modify_succeed";
            }else{
                $("#yzm_send").text(result.msg);
            }
        }
        })
    }
</script>
</body>
</html>









