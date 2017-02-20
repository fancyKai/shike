<?php $this->load->view('help_center/header.php'); ?>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <?php $this->load->view('help_center/helpCenter_leftNav.php'); ?>
        <!--右侧店铺管理-->
        <div class="content left">
            <h1 class="title">试客流程</h1>
            <p class="process"><img src="<?=base_url('/images/mall/shike.png" alt="')?>"></p>
            <div class="about_shike">
                <h2>一、注册会员</h2>
                <p>1、登录试客巴首页http://www.shike8888.com/，选择“试客注册”；</p>
                <p>2、根据提示填写相关信息，填写完毕后点击“立即注册”；</p>
                <p>3、进入试客个人中心，点击“开通VIP会员”，选择开通时长和支付方式，点击“确认付款”。</p>
                <h2>二、绑定淘宝帐号</h2>
                <p>1、进入试客个人中心，点击“绑定淘宝帐号”或在左侧导航栏中选择“基本设置”；</p>
                <p>2、点击绑定淘宝，填写淘宝帐号，点击“提交审核”。</p>
                <h2>三、申请试用</h2>
                <p>1、在商城中选择喜欢的商品，点击“申请宝贝”；</p>
                <p>2、搜索商品，根据任务要求到淘宝或天猫，搜索任务商品；</p>
                <p>3、核对商品，核对商品信息是否跟任务商品一致，填写商品链接后，点击“核对商品地址”；，核对成功后点击“下一步”；</p>
                <p>4、加入购物车，把商品加入淘宝/天猫购物车，然后点击“已加入购物车（提交任务申请）”；</p>
                <p>5、试用申请成功后72小时会开奖，公布中奖结果。</p>
                <h2>四、免费试用领取</h2>
                <p>1、进入试客个人中心，在左侧导航栏中选择“试用中奖管理”；</p>
                <p>2、选择“待领取下单”中奖订单，点击“去领取下单”；</p>
                <p>3、进入试用商品详情页，打开淘宝，进入购物车找到任务商品，进入宝贝详情页，点击“下一步”；</p>
                <p>4、收藏宝贝和店铺，收藏成功后，请将收藏页面的截图保存后上传，点击“下一步”；</p>
                <p>5、浏览店铺，进入店铺，随机点击浏览店铺4个商品宝贝详情页面并填写宝贝页地址，点击“下一步”；</p>
                <p>6、客服聊天，联系卖家在线客服，至少提问5个常见购买问题并上传截图后，点击“下一步”；</p>
                <p>7、下单付款，上传订单详情截图，填写订单编号和实际付款金额后，点击“确认已付款，提交”；</p>
                <p>8、等待商家发货。</p>
                <h2>五、评价返款</h2>
                <p>1、收到商品后，先不要在淘宝进行评价，先进入试客巴试客个人中心，，在左侧导航栏选择“试用中奖管理”；</p>
                <p>2、选择“待收货评价”中奖订单，点击“去初步评价”；</p>
                <p>3、按任务要求，给商品做出中肯的评价，并上传5张晒单照片，点击“提交初步评价”；</p>
                <p>4、等待商家审核评价；</p>
                <p>5、商家评价审核通过，选择“待复制评价”中奖订单，点击“去淘宝评价”；</p>
                <p>6、按任务要求将评价信息及晒单照片复制到淘宝，进行淘宝评价操作，并截图上传，点击“已晒单评价”；</p>
                <p>7、等待商家确认评价，返款。</p>
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
        //$('#left_nav').load("../common/helpCenter_leftNav.html",function(){
            $('.try_manage ul').find('a').eq(3).addClass('leftNav_active');
       // });
    })
</script>

<?php $this->load->view('help_center/footer.php'); ?>