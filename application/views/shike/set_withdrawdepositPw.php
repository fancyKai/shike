<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置提现密码</title>
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
        <!--设置支付密码-->
        <div class="basic_setup left">
            <h1 class="title">设置提现密码</h1>
            <form class="revamp_content">
                <label for="mewPw">新密码：</label>
                <input id="mewPw" type="text" onblur="check_pw();verify_pwd()"/>
                <br/>
                <p><span id="mewPw_errors">密码不能为空</span></p>

                <label for="confirmPw">确认新密码：</label>
                <input id="confirmPw" type="text" onblur="verify_pwd()"/>
                <br/>
                <p><span id="confirmPw_error"></span></p>

                <p class="btn">
                    <input onclick="info_post()" type="button" value="确定"/>
                    <input type="button" onclick="location.href='/shike_basic_setup'" value="取消"/>
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

    function info_post(){
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
        $.ajax({
        url : admin.url+'shike_userapi/set_withdrawPw',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {passwd:mewPw},
        success : function (result){
            console.log(result);
            if(result == 1){
                window.location.href="/shike_withdrawPw_set_succeed";
            }
        }
        })
    }

    function check_pw(){
        if($("#mewPw").val()==''){
            $("#mewPw_errors").text("密码不能为空");
        }else{
            $("#mewPw_errors").text("");
        }
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
</script>
</body>
</html>









