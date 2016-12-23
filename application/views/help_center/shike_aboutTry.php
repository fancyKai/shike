<?php $this->load->view('help_center/header.php'); ?>

<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <?php $this->load->view('help_center/helpCenter_leftNav.php'); ?>
        <!--右侧店铺管理-->
        <div class="content left">
            <h1 class="title">关于试用</h1>
            <div class="about_shike">
                <h2>1、获得免费试用资格后需在多久内下单？</h2>
                <p>获得试用资格的试客，需在中奖后48小时内完成下单并将订单号和金额反馈至平台，超时视为自动放弃任务，系统将自动取消任务资格。</p>
                <h2>2、下单需要垫付么</h2>
                <p>是的，试客去到商家店铺购买商品时，需先行垫付，到商品确认收货评价后商家返还垫付资金。</p>
                <h2>3、可以使用花呗、淘金币、信用卡等返利方式下单领取吗？</h2>
                <p>不可以。下单领取时禁止使用花呗、信用卡和淘宝客等返利方式付款，如使用后，对商家不必要的金钱损失，
                    试客巴试用平台视情节严重，对试客进行对应的处罚，情节严重会进行封号处理。</p>
                <h2>4、商家如何发货？</h2>
                <p>试客下单后，商家会根据默认合作快递发货。</p>
                <h2>5、下单后什么时候发货？</h2>
                <p>下单后，商家会在48小时之内操作发货。</p>
                <h2>6、商家如何返款？</h2>
                <p>目前平台只支持押金返款。商家核实评价无误后操作（确认返款），试客收到待确认返款提示后操作确认，垫付资金将于10分钟左右退到平台账户。</p>
                <h2>7、收货好评后商家什么时候返款？</h2>
                <p>收货好评后，商家会在48小时内操作返款（周末节假日顺延）。</p>
                <h2>8、返还的本金如何提现？</h2>
                <p>试客提现细则如下：</p>
                <p>1、平台满200元即可提现，试客每月有1次提现机会，提现金额必须为100元的整数倍且不少于200元。</p>
                <p>2、本金提现时，平台将收取6%的手续费。</p>
                <p>3、当试用品包邮，且金额大于100元，平台会收取运费：5元/单，作为补偿。</p>
                <p>4、为了保障试客和商家交易金额的准确性，平台将预留5天的资金核查周期，返款到账户的资金将被冻结5天，5天后本金将自动解冻，之后方可自行提现。</p>
                <h2>9、申请的提现什么时候可以到账？</h2>
                <p>试客申请可提现资金，财务将在3-5个工作日审核完毕（周末节假日顺延）。审核完毕后，提现金额将于审核当日退到试客绑定的银行卡中内。</p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url('/js/mall/modal_scrollbar.js')?>"></script>
<script>
    $(function(){
        $('#header').load('../common/merchant_header.html',function(){
            $('.details_title').text('帮助中心');
        });
        $('#footer').load('../common/footer_other.html');
        $('#left_nav').load("../common/helpCenter_leftNav.html",function(){
            $('.try_manage ul').find('a').eq(2).addClass('leftNav_active');
        });

    })
</script>

<?php $this->load->view('help_center/footer.php'); ?>