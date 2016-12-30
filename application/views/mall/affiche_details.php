<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城--公告详情</title>
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/affiche_details.css')?>">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="affiche_title">
        <ul>
            <li>您的位置：</li>
            <li>首页</li>
            <li><img src="<?=base_url('/images/mall/icon_arrow_default.png" alt="')?>"></li>
            <li>公告详情</li>
        </ul>
    </div>
    <div class="affiche_details">
        <h1>
            云推购平台正式上线，公测期优惠活动乐不停！
        </h1>
        <p>时间：2016.11.25 10:48:30</p>
        <div class="content">
            <p>
                花谢花飞飞满天，红消香断有谁怜?
                游丝软系飘春榭，落絮轻沾扑绣帘。
                一年三百六十日，风刀霜剑严相逼。
                明媚鲜妍能几时，一朝漂泊难寻觅。
                花开易见落难寻，阶前愁煞葬花人。
                独倚花锄偷洒泪，洒上空枝见血痕。
                愿奴胁下生双翼，随花飞到天尽头。
                天尽头，何处有香丘！
                未若锦囊收艳骨，一抔净土掩风流。
                质本洁来还洁去，强于污淖陷渠沟。
                尔今死去侬收葬，未卜侬身何日丧。
                侬今葬花人笑痴，他年葬侬知是谁?
                天尽头，何处有香丘!
                试看春残花渐落，便是红颜老死时。
                一朝春尽红颜老，花落人亡两不知!
                花落人亡两不知！
            </p>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/details_header.html',function(){
            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(0).addClass('header_active');
            conversion(0);
            $('.details_title').text('公告详情')

        });*/
        $('.search .right ul').find('a').removeClass('header_active');
        $('.search .right ul').find('a').eq(0).addClass('header_active');
        conversion(0);
        $('.details_title').text('公告详情')
        //$('#footer').load('../common/footer.html');
    })
</script>
</body>
</html>