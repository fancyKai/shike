<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改QQ</title>
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
            <h1 class="title">修改QQ</h1>
            <form class="revamp_content">
                <label for="qq">新的QQ号：</label>
                <input id="qq" type="text" onblur="check_qq();"/>
                <br/>
                <p><span id="qq_errors">QQ格式不正确</span></p>

                <p class="btns">
                    <input onclick="info_post()" type="button" value="确定"/>
                    <input type="button" value="取消" onclick="location.href='/merchant_basic_setup'"/>
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

     function check_qq(){
        var qq = $("#qq").val();
        if(!qq){
            $("#qq_errors").text("QQ号不得为空");
            return;
        }
        if(RegExp(/^[1-9][0-9]{4,9}$/).test(qq)){
            $("#qq_errors").text("");
        }else{
            $("#qq_errors").text("QQ格式不正确");
        }
    }

     function info_post(){
        var qq = $("#qq").val();
        if(!qq){
            $("#qq_errors").text("QQ号不得为空");
            return;
        }
        $("#qq_errors").text("");
        $.ajax({
        url : admin.url+'merchant_userapi/set_qq',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {qq:qq},
        success : function (result){
            console.log(result);
            if(result == 1){
                window.location.href="/merchant_qq_set_succeed";
            }
        }
        })
    }
</script>
</body>
</html>









