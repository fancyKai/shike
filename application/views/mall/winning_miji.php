<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>中奖秘笈</title>
    <link rel="stylesheet" href="<?=base_url('css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/mall/winning_miji.css')?>">
</head>
<body>
<header id="header"></header>
<section id="section">
<div class="section">
    <div class="affiche_title">
        <ul>
            <li>您的位置：</li>
            <li><a href="<?php echo base_url().''; ?> ">首页</a></li>
            <li><img src="<?=base_url('images/mall/icon_arrow_default.png')?>" alt=""></li>
            <li>中奖秘笈</li>
        </ul>
    </div>
    <div class="affiche_details">
        <h1>
            独家中奖秘笈来了！！！
        </h1>
        <div class="content">
            <p>只要做到以下几点就能提高商品抽奖的中奖率：</p>
            <h1>1、开通VIP会员</h1>
            <p>
                开通VIP会员能快速有效的提高自己的中奖率；
            </p>
            <h1>2、及时领取中奖商品</h1>
            <p>
                中奖后及时领取中奖商品也能提高自己的中奖率，相反，如果经常在中奖后放弃领取，中奖率则会降低；
            </p>
            <h1>3、认真写评价</h1>
            <p>
                免费试用商品认真写优质好评，图文好评&买家秀订单的好评字数要求50字以上，请严格按照要求评价，这样商家满意了才会放更多的试用商品，
                而且丰富真实的评价内容也会提升你的中奖率，如果复制、抄袭、拼凑他人评价，评价字数少则会降低中奖率
            </p>
            <h1>4、多申请</h1>
            <p>
                俗话说得好：广撒网、多敛鱼，可以多选择一些商品申请一下，生活往往会给你一些意想不到的惊喜！
            </p>
        </div>
    </div>
</div>
</section>
<footer id="footer"></footer>
<script src="<?=base_url('js/mall/jquery-1.10.2.js')?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/merchant_header.html',function(){

        });
        $('#footer').load('../common/footer.html');*/
        $('.details_title').text('中奖秘笈')
    })
</script>
</body>
</html>