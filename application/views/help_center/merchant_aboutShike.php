<?php $this->load->view('help_center/header.php'); ?>

<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <?php $this->load->view('help_center/helpCenter_leftNav.php'); ?>
        <!--右侧店铺管理-->
        <div class="content left">
            <h1 class="title">关于试客巴</h1>
            <div class="about_shike">
                <h2>1、试客巴是干什么的？</h2>
                <p>在试客巴商家只需用10-20件宝贝库存发试用和优惠，就能优化宝贝基础权重，提升排名，抢占流量入口。试客巴可以帮助商家提升关键词点击率、提升人气权重和买家喜好度。</p>
                <h2>2、试用推广的好处是什么？</h2>
                <p>1、优化店铺权重</p>
                <p>试客巴通过创新性的试用流程及网页设计，可一条龙优化店铺销量搜索点击率、转换率、收藏分享、购物车、动销率、客单价、DSR动态评分等权重。</p>
                <p>2、增加重复访问率</p>
                <p>试客在申请或下单领取时，根据平台任务设置需多次访问任务商品，产生重复访问率，从而提升店铺的综合排名。</p>
                <p>3、丰富店铺评价</p>
                <p>商家可选择多元化的任务来丰富店铺的评价，有助于推动商品的宣传与购买，提升消费者商品的信赖感，让商品快速进入消费者视野而获得更多的关注。</p>
                <h2>3、试客巴的优势有哪些？</h2>
                <p>1、试客用户1人1号，并且试客申请试用任务前，需绑定淘宝帐号并通过平台审核后，方可申请。</p>
                <p>绑定淘宝帐号的要求：</p>
                <p>①淘宝买号2心信誉以上</p>
                <p>②注册时长1个月以上</p>
                <p>③通过支付宝实名认证</p>
                <p>④好评率95%以上</p>
                <p>杜绝一切小号或危险账号，申请商家的试用任务，买号安全性可以得到保障。</p>
                <p>2、试客在申请或下单领取时须按平台任务设置，完成任务并上传凭证后，才可进行下一步，具体任务如下：</p>
                <p>①、按关键词搜索商品进店</p>
                <p>②、随机浏览店铺的4个商品页面，并回传商品链接</p>
                <p>③、收藏店铺和宝贝</p>
                <p>④、跟客服旺旺聊天</p>
                <p>⑤、加入购物车</p>
                <p>⑥、从购物车找到商品，然后下单购买</p>
                <p>可以有效的提升店铺的综合排名。</p>
                <p>3、商家发布试用任务，试客在申请或下单领取过程中，试客巴要求试客去商家店铺完成多元化任务并上传凭证后，才能提交任务，
                    通过这样的方式，可一条龙提升店铺销量、搜索点击率、分享收藏、购物车、重复访问率、DSR动态评分等权重。</p>
                <p>试客巴的试用模式新颖，其他试用平台试客申请流程简单，申请人数再多，不进店收藏、加购物车、重复访问，
                    对商家毫无帮助，权重得不到提升，商品还很容易被降权。</p>
                <h2>4、是否支持拍A发B？</h2>
                <p>目前不支持拍A发B，这样是砸自己招牌和欺骗消费者的行为，
                    同时，试客巴的会员质量是非常高的，他们很多人会去二次购买或介绍身边的朋友购买。</p>

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
            $('.account_information ul').find('a').eq(0).addClass('leftNav_active');
       // });

    })
</script>

<?php $this->load->view('help_center/footer.php'); ?>