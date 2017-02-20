<?php $this->load->view('help_center/header.php'); ?>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <?php $this->load->view('help_center/helpCenter_leftNav.php'); ?>
        <!--右侧店铺管理-->
        <div class="content left">
            <h1 class="title">关于账户</h1>
            <div class="about_shike">
                <h2>1、注册试客收费么？</h2>
                <p>注册试客是免费的，成功注册之后可以免费申请试用商品。</p>
                <h2>2、注册成功之后，用户名可以修改吗？</h2>
                <P>不可以，一经注册的用户名完成后是不能修改的。注册时请填写真实的邮箱、QQ或者手机号，可以在忘记登陆用户名时进行联系客服找回。</P>
                <h2>3、忘记登录用户名怎么办？</h2>
                <p>可以联系网站客服（QQ：2770801820），提供注册时填写的邮箱、QQ号或者手机号，由客服帮您找回您的用户名，也可以试用手机号进行登录。</p>
                <h2>4、忘记密码怎么办，怎样找回忘记密码？</h2>
                <p>在登录页面，点击[找回密码]，然后按照页面的提示信息输入手机号进行密码重置。</p>
                <h2>5、一个账户可以绑定几个淘宝帐号？ 淘宝帐号要求是什么？</h2>
                <p>一个账户可以绑定淘宝一个淘宝帐号，淘宝帐号要求：</p>
                <p>1、注册时间大于三个月；</p>
                <p>2、必须使用本人身份证实名认证；</p>
                <p>3、淘宝帐号信用等级2心以上；</p>
                <p>4、历史订单中差评比例低于1%（建议绑定平时购物最多的淘宝帐号）</p>
                <h2>6、支持哪几个平台试用活动？</h2>
                <p>试客巴目前支持淘宝、天猫两个平台的试用活动，后续会陆续增加其他平台，敬请关注。</p>
                <h2>7、淘宝帐号、银行卡信息绑定成功了，还可以修改或者更换吗？</h2>
                <p>淘宝帐号、银行卡信息，一旦绑定成功，则不能随意修改或更换。</p>
                <h2>8、申请绑定的淘宝帐号、银行卡信息没通过平台审核怎么办？</h2>
                <p>请先核实您绑定的淘宝帐号是否符合要求，银行卡信息是否正确，核实后，请重新绑定。</p>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?>">
<link rel="stylesheet" href="<?=base_url('/css/mall/reset_content.css')?>">
<link rel="stylesheet" href="<?=base_url('/css/mall/shike_center.css')?>">
<footer id="footer"></footer>
<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url('/js/mall/modal_scrollbar.js')?>"></script>
<script>
    $(function(){
        $('#header').load('../common/merchant_header.html',function(){
            $('.details_title').text('帮助中心');
        });
        $('#footer').load('../common/footer_other.html');
       // $('#left_nav').load("../common/helpCenter_leftNav.html",function(){
            $('.try_manage ul').find('a').eq(1).addClass('leftNav_active');
        //});

    })
</script>
<?php $this->load->view('help_center/footer.php'); ?>