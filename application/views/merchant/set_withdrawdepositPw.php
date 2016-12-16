<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置提现密码</title>
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
        <!--设置支付密码-->
        <div class="basic_setup left">
            <h1 class="title">设置提现密码</h1>
            <form class="revamp_content">
                <label for="mewPw">新密码：</label>
                <input id="mewPw" type="text" onblur="check_pw()"/>
                <br/>
                <p><span id="mewPw_errors">密码不能为空</span></p>

                <label for="confirmPw">确认新密码：</label>
                <input id="confirmPw" type="text"/>
                <br/>
                <p><span></span></p>

                <p class="btn">
                    <input onclick="info_post()" type="button" value="确定"/>
                    <input type="button" value="取消"/>
                </p>
            </form>
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

    function info_post(){
        var mewPw = $("#mewPw").val();
        var confirmPw = $("#confirmPw").val();
        if(mewPw != confirmPw){
            alert("两次密码输入不一致");
            return;
        }
        $.ajax({
        url : admin.url+'merchant_userapi/set_withdrawPw',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {passwd:mewPw},
        success : function (result){
            console.log(result);
            if(result == 1){
                window.location.href="/merchant_withdrawPw_set_succeed";
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
</script>
</body>
</html>









