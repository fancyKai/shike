<?php $this->load->view('help_center/header.php'); ?>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <?php $this->load->view('help_center/helpCenter_leftNav.php'); ?>
        <!--右侧店铺管理-->
        <div class="content left">
            <h1 class="title">关于账户</h1>
            <div class="about_shike">
                <h2>1、注册成功之后，用户名可以修改吗？</h2>
                <p>不可以，一经注册的用户名完成后是不能修改的。
                    注册时请填写真实的邮箱、QQ或者手机号，可以在忘记登陆用户名时进行联系客服找回。
                </p>
                <h2>2、忘记登录用户名怎么办？</h2>
                <p>可以联系网站客服（QQ：2088805907），提供注册时填写的邮箱、QQ号或者手机号，由客服帮您找回您的用户名，也可以试用手机号进行登录。</p>
                <h2>3、忘记密码怎么办，怎样找回忘记密码？</h2>
                <p>在登录页面，点击[找回密码]，然后按照页面的提示信息输入手机号进行密码重置。</p>
                <h2>4、一个账户可以绑定几个店铺？</h2>
                <P>商家一个账户现在最多支持免费绑定3个店铺。</P>
                <h2>5、支持哪几个平台试用活动？</h2>
                <p>试客巴目前支持淘宝，天猫两个平台试用活动，后续会增加其他平台，敬请关注。</p>
                <h2>6、正式会员有什么优势？</h2>
                <p>正式会员4000元/年，不限发布试用次数。</p>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?>">
<link rel="stylesheet" href="<?=base_url('/css/mall/reset_content.css')?>">
<link rel="stylesheet" href="<?=base_url('/css/mall/shike_center.css')?>">
<footer id="footer"></footer>
<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script>
    $(function(){
        $('#header').load('../common/merchant_header.html',function(){
            $('.details_title').text('帮助中心');
        });
        $('#footer').load('../common/footer_other.html');
            // $('#left_nav').load("../common/helpCenter_leftNav.html",function(){
                   $('.account_information ul').find('a').eq(1).addClass('leftNav_active');
              // });

    })
</script>
<?php $this->load->view('help_center/footer.php'); ?>