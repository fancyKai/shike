<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布试用</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/settings_search.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧店铺管理-->
        <div id="my_main" class="store_content left">
            <h1 class="title">发布试用</h1>
            <!--进度条-->
            <div class="progress_bar">
                <img src="images/merchant/sj_fbsy_bg_jdt_three_default.png" alt="">
            </div>
            <!--3.设置商品搜索-->
            <div class="settings_search">
                <h2 class="title">3.设置商品搜索</h2>
                <div class="search_content">
                    <p>
                        <a href="javascript:void(0);">淘宝平台商品</a>
                        只能选择“通过淘宝自然搜索”，
                        <a href="javascript:void(0);">天猫平台商品</a>
                        需要从“通过淘宝自然搜索”或“通过天猫自然搜索”二选一。
                    </p>
                    <!--通过淘宝搜索-->
                    <div class="by_taobao search_active" data-toggle="search">
                        通过淘宝自然搜索
                    </div>
                    <div class="taobao_content">
                        <h3>请填写搜索信息</h3>
                        <p>请填写
                            <a href="">“商品主图”</a>
                            ，以便试客快速找到任务商品：
                            <input class="picture_url" type="text" placeholder="请输入商品主图URL" id="taobao_picture_url" value="<?php echo $activity['t_picture_url']?>"/>
                            <span id="taobao_picture_url_error"></span>
                        </p>
                        <h4>搜索关键词：</h4>
                        <p>
                            请试客在www.taobao.com首页的搜索框内输入关键词：
                            <input type="text" id="taobao_key_words" value="<?php echo $activity['t_key_words']?>"/>进行商品搜索（请尽量选择二级词或长尾词）
                            <span id="taobao_key_words_error"></span>
                        </p>
                        <p class="search_commodity">
                            在搜索的列表页面，通过以下分类找到商品（非必填）：
                            <input type="text" id="taobao_classify1" value="<?php echo $activity['t_classify1']?>"/>
                            <input type="text" id="taobao_classify2" value="<?php echo $activity['t_classify2']?>"/>
                            <input type="text" id="taobao_classify3" value="<?php echo $activity['t_classify3']?>"/>
                            <input type="text" id="taobao_classify4" value="<?php echo $activity['t_classify4']?>"/>
                            <input type="text" id="taobao_classify5" value="<?php echo $activity['t_classify5']?>"/>
                        </p>
                        <p class="such_as">例如：香奈儿、短裙、修身、连衣裙</p>
                        <!--折扣与服务-->
                        <div class="serve">
                            <p>折扣和服务（非必填）：
                                <span id="dis_ser1" class="checkbox <?php if($activity['dis_ser1']) echo 'search_active';?>">包邮</span>
                                <span id="dis_ser2" class="checkbox <?php if($activity['dis_ser2']) echo 'search_active';?>">赠送退货运费险</span>
                                <span id="dis_ser3" class="checkbox <?php if($activity['dis_ser3']) echo 'search_active';?>">货到付款</span>
                                <span id="dis_ser4" class="checkbox <?php if($activity['dis_ser4']) echo 'search_active';?>">海外商品</span>
                                <span id="dis_ser5" class="checkbox <?php if($activity['dis_ser5']) echo 'search_active';?>">二手</span>
                                <span id="dis_ser6" class="checkbox <?php if($activity['dis_ser6']) echo 'search_active';?>">天猫</span>
                            </p>
                            <p>
                                <span id="dis_ser7" class="checkbox <?php if($activity['dis_ser7']) echo 'search_active';?>">正品保障</span>
                                <span id="dis_ser8" class="checkbox <?php if($activity['dis_ser8']) echo 'search_active';?>">24小时内发货</span>
                                <span id="dis_ser9" class="checkbox <?php if($activity['dis_ser9']) echo 'search_active';?>">7天退换货</span>
                                <span id="dis_ser10" class="checkbox <?php if($activity['dis_ser10']) echo 'search_active';?>">旺旺在线</span>
                                <span id="dis_ser11" class="checkbox <?php if($activity['dis_ser11']) echo 'search_active';?>">新品</span>
                                <!-- <input type="button" onclick="my()" value="11"> -->
                            </p>
                            <p>排列方式：
                                <select name="" id="taobao_sort" autocomplete="off">
                                    <option <?php if($activity['t_sort'] == 1):?> selected="selected" <?php endif;?> value="1">综合排序</option>
                                    <option <?php if($activity['t_sort'] == 2):?> selected="selected" <?php endif;?> value="2">销量从高到低</option>
                                    <option <?php if($activity['t_sort'] == 3):?> selected="selected" <?php endif;?> value="3">信用从高到低</option>
                                    <option <?php if($activity['t_sort'] == 4):?> selected="selected" <?php endif;?> value="4">价格从低到高</option>
                                    <option <?php if($activity['t_sort'] == 5):?> selected="selected" <?php endif;?> value="5">价格从高到低</option>
                                    <option <?php if($activity['t_sort'] == 6):?> selected="selected" <?php endif;?> value="6">总价从低到高</option>
                                    <option <?php if($activity['t_sort'] == 7):?> selected="selected" <?php endif;?> value="7">总价从高到低</option>
                                </select>
                            </p>
                        </div>
                        <h3>可选搜索信息</h3>
                        <p>试客可用列表筛选中“价格筛选”、“发货地”缩小范围（选填）。</p>
                        <p class="last">价格：
                            <input type="text" id="taobao_lower_price" value="<?php echo $activity['t_lower_price']?>"/> - <input type="text" id="taobao_higher_price" value="<?php echo $activity['t_higher_price']?>"/>
                            发货地：<input type="text" id="taobao_delivery_place" value="<?php echo $activity['t_delivery_place']?>"/>
                        </p>
                    </div>
                    <?php if($activity['platformid']==2):?>
                    <!--通过天猫搜索-->
                    <div class="by_tmall" data-toggle="search">
                        通过天猫自然搜索
                    </div>
                    <div class="tmall_content">
                        <h3>请填写搜索信息</h3>
                        <p>请填写
                            <a href="">“商品主图”</a>
                            ，以便试客快速找到任务商品：
                            <input class="picture_url" type="text" placeholder="请输入商品主图URL" id="tmall_picture_url" value="<?php echo $activity['t_picture_url']?>"/>
                            <span id="tmall_picture_url_error"></span>
                        </p>
                        <h4>搜索关键词：</h4>
                        <p>
                            请试客在www.tmall.com首页的搜索框内输入关键词：
                            <input type="text" id="tmall_key_words" value="<?php echo $activity['t_key_words']?>"/>进行商品搜索（请尽量选择二级词或长尾词）
                            <span id="tmall_key_words_error"></span>
                        </p>
                        <p class="search_commodity">
                            在搜索的列表页面，通过以下分类找到商品（非必填）：
                            <input type="text" id="tmall_classify1" value="<?php echo $activity['t_classify1']?>"/>
                            <input type="text" id="tmall_classify2" value="<?php echo $activity['t_classify2']?>"/>
                            <input type="text" id="tmall_classify3" value="<?php echo $activity['t_classify3']?>"/>
                            <input type="text" id="tmall_classify4" value="<?php echo $activity['t_classify4']?>"/>
                            <input type="text" id="tmall_classify5" value="<?php echo $activity['t_classify5']?>"/>
                        </p>
                        <p class="such_as">例如：香奈儿、短裙、修身、连衣裙</p>
                        <!--折扣与服务-->
                        <div class="serve">
                            <p>折扣和服务（非必填）：
                                <span id="dis_ser12" class="checkbox <?php if($activity['dis_ser12']) echo 'search_active';?>">新到商品</span>
                                <span id="dis_ser1" class="checkbox <?php if($activity['dis_ser1']) echo 'search_active';?>">包邮</span>
                                <span id="dis_ser13" class="checkbox <?php if($activity['dis_ser13']) echo 'search_active';?>">折扣</span>
                                <span id="dis_ser14" class="checkbox <?php if($activity['dis_ser14']) echo 'search_active';?>">搭配减价</span>
                                <span id="dis_ser15" class="checkbox <?php if($activity['dis_ser15']) echo 'search_active';?>">满就减</span>
                                <span id="dis_ser3" class="checkbox <?php if($activity['dis_ser3']) echo 'search_active';?>">货到付款</span>
                            </p>
                            <p>排列方式：
                                <select name="" id="tmall_sort">
                                    <option <?php if($activity['t_sort'] == 1):?> selected="selected" <?php endif;?> value="1">综合排序</option>
                                    <option <?php if($activity['t_sort'] == 8):?> selected="selected" <?php endif;?> value="8">人气从高到低</option>
                                    <option <?php if($activity['t_sort'] == 9):?> selected="selected" <?php endif;?> value="9">新品排序</option>
                                    <option <?php if($activity['t_sort'] == 2):?> selected="selected" <?php endif;?> value="2">销量从高到低</option>
                                    <option <?php if($activity['t_sort'] == 4):?> selected="selected" <?php endif;?> value="4">价格从低到高</option>
                                    <option <?php if($activity['t_sort'] == 5):?> selected="selected" <?php endif;?> value="5">价格从高到低</option>
                                </select>
                            </p>
                        </div>
                        <h3>可选搜索信息</h3>
                        <p>试客可用列表筛选中“价格筛选”、“发货地”缩小范围（选填）。</p>
                        <p class="last">价格：
                            <input type="text" id="tmall_lower_price" value="<?php echo $activity['t_lower_price']?>"/> - <input type="text" id="tmall_higher_price" value="<?php echo $activity['t_higher_price']?>"/>
                            <!-- 发货地：<input type="text" id="tmall_delivery_place" value="<?php echo $activity['t_delivery_place']?>"/> -->
                        </p>
                    </div>
                    <?php endif;?>
                </div>

                <div class="nextStep_btn">
                    <input onclick="location.href='/merchant_issue_try2?act_id=<?php echo $act_id ?>'" type="button" value="上一步"/>
                    <input onclick="next_step();" type="button" value="下一步"/>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="the_platform" value="taobao">
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
       // $('#left_nav').load("../common/left_nav.html",function(){
                   $('.try_manage ul>li').find('a').eq(0).addClass('leftNav_active')
               // });

        $('[data-toggle="search"]').bind('click',function(){
            $(this).addClass('search_active');
            $(this).siblings().removeClass('search_active');
        });
        $('.by_taobao').click(function(){
            $('.tmall_content').slideUp();
            $('.taobao_content').slideDown();
            $("#the_platform").val("taobao");
        });
        $('.by_tmall').click(function(){
            $('.taobao_content').slideUp();
            $('.tmall_content').slideDown();
            $("#the_platform").val("tmall");
        });
        $('.checkbox').click(function(){
            $(this).toggleClass('search_active');
        });
    })
</script>
 <script>
    function check_taobao_picture_url(){
        if($("#taobao_picture_url").val()==''){
            $("#taobao_picture_url_error").text("请输入商品主图URL");
        }else{
            $("#taobao_picture_url_error").text("");
        }
    }
    function check_taobao_key_words(){
        if($("#taobao_key_words").val()==''){
            $("#taobao_key_words_error").text("商品搜索关键词不能为空");
        }else{
            $("#taobao_key_words_error").text("");
        }
    }
    function check_tmall_picture_url(){
        if($("#tmall_picture_url").val()==''){
            $("#tmall_picture_url_error").text("请输入商品主图URL");
        }else{
            $("#tmall_picture_url_error").text("");
        }
    }
    function check_tmall_key_words(){
        if($("#tmall_key_words").val()==''){
            $("#tmall_key_words_error").text("商品搜索关键词不能为空");
        }else{
            $("#tmall_key_words_error").text("");
        }
    }
</script>
<script>
    function next_step(){
        //var seller_id = <?php echo $seller_id ?>;
         if(($("#taobao_picture_url").val() == '' || $("#taobao_key_words").val() == '' )&&($("#tmall_picture_url").val() == '' || $("#tmall_key_words").val() == '' )){
            return;
        }
        var act_id = "<?php echo $act_id ?>";
        var the_platform = $("#the_platform").val();
        if(the_platform == 'taobao'){
            var taobao_picture_url = $("#taobao_picture_url").val();
            if(taobao_picture_url==''){
                $("#taobao_picture_url_error").text("请输入商品主图URL");
                return;
            }else{
                $("#taobao_picture_url_error").text("");
            }

            var reg = /.*[\u4e00-\u9fa5]+.*$/;
            if((reg.test(taobao_picture_url)) ){
                $("#taobao_picture_url_error").text("商品主图URL中不得出现中文");
                return;
            }else{
                $("#taobao_picture_url_error").text("");
            }

            var taobao_key_words = $("#taobao_key_words").val();
            if(taobao_key_words==''){
                $("#taobao_key_words_error").text("商品搜索关键词不能为空");
                return;
            }else{
                $("#taobao_key_words_error").text("");
            }

            var platformid = 1;
            var t_picture_url = $("#taobao_picture_url").val();
            var t_key_words = $("#taobao_key_words").val();
            var t_classify1 = $("#taobao_classify1").val();
            var t_classify2 = $("#taobao_classify2").val();
            var t_classify3 = $("#taobao_classify3").val();
            var t_classify4 = $("#taobao_classify4").val();
            var t_classify5 = $("#taobao_classify5").val();
            var t_lower_price = $("#taobao_lower_price").val();
            var t_higher_price = $("#taobao_higher_price").val();
            var t_delivery_place = $("#taobao_delivery_place").val();
            var t_sort = $("#taobao_sort").val();
            var dis_ser1 = $("#dis_ser1").hasClass('search_active');
            var dis_ser2 = $("#dis_ser2").hasClass('search_active');
            var dis_ser3 = $("#dis_ser3").hasClass('search_active');
            var dis_ser4 = $("#dis_ser4").hasClass('search_active');
            var dis_ser5 = $("#dis_ser5").hasClass('search_active');
            var dis_ser6 = $("#dis_ser6").hasClass('search_active');
            var dis_ser7 = $("#dis_ser7").hasClass('search_active');
            var dis_ser8 = $("#dis_ser8").hasClass('search_active');
            var dis_ser9 = $("#dis_ser9").hasClass('search_active');
            var dis_ser10 = $("#dis_ser10").hasClass('search_active');
            var dis_ser11 = $("#dis_ser11").hasClass('search_active');
            var dis_ser12 = 0;
            var dis_ser13 = 0;
            var dis_ser14 = 0;
            var dis_ser15 = 0;
        }else{
            var tmall_picture_url = $("#tmall_picture_url").val();
            if(tmall_picture_url==''){
                $("#tmall_picture_url_error").text("请输入商品主图URL");
                return;
            }else{
                $("#tmall_picture_url_error").text("");
            }

            var reg = /.*[\u4e00-\u9fa5]+.*$/;
            if((reg.test(tmall_picture_url)) ){
                $("#tmall_picture_url_error").text("商品主图URL中不得出现中文");
                return;
            }else{
                $("#tmall_picture_url_error").text("");
            }

            var tmall_key_words = $("#tmall_key_words").val();
            if(tmall_key_words==''){
                $("#tmall_key_words_error").text("商品搜索关键词不能为空");
                return;
            }else{
                $("#tmall_key_words_error").text("");
            }
            var platformid = 2;
            var t_picture_url = $("#tmall_picture_url").val();
            var t_key_words = $("#tmall_key_words").val();
            var t_classify1 = $("#tmall_classify1").val();
            var t_classify2 = $("#tmall_classify2").val();
            var t_classify3 = $("#tmall_classify3").val();
            var t_classify4 = $("#tmall_classify4").val();
            var t_classify5 = $("#tmall_classify5").val();
            var t_lower_price = $("#tmall_lower_price").val();
            var t_higher_price = $("#tmall_higher_price").val();
            var t_delivery_place = "";
            var t_sort = $("#tmall_sort").val();
            var dis_ser1 = $("#dis_ser1").hasClass('search_active');
            var dis_ser2 = 0;
            var dis_ser3 = $("#dis_ser3").hasClass('search_active');
            var dis_ser4 = 0;
            var dis_ser5 = 0;
            var dis_ser6 = 0;
            var dis_ser7 = 0;
            var dis_ser8 = 0;
            var dis_ser9 = 0;
            var dis_ser10 = 0;
            var dis_ser11 = 0;
            var dis_ser12 = $("#dis_ser12").hasClass('search_active');
            var dis_ser13 = $("#dis_ser13").hasClass('search_active');
            var dis_ser14 = $("#dis_ser14").hasClass('search_active');
            var dis_ser15 = $("#dis_ser15").hasClass('search_active');
        }
        $.ajax({
            url : admin.url+'merchant_issue_try3/update_fake_activity3',
            data:{act_id:act_id,platformid:platformid,t_picture_url:t_picture_url,t_key_words:t_key_words,t_classify1:t_classify1,t_classify2:t_classify2,t_classify3:t_classify3,t_classify4:t_classify4,t_classify5:t_classify5,t_lower_price:t_lower_price,t_higher_price:t_higher_price,t_delivery_place:t_delivery_place,t_sort:t_sort,
                dis_ser1:dis_ser1,dis_ser2:dis_ser2,dis_ser3:dis_ser3,dis_ser4:dis_ser4,
                dis_ser5:dis_ser5,dis_ser6:dis_ser6,dis_ser7:dis_ser7,dis_ser8:dis_ser8,
                dis_ser9:dis_ser9,dis_ser10:dis_ser10,dis_ser11:dis_ser11,dis_ser12:dis_ser12,dis_ser13:dis_ser13,dis_ser14:dis_ser14,dis_ser15:dis_ser15},
            type : 'post',
            cache : false,
            success : function (data){
               console.log(data);
               location.href=admin.url+"merchant_issue_try4?act_id="+act_id;
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
        //location.href=admin.url+"merchant_issue_try4?act_id="+act_id;
        
    }
</script>
</body>
</html>









