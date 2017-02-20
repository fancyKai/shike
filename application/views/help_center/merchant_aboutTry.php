<?php $this->load->view('help_center/header.php'); ?>

<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <?php $this->load->view('help_center/helpCenter_leftNav.php'); ?>
        <!--右侧店铺管理-->
        <div class="content left">
            <h1 class="title">关于试用</h1>
            <div class="about_shike">
                <h2>1、商家试用活动支持哪几种搜索/下单渠道？</h2>
                <p>商家试用活动支持淘宝自然搜索，天猫自然搜索两种渠道。</p>
                <h2>2、商家发布任务支持哪几种支付方式？</h2>
                <p>目前试客巴支付网银在线充值，其他充值方式可联系我们在线客服配合处理解决（客服QQ：2088805907）。</p>
                <h2>3、商家发布的试用活动需要审核么？审核一般需要多久？</h2>
                <p>商家提交的试用任务是需要经过客服人工审核的，当日18：00之前的任务于当日审核上线，18：00之后的任务次日上线。
                    如需紧急上线请联系在线客服解决（QQ：2088805907）。
                </p>
                <h2>4、审核上线的任务可以中途修改、撤销或者暂停么？</h2>
                <p>任务发布前，商家应自行检查活动信息是否正确，活动审核上线中途不能撤销或者申请活动暂停</p>
                <h2>5、商家如何发货？</h2>
                <p>
                    试客下单后，商家请先核实试客下单的订单状态以及实付款金额是否有误，
                    如确认无误之后请根据试客提供的订单号，在自己店铺根据平时合作快递直接操作发货即可。
                </p>
                <h2>6、试客下单后要在多久之内操作发货？</h2>
                <p>试客下单后，商家需在48小时之内给试客操作发货。</p>
                <h2>7、商家如何给试客返款？</h2>
                <p>目前试客巴平台只支持押金返款。</p>
                <h2>8、平台押金是否支持提现？提现是否收取费用？</h2>
                <p>可以。商家押金提现手续费为：1%</p>
                <h2>9、押金提现后是退到哪里？多久可以到账？</h2>
                <p>商家押金提现退到所绑定的银行卡中。 商家申请提现后，财务将在3-5个工作日审核提现， 财务审核通过之后，快钱到账时间为2-7个工作日（不含周末、节假日），
                    以各个银行的受理时间为准，还请商家耐心等待，请各位商家自己准备好备用资金，以免正常业务受损。</p>
                <h2>10、试客收货后需在多长的时间内在平台提交好评？</h2>
                <p>试客收货后48小时内需在试客巴提交好评，商家需要在48小时内进行审核评价。</p>
                <h2>11、试客好评通过后多久可以返款？</h2>
                <p>试客把好评复制至淘宝提交后回传好评截图，商家确认好评，通过即可返款。</p>
                <h2>12、试用邮费怎么算？</h2>
                <p>发布商品单价<100元时，商家需包邮发布任务；</p>
                <p>发布商品单价>100元时，商家可以选择包邮发布任务或付邮发布任务。</p>
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
            $('.account_information ul').find('a').eq(2).addClass('leftNav_active');
        //});

    })
</script>

<?php $this->load->view('help_center/footer.php'); ?>