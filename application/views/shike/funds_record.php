<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>资金记录</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/funds_record.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--资金管理-->
        <div class="funds_record left">
            <h1 class="title">资金记录</h1>
            <ul class="allRecord">
                <li class="record" <?php if(!$money_type):?> data-toggle="funds_detail" <?php endif;?> ><a href="/shike_funds_record?money_type=0">资金明细</a><span>|</span></li>
                <li class="record" <?php if($money_type == 2):?> data-toggle="withdraw_record" <?php endif;?> ><a href="/shike_funds_record?money_type=2">提现记录</a></li>
            </ul>
            <div>
            <!--资金明细-->
            <table class="funds_detail">
                <tr>
                    <td>时间</td>
                    <td>入款</td>
                    <td>扣款</td>
                    <td>结余</td>
                    <td>备注</td>
                </tr>
            <?php foreach($money_list as $v):?>
                <tr>
                    <td><?php echo $v['time'];?></td>
                <?php if($v['money_type'] == 1):?>
                    <td>&yen;<?php echo $v['money'];?></td>
                    <td>&yen;0.00</td>
                <?php else:?>
                    <td>&yen;0.00</td>
                    <td>&yen;<?php echo $v['money'];?></td>
                <?php endif;?>
                    <td>&yen;<?php echo $v['money_remain'];?></td>
                    <td><?php echo $v['remarks'];?></td>
                </tr>
            <?php endforeach ?>
            </table>
            <!--提现记录-->
            <table class="withdraw_record">
                <tr>
                    <td>提现申请时间</td>
                    <td>提现流水号</td>
                    <td>金额</td>
                    <td>实际到账金额</td>
                    <td>状态</td>
                </tr>
            <?php foreach($money_list as $v):?>
                <tr>
                    <td><?php echo $v['time'];?></td>
                    <td><?php echo $v['flowid'];?></td>
                    <td>&yen;<?php echo $v['money'];?></td>
                    <td>&yen;<?php echo ($v['money']-$v['processfee']);?></td>
                    <td>提现成功</td>
                </tr>
            <?php endforeach ?>
            </table>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.fund_manage ul>li').find('a').eq(1).addClass('left_nav_active');
        // });
        $('.record').bind('click',function(){
            $(this).find('a').css('color','#f10180');
            $(this).siblings().find('a').css('color','#323232')
        });

        $('[data-toggle="funds_detail"]').bind('click',function(){
            $('.funds_detail').css('display','block');
            $('.funds_detail').siblings().css('display','none');
        });
        $('[data-toggle="recharge_record"]').bind('click',function(){
            $('.recharge_record').css('display','block');
            $('.recharge_record').siblings().css('display','none');
        });
        $('[data-toggle="withdraw_record"]').bind('click',function(){
            $('.withdraw_record').css('display','block');
            $('.withdraw_record').siblings().css('display','none');
        })
    })
</script>
</body>
</html>









