<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城--首页</title>
    <link rel="stylesheet" href="../../css/mall/reset.css">
    <link rel="stylesheet" href="../../css/mall/index.css">
    <link rel="stylesheet" href="../../css/mall/carousel.css ">
    <link rel="stylesheet" href="../../css/mall/bookmark_page.css">
</head>
<body>
<!--页面的头部-->
<header id="header"></header>
<!--轮播部分-->
<nav id="nav">
    <div class="nav_content">
        <!--左侧导航-->
        <div class="left_nav left">
            <ul>
                <li class="left_nav_title"><a href="classify_page.html">女装</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">男装</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">美妆</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">鞋包配饰</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">居家生活</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">数码电器</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">母婴儿童</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">户外运动</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">食品酒水</a></li>
                <li class="left_nav_title"><a href="javascript:void(0);">其他</a></li>
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
                        <img src="../../images/mall/hb.png" alt="">
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
                    <li class="shike_course">
                        <a href="#">
                        </a>
                    </li>
                    <!--商家教程教程-->
                    <li class="merchant_course">
                        <a href="#"></a>
                    </li>
                    <!--中奖秘笈-->
                    <li class="winning_tips">
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--右侧登录-->
        <div class="right_login left">
            <!--商城登录-->
            <div class="store_login">
                <img src="../../images/mall/nav_icon_touxiang_default.png" alt="">
                <p>欢迎来到云推购</p>
                <input onclick="location.href='login.html'" class="login_btn" type="button" value="登录"/>
                <p class="register"><a href="#">注册试客</a><a href="#">注册商家</a></p>
                <div class="project_pitching">
                    <ul>
                        <li><a href="affiche_details.html">双11部分试用商品预售处理方案</a></li>
                        <li><a href="affiche_details.html">双11部分试用商品预售处理方案</a></li>
                        <li><a href="affiche_details.html">双11部分试用商品预售处理方案</a></li>
                    </ul>
                </div>
            </div>
            <!--商品狂欢-->
            <div class="commodity_sale">
                <img src="../../images/mall/nav_bg_jp_default.png" alt="">
            </div>
        </div>
    </div>
</nav>
<section id="section">
    <div class="section_content">
        <!--最新试用-->
        <h1 class="section_title"><img src="../../images/mall/zuixin_bg_default.png" alt=""></h1>
        <div class="latest_trial">
            <?php
                foreach($newest_list as $k=>$v)
                {
                    //运费
                    $freight = ($v['freight'])?'':'包邮';
                    echo '
            <div class="products left">
                <a href="details.html"><img src='.$v['picture_url'].' alt=""></a>
                <p class="product_introduction">'.$v['product_name'].'</p>
                <p class="quantity">
                    <span>限量版'.$v['amount'].'</span><span>'.$freight.'</span>
                </p>
                <p class="price">
                    <span>&yen;'.$v['margin'].'</span><span>已申请<b>'.$v['apply_amount'].'</b>次</span>
                </p>
            </div>';
                }
            ;?>

            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000222222</b>次</span>
                </p>
            </div>
        </div>
        <!--推荐试用-->
        <h1 class="section_title"><img src="../../images/mall/tuijian_bg_default.png" alt=""></h1>
        <div class="recommend_trial">
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000222222</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000222222</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000222222</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000222222</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000222222</b>次</span>
                </p>
            </div>
            <div class="products left">
                <a href="details.html"><img src="../images/mall/bg_sp_default.png" alt=""></a>
                <p class="product_introduction">秋冬季半高领针织衫蝴蝶结领毛衣韩版</p>
                <p class="quantity">
                    <span>限量版5000份</span><span>包邮</span>
                </p>
                <p class="price">
                    <span>&yen;199.10</span><span>已申请<b>1000</b>次</span>
                </p>
            </div>
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
</section>
<!--页面的尾部-->
<footer id="footer"></footer>
<script src="../../js/mall/jquery-1.10.2.js "></script>
<script src="../../js/mall/bootstrap-transition.js"></script>
<script src="../../js/mall/bootstrap-carousel.js"></script>
<script src="../../js/mall/jquery.twbsPagination.js"></script>
<script>
    $(function(){
        $('#header').load('../common/header.html');
        $('#footer').load('../common/footer.html');

        $('.shike_course').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_ren_selected.png)");
            $(this).find('a').css('margin-top','0px')
        });
        $('.shike_course').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_ren_default.png)");
            $(this).find('a').css('margin-top','10px')
        });
        $('.merchant_course').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_gwc_selected.png)");
            $(this).find('a').css('margin-top','0px')
        })
        $('.merchant_course').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_gwc_default.png)");
            $(this).find('a').css('margin-top','10px')
        });
        $('.winning_tips').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_diannao_selected.png)");
            $(this).find('a').css('margin-top','0px')
        });
        $('.winning_tips').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_diannao_default.png)");
            $(this).find('a').css('margin-top','10px')
        });
        console.log('start');
        //        分页
        $('#pagination').twbsPagination({
            totalPages: 35,//总页数
            startPage:1,//开始的页码
            visiblePages: 7,//显示的页面的数字个数
            initiateStartPageClick:true,
            first:'首页',
            prev:'上一页',
            next:'下一页',
            last:'尾页',

//        onPageClick: function (event, page) {
//            $('#page-content').text('Page ' + page);
//        }
        });
        console.log('111');
    })
</script>
</body>
</html>