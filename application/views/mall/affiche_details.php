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
            <li><a href=<?php echo base_url().''; ?> >首页</a></li>
            <li><img src="<?=base_url('/images/mall/icon_arrow_default.png" alt="')?>"></li>
            <li>公告详情</li>
        </ul>
    </div>
    <div class="affiche_details">
        <h1>
            <?php echo $details['title'];?>
        </h1>
        <p>时间：<?php echo $details['time'];?></p>
        <div class="content">
            <p>
                <?php echo $details['description'];?>
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