<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>领取下单</title>
    <link rel="stylesheet" href="css/shike/location_title.css">
    <link rel="stylesheet" href="css/shike/getOrder_stepTwo.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_content">
        <div class="location_title">
            <ul>
                <li>您的位置：</li>
                <li><a href="/shike_personal">个人中心</a></li>
                <li><img src="images/shike/icon_arrow_default.png" alt=""></li>
                <li><a href="javascript:void(0)">使用管理</a></li>
                <li><img src="images/shike/icon_arrow_default.png" alt=""></li>
                <li>领取下单</li>
            </ul>
        </div>
        <!--步骤介绍-->
        <div class="step_introduce">
            <!--步骤进度条所处状态-->
            <div class="step_picture">
                <img src="images/shike/sk_zjgl_lqxd_bg_jdt2_default.png" alt="">
            </div>
            <!--试用商品-->
            <div class="try_good">
                <h1>2.收藏宝贝和店铺</h1>
                <!--第一步-->
                <div class="first_step">
                    <h2>
                        第一步：进入宝贝详情页后请收藏当前试用商品，并上传到平台。
                        <a id="first_step" href="javascript:void(0);">查看截图示例</a>
                    </h2>
                    <!--示例图片-->
                    <div class="example_images">
                        <p class="title">下面为截图示例：</p>
                        <div class="images">
                            <p class="left">
                                <img src="images/shike/sk_zjgl_lqxd_bg_scbb1_default.png" alt="">
                            </p>
                            <p class="right">
                                <img src="images/shike/sk_zjgl_lqxd_bg_scbb2_default.png" alt="">
                            </p>
                        </div>
                    </div>
                    <p class="uploading">
                        点击“收藏宝贝”，收藏宝贝后截图并上传
                        <a href="javascript:void(0);">
                            <input type="file">
                            上传文件
                        </a>
                        <span>宝贝.png</span>
                    </p>
                    <p><span>图片的格式：gif、jpg、jpeg、png，图片大小不能大于1M。</span></p>
                </div>
                <!--第二步-->
                <div class="second_step">
                    <h2>
                        第二步：收藏宝贝后请继续收藏商家店铺，并上传到平台。
                        <a id="second_step" href="javascript:void(0);">查看截图示例</a>
                    </h2>
                    <!--示例图片-->
                    <div class="example_images">
                        <p class="title">下面为截图示例：</p>
                        <div class="images">
                            <p class="left">
                                <img src="images/shike/sk_zjgl_lqxd_bg_scdp1_default.png" alt="">
                            </p>
                            <p class="right">
                                <img src="images/shike/sk_zjgl_lqxd_bg_scdp2_default.png" alt="">
                            </p>
                        </div>
                    </div>
                    <p class="uploading">
                        点击“收藏店铺”，收藏店铺后截图并上传
                        <a href="javascript:void(0);">
                            <input type="file">
                            上传文件
                        </a>
                        <span>店铺.png</span>
                    </p>
                    <p><span>图片的格式：gif、jpg、jpeg、png，图片大小不能大于1M。</span></p>
                </div>
            </div>
            <p class="step_btn">
                <input  onclick="location.href='getOrders_stepOne.html'" type="button" value="上一步">
                <input  onclick="location.href='getOrders_stepThree.html'" class="next_step" type="button" value="下一步">
            </p>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");

        $('#second_step').bind('click',function(){
            $('.second_step .example_images').slideToggle();
        });
        $('#first_step').bind('click',function(){
            $('.first_step .example_images').slideToggle();
        })
    })
</script>
</body>
</html>