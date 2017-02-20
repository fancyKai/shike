<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>资金记录</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/funds_record.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--资金管理-->
        <div id="my_main" class="funds_record left">
            <h1 class="title">资金记录</h1>
            <ul class="allRecord">
                <li class="record" <?php if(!$remarks):?> data-toggle="funds_detail"<?php endif;?> ><a  <?php if(!$remarks):?> style="color:#f10180"<?php endif;?> href="/merchant_funds_record?remarks=0">押金明细</a><span>|</span></li>
                <li class="record" <?php if($remarks == 3):?> data-toggle="recharge_record"<?php endif;?> ><a <?php if($remarks == 3):?> style="color:#f10180"<?php endif;?> href="/merchant_funds_record?remarks=3">充值记录</a><span>|</span></li>
                <li class="record" <?php if($remarks == 8):?> data-toggle="withdraw_record"<?php endif;?> ><a <?php if($remarks == 8):?> style="color:#f10180"<?php endif;?> href="/merchant_funds_record?remarks=8">提现记录</a></li>
            </ul>
            <div>
            <?php if(!$remarks):?>
            <!--资金明细-->
            <table class="funds_detail">
                <tr>
                    <td>时间</td>
                    <td>入款</td>
                    <td>扣款</td>
                    <td>结余</td>
                    <td>备注</td>
                    <td>状态</td>
                </tr>
            <?php foreach($money_list as $v):?>
                <tr>
                    <td><?php echo $v['time'];?></td>
                <?php if($v['money_type'] == 1):?>
                    <td>&yen;<?php echo $v['money'];?></td>
                    <td></td>
                <?php else:?>
                    <td></td>
                    <td>&yen;<?php echo $v['money'];?></td>
                <?php endif;?>
                    <td>&yen;<?php echo $v['money_remain'];?></td>

                <?php if($v['remarks'] == 3):?>
                    <td>押金充值</td>
                <?php elseif($v['remarks'] == 4):?>
                    <td>商品押金冻结</td>
                <?php elseif($v['remarks'] == 5):?>
                    <td>试用担保金冻结</td>
                <?php elseif($v['remarks'] == 6):?>
                    <td>试用担保金返款</td>
                <?php elseif($v['remarks'] == 7):?>
                    <td>商品押金返款</td>
                <?php elseif($v['remarks'] == 8):?>
                    <td>押金提现</td>
                <?php endif;?>

                <?php if($v['status'] == 1):?>
                    <td>已返款</td>
                <?php elseif($v['status'] == 2):?>
                    <td>提现中</td>
                <?php elseif($v['status'] == 3):?>
                    <td>已提现</td>
                <?php elseif($v['status'] == 4):?>
                    <td>已到账</td>
                <?php elseif($v['status'] == 5):?>
                    <td>已扣款</td>
                <?php endif;?>
                </tr>
            <?php endforeach ?>
            </table>
            <?php endif;?>
            <?php if($remarks == 3):?>
            <!--充值记录-->
            <table class="recharge_record">
                <tr>
                    <td>充值时间</td>
                    <td>充值流水号</td>
                    <td>金额</td>
                    <td>状态</td>
                </tr>
            <?php foreach($money_list as $v):?>              
                <tr>
                    <td><?php echo $v['time'];?></td>
                    <td><?php echo $v['flowid'];?></td>
                    <td>&yen;<?php echo $v['money'];?></td>
                    <td>已到账</td>
                </tr>
            <?php endforeach ?>
            </table>
            <?php endif;?>
             <?php if($remarks == 8):?>
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
                <?php if($v['status'] == 2):?>
                    <td>提现中</td>
                <?php elseif($v['status'] == 3):?>
                    <td>已提现</td>
                <?php endif;?>

                </tr>
            <?php endforeach ?>
            </table>
            <?php endif;?>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        //$('#left_nav').load("../common/left_nav.html",function(){
                    $('.fund_manage ul>li').find('a').eq(2).addClass('leftNav_active')
               // });
        // $('.record').bind('click',function(){
        //     $(this).find('a').css('color','#f10180');
        //     $(this).siblings().find('a').css('color','#323232')
        // });

        // $('[data-toggle="funds_detail"]').bind('click',function(){
        //     $('.funds_detail').css('display','block');
        //     $('.funds_detail').siblings().css('display','none');
        // });
        // $('[data-toggle="recharge_record"]').bind('click',function(){
        //     $('.recharge_record').css('display','block');
        //     $('.recharge_record').siblings().css('display','none');
        // });
        // $('[data-toggle="withdraw_record"]').bind('click',function(){
        //     $('.withdraw_record').css('display','block');
        //     $('.withdraw_record').siblings().css('display','none');
        // })
    })
</script>
</body>
</html>









