<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城--首页</title>
    <meta name="toTop" content="true">
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/index.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/carousel.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/bookmark_page.css")?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/modal_alert.css')?>">
</head>
<body>
<!--返回顶部-->
<div class="return_top">
    <img src="<?=base_url("images/mall/right_icon_top_default.png")?>" alt="">
</div>
<!--页面的头部-->
<header id="header"></header>
<!--轮播部分-->
<nav id="nav">
    <div class="nav_content">
        <!--左侧导航-->
        <div class="left_nav left">
            <ul>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/1') ?>">女装</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/2') ?>">男装</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/3') ?>">美妆</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/4') ?>">鞋包配饰</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/5') ?>">居家生活</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/6') ?>">数码电器</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/7') ?>">母婴儿童</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/8') ?>">户外运动</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/9') ?>">食品酒水</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1/10') ?>">其他</a></li>
            </ul>
        </div>
        <!--中间轮播广告-->
        <div class="center_carousel left">
            <!--轮播图-->
            <div id="myCarousel" class="carousel slide">
                <!--下方小圆点-->
                <!--<ol class="carousel-indicators">-->
                <!--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
                <!--<li data-target="#myCarousel" data-slide-to="1"></li>-->
                <!--<li data-target="#myCarousel" data-slide-to="2"></li>-->
                <!--</ol>-->
                <!--图片-->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?=base_url("images/mall/hb.png")?>" alt="">
                    </div>

                </div>
                <!--左右滑动按钮-->
                <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">-->
                <!--<img src="images/ad_arrow_left_default.png " alt="">-->
                <!--</a>-->
                <!--<a class="right carousel-control" href="#myCarousel" data-slide="next">-->
                <!--<img src="images/ad_arrow_right_default.png" alt="">-->
                <!--</a>-->
            </div>
            <!--下方导航-教程-->
            <div class="all_course">
                <ul>
                    <!--试客教程-->
                    <li class="shike_course" onclick="location.href='<?=base_url('mall/help_center/shike_process')?>'">
                        <a href="<?=base_url('mall/help_center/shike_process')?>"> </a>
                    </li>
                    <!--商家教程教程-->
                    <li class="merchant_course" onclick="location.href='<?=base_url('mall/help_center/merchant_process')?>'" >
                        <a href="<?=base_url('mall/help_center/merchant_process')?>"></a>
                    </li>
                    <!--中奖秘笈-->
                    <li class="winning_tips" onclick="location.href='<?=base_url('mall/homepage/winning_miji')?>'">
                        <a href="<?=base_url('mall/homepage/winning_miji')?>"></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--右侧登录-->
        <div class="right_login left">
            <!--商城登录-->
            <div class="store_login">
                <img src="<?=base_url("images/mall/nav_icon_touxiang_default.png")?>" alt="">
                <p>欢迎来到试客巴</p>
                <?php
                    if($msg_info['user_type']==1)
                    {
                        echo '<input onclick="location.href=\''.base_url('shike_personal').'\'" class="login_btn" type="button" value="进入试客中心"/>';
                        if($msg_info['is_msg'])
                        {
                            echo '<p class="register"><a href="'.base_url('shike_message_center'). '"  ><img src="../../images/mall/sc_icon_laba_default.png" alt="">
                    您有新的中奖信息！！！</a></p>';
                        }
                    }elseif($msg_info['user_type']==2)
                    {
                        echo '<input onclick="location.href=\''.base_url('merchant_personal').'\'" class="login_btn" type="button" value="进入商家中心"/>';
                        if($msg_info['is_msg'])
                        {
                            echo '<p class="register" ><a href="'.base_url('shike_message_center').'"  ><img src="../../images/mall/sc_icon_laba_default.png" href="'.base_url('merchant_message_center').'" alt="">
                    您有新的中奖信息！！！</a></p>';
                        }
                    }else{
                        echo '<input onclick="location.href=\''.base_url('login/index').'\'" class="login_btn" type="button" value="登录"/>
                            <p class="register"><a href="'.base_url('mall/register/shike_register').'">注册试客</a><a href="'.base_url('mall/register/merchant_register').'">注册商家</a></p>
                            ';
                    }
                ?>
                <div class="project_pitching">
                    <ul>
                        <?php foreach($affiche as $k=>$v)
                        {
                            echo '<li><a style="text-align: left;" href="'.base_url('mall/homepage/affiche_details/'.$v['message_id']).'">'.$v['title'].'</a></li>';
                        }
                        ?>
                        <!--<li><a href="<?/*=base_url('mall/homepage/affiche_details')*/?>">双11部分试用商品预售处理方案</a></li>
                        <li><a href="<?/*=base_url('mall/homepage/affiche_details')*/?>">双11部分试用商品预售处理方案</a></li>
                        <li><a href="<?/*=base_url('mall/homepage/affiche_details')*/?>">双11部分试用商品预售处理方案</a></li>-->
                    </ul>
                </div>
            </div>
            <!--商品狂欢-->
            <div class="commodity_sale">
                <img src="<?=base_url("images/mall/nav_bg_jp_default.png")?>" alt="">
            </div>
        </div>
    </div>
</nav>
<section id="section">
    <div class="section_content">
        <!--最新试用-->
        <h1 class="section_title"><img src="<?=base_url("images/mall/zuixin_bg_default.png")?>" alt=""></h1>
        <div class="latest_trial">
            <?php
            foreach($newest_list as $k=>$v)
            {
                //运费
                $freight = ((integer)($v['freight']))?'<span style="height: 0px; border:none">':'<span>包邮</span>';
                $platform = ($v['platformid']==1)?'<img style="float:right" src="'.base_url("images/mall/bg_tb_default.png").'">':'<img style="float:right" src="'.base_url("images/mall/bg_tm_default.png").'">';
                //是否已申请
                if($v['isApply'])
                {
                    $apply = '<input class="apply_product" type="button" disabled="disabled" style="background:#c8c8c8" value="已申请"/>';
                }else
                {
                    $apply = '<input class="apply_product" type="button" onclick="apply_product(this,'.$v["act_id"].')" value="申请试用"/>';
                }
                echo '
            <div class="products left">
                <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="'.$v['picture_url'].'" alt=""></a>
                <div style="
                    overflow: hidden;
                    margin-top: 8px;
                ">
                <p class="product_introduction" style="
                    float: left;
                    margin-top: 0;    width: 200px;
                ">'.$v['product_name'].'</p>'.$platform.'
                </div>
                <p class="quantity">
                    <span>限量'.$v['apply_amount'].'份</span>'.$freight.'</span><span>已申请<b>'.$v['apply_count'].'</b>次</span>
                </p>
                <p class="price">
                    <span>&yen;'.$v['unit_price'].'</span><span>'.$apply.'</span>
                </p>
                <p class="progress_bar">
                    <img src="" alt="">
                </p>
            </div>
            <script>la('.$v['start_time'].');</script>';
            }
            ;?>
        </div>
        <!--推荐试用-->
        <h1 class="section_title"><img src="../../images/mall/tuijian_bg_default.png" alt=""></h1>
        <div class="recommend_trial">
            <!--&lt;!&ndash;查看更多按钮&ndash;&gt;-->
            <!--<div class="see_more">-->
            <!--<input type="button"/>-->
            <!--</div>-->
        </div>

        <!--分页-->
        <div style="text-align:center;">
            <ul id="pagination" class="pagination-sm pagination"></ul>
        </div>
    </div>

    <div class="modal" style="display:none">
        <div class="modal_box">
            <div class="modal_prompt">
                <span>提示</span>
                <a class="close" href="javascript:void(0);">
                    <img src="../../images/mall/sj_grzx_tc_off_default.png" alt="">
                </a>
            </div>
            <div class="modal_content">
                <p>提示的内容</p>
            </div>
            <div class="modal_submit">
                <input class="confirm" type="button" value="确定"/>
                <input id="qubangding" onclick="location.href='<?=base_url('shike_basic_setup')?>'" style="display:none"  type="button" value="去绑定"/>
            </div>
        </div>
        <div class="mask_layer"></div>
    </div>

</section>
<!--页面的尾部-->
<footer id="footer"></footer>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script src="<?=base_url("js/mall/bootstrap-transition.js")?>"></script>
<script src="<?=base_url("js/mall/bootstrap-carousel.js")?>"></script>
<script src="<?=base_url("js/mall/jquery.twbsPagination.js")?>"></script>
<script src="<?=base_url("js/mall/return_top.js")?>"></script>
<script src="<?=base_url("js/mall/mask_layer.js")?>"></script>
<script>
    $(function(){

        /*$('#header').load('../common/header.html');
         $('#footer').load('../common/footer.html');*/
        $('#header').load('../common/header.html',function(){
            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(0).addClass('header_active');
            conversion(0)
        });

        $('.shike_course').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_ren_selected.png)");
            /*$(this).find('a').css('margin-top','0px')*/
            $(this).find('a').stop().animate({marginTop:'0px'},300)
        });
        $('.shike_course').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_ren_default.png)");
            /*$(this).find('a').css('margin-top','10px')*/
            $(this).find('a').stop().animate({marginTop:'10px'},300)
        });
        $('.merchant_course').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_gwc_selected.png)");
           $(this).find('a').stop().animate({marginTop:'0px'},300)
        })
        $('.merchant_course').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_gwc_default.png)");
            $(this).find('a').stop().animate({marginTop:'10px'},300)
        });
        $('.winning_tips').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_diannao_selected.png)");
           $(this).find('a').stop().animate({marginTop:'0px'},300)
        });
        $('.winning_tips').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_diannao_default.png)");
            $(this).find('a').stop().animate({marginTop:'10px'},300)
        });
        //第1页
        $.ajax({
            //var base_url = 'localhost/shike/'
            url: "<?=base_url('mall/homepage/getRecommend')?>",
            method:'post',
            data:{
                page:1
            },
            success:function(result){
                result = JSON.parse(result);
                if(result.success==true){
                    //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                    $('.recommend_trial').empty();
                    var html = '';
                    recommend_list = result.data.recommend_list;
                    recommend_list.forEach(function(e){
                        var html = '';
                        var freight = (parseInt(e.freight))?'<span style="height: 0px;border:none">':'<span>包邮</span>';
                        var apply = (e.isApply)?'<input class="apply_product" type="button" disabled="disabled" style="background:#c8c8c8" value="已申请"/>':'<input class="apply_product" type="button" onclick="apply_product(this,'+ e.act_id +')" value="申请试用"/>';
                        var platform = (e.platformid == 1)?'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tb_default.png")?>'+'">':'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tm_default.png")?>'+'">';
                        html = '<div class="products left">'+
                            '<a href="<?=base_url('mall/homepage/productdetails/')?>'+ e.act_id+ '"><img src="'+ e.picture_url + '" alt=""></a>'+
                            '<div style="overflow: hidden;margin-top: 8px;">'+
                            '<p class="product_introduction" style="float: left;margin-top: 0;width: 200px;">'+ e.product_name +'</p>'+ platform +
                            '</div>'+
                            '<p class="quantity">'+
                            '<span>限量'+ e.apply_amount + '份</span>'+ freight + '</span><span>已申请<b>'+ e.apply_count + '</b>次</span>'+
                            '</p>'+
                            '<p class="price">'+
                            '<span>&yen;'+ e.unit_price +'</span><span>'+apply+'</span>'+
                            '</p>'+
                            '<p class="progress_bar">'+
                            '<img src="" alt="">'+
                            '</p>'+
                            '</div>';
                        console.log(e)
                        $('.recommend_trial').append(html);
                        la(e.start_time)
                    });
                }
                else{

                }
                //$('.xx').remove()
            },
            error:function(result){
                alert('error')
            }

        })

        //        分页
        $('#pagination').twbsPagination({
            totalPages: <?php echo !($recommend_count['count']%2)?($recommend_count['count']/2):(integer)($recommend_count['count']/2) + 1; ?>,//总页数
            //totalPages: 10,//总页数
            startPage:1,//开始的页码
            visiblePages: 7,//显示的页面的数字个数
            initiateStartPageClick:true,
            first:'首页',
            prev:'上一页',
            next:'下一页',
            last:'尾页',

            onPageClick: function (event, page) {
                //$('#page-content').text('Page ' + page);
                $.ajax({
                    //var base_url = 'localhost/shike/'
                    url: "<?=base_url('mall/homepage/getRecommend')?>",
                    method:'post',
                    data:{
                        page:page
                    },
                    success:function(result){
                        result = JSON.parse(result);
                        if(result.success==true){
                            //console.log(result.data)
                            $('.recommend_trial').empty();
                            var html = '';
                            recommend_list = result.data.recommend_list;
                            recommend_list.forEach(function(e){
                                var html = '';
                                var freight = (parseInt(e.freight))?'<span style="height: 0px;border:none">':'<span>包邮</span>';
                                var apply = (e.isApply)?'<input class="apply_product" type="button" disabled="disabled" style="background:#c8c8c8" value="已申请"/>':'<input class="apply_product" type="button" onclick="apply_product(this,'+ e.act_id +')" value="申请试用"/>';
                                var platform = (e.platformid == 1)?'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tb_default.png")?>'+'">':'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tm_default.png")?>'+'">';
                                html = '<div class="products left">'+
                                    '<a href="<?=base_url('mall/homepage/productdetails/')?>'+ e.act_id+ '"><img src="'+ e.picture_url + '" alt=""></a>'+
                                    '<div style="overflow: hidden;margin-top: 8px;">'+
                                    '<p class="product_introduction" style="float: left;margin-top: 0;width: 200px;">'+ e.product_name +'</p>'+ platform +
                                    '</div>'+
                                    '<p class="quantity">'+
                                    '<span>限量'+ e.apply_amount + '份</span>'+ freight + '</span><span>已申请<b>'+ e.apply_count + '</b>次</span>'+
                                    '</p>'+
                                    '<p class="price">'+
                                    '<span>&yen;'+ e.unit_price +'</span><span>'+ apply +'</span>'+
                                    '</p>'+
                                    '<p class="progress_bar">'+
                                    '<img src="" alt="">'+
                                    '</p>'+
                                    '</div>';
                                console.log(e)
                                $('.recommend_trial').append(html);
                                la(e.start_time)
                            });
                        }
                        else{

                        }
                        //$('.xx').remove()
                    },
                    error:function(result){
                        alert('error')
                    }

                })
                console.log(page);
            }
        });

    })

    //是否申请过
    function apply_product(e,act_id) {
        console.log($(e))
        $.ajax({
            url:"<?=base_url('mall/ApplyTry/isApply')?>",
            method: 'post',
            data:{
                act_id:act_id
            },
            success:function(result){
                result = JSON.parse(result);
                if(result.success==true){
                    location.href =base_url+ 'mall/applyTry/applyTry_one'+ '/'+ act_id
                }
                else{
                    code = result.code;
                    switch (code)
                    {
                        case 1:
                            //alert('您已经申请过该产品');
                            $('.modal').myAlert('您已经申请过该产品');
//                            myAlert('您已申请过该产品')
                            $(e).attr('disabled',true).val('已申请').css('background-color','#c8c8c8');
                            break;
                        case 2:
                            location.href = '<?=base_url('login/index')?>';
                            break;
                        case 3:
                            $('.modal').myAlert('未绑定淘宝');
                            $('#qubangding').show();
                            $('.confirm').val('取消');
                            break;
                        case 4:
                            //alert('淘宝审核中');
                            $('.modal').myAlert('淘宝账号审核中，请耐心等待！');
                            break;
                        case 5:
                            //alert('该账号不能申请试用');
                            $('.modal').myAlert('该账号不能申请试用');
                            break;
                        case 6:
                            $('.modal').myAlert('您是试用会员，一个周只能申请试用一款商品，本周已经申请试用，请下个周再来申请试用或者充值办理正式会员');
                            break;
                        default:
                            break;
                    }
                }
            },
            error:function(){
                //alert('error');
                console.log('error');
            }
        })
    }

</script>
</body>
</html>