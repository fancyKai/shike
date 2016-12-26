<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改已验证手机</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/revamp_loginPw.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--修改已验证手机-->
        <div class="basic_setup left">
            <h1 class="title">修改已验证手机</h1>
            <form class="revamp_content">
                <label for="phone">新手机：</label>
                <input id="phone" type="text" onblur="verify_phone()"/>
                <br/>
                <p><span id="phone_error"></span></p>

                <label for="authCode">验证码：</label>
                <input id="authCode" type="text"/>
                <input type="button" value="获取验证码" onclick="get_phone_code(this)"/>
                <br/>
                <p><span id="yzm_errors"></span></p>
                <p><span id="yzm_send" style="color:black"></span></p>

                <p class="btn">
                    <input onclick="info_post()" type="button" value="确定"/>
                    <input type="button" value="取消"/>
                </p>
            </form>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/shike_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");
    })

    //  function verify_phone(){
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

    function verify_phone(){
        var tel = $("#phone").val();
        if(!(/^1[34578]\d{9}$/.test(tel))){ 
            $("#phone_error").text("手机号不正确");
            return;
        } 
        $("#phone_error").text("");
    }

    function get_phone_code(obj){
         var phone_error = $("#phone_error").text();
        if(phone_error){
            return;
        }
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
            }
            
        }
    })
    }

    function info_post(){
        var authcode = $("#authCode").val();
        var tel = $("#phone").val();
         if(!authcode){
            $("#yzm_errors").text("验证码不能为空");
            return;
        }
        $("#yzm_errors").text("");
        $.ajax({
        url : admin.url+'shike_userapi/check_telcode2',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {authcode:authcode,phone:tel},
        success : function (result){
            console.log(result);
            if(result.res == 1){
                window.location.href="/shike_usertel2_set_succeed";
            }else{
                $("#yzm_send").text(result.msg);
            }
        }
        })
    }
</script>
</body>
</html>









