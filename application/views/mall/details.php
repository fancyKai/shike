<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="toTop" content="true">
    <title>详情页</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/details.css")?>" >
</head>
<body>
<!--返回顶部-->
<div class="return_top">
    <img src="<?=base_url("images/mall/right_icon_top_default.png")?>" alt="">
</div>
<header id="header"></header>
<section id="section">
    <!--<div class="line"></div>-->
    <div class="section_content">
        <div class="location">
            <ul>
                <li>您的位置：</li>
                <li><a href=<?php echo base_url().''; ?> >首页</a></li>
                <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
                <li>试用分类</li>
                <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
                <li><?php
                        echo $product_details['product_classify'];
                    ?></li>
                <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
                <li>商品详情</li>
            </ul>
        </div>
        <!--商品详情-->
        <div class="commodity_details">
            <div class="commodity_picture left">
                <img src="<?php echo $product_details['picture_url'];?> " alt="">
            </div>
            <div class="commodity_content left">
                <h1>
                <b><?php echo $product_details['product_name'];?></b>
                <?php
                    $platform = ($product_details['platformid']==1)?'<img style="float:right" src="'.base_url("images/mall/bg_tb_default.png").'">':'<img style="float:right" src="'.base_url("images/mall/bg_tm_default.png").'">';
                    echo $platform;
                ?>
                </h1>
                <div class="serve">
                    <p class="price">价值：<b>&yen;<?php echo $product_details['unit_price'];?></b></p>
                    <p class="freight">运费：<b>&yen;<?php if($product_details['freight']){
                                echo number_format($product_details['freight'],2).'</b>';
                            }else
                            {
                                echo '0.00</b> <span>包邮试用</span>';
                            }?></p>
                    <p class="offer">提供<span><?php echo $product_details['apply_amount'];?></span>份试用,目前已有<span><?php echo $product_details['apply_count'];?></span>人申请</p>
                </div>
                <!--规格-->
                <p class="standard">指定规格：<b><?php
                        $temp = $product_details['color'].' '.$product_details['size'];
                        echo ($temp == ' ')?'请选择任意规格（请注意下单价格）':$temp;
                        ?></b></p>
                <p class="number">购买数量：<b><?php echo $product_details['buy_sum'];?>件</b></p>
                <?php
                    //是否已申请
                    $apply = ($product_details['isApply'])?$apply = '<input class="application_button" type="button" disabled="disabled" style="background:#c8c8c8" value="您已申请过该商品"/>':
                        '<input class="application_button" type="button" onclick="apply_product(this,'.$product_details["act_id"].')" value="申请试用"/>';
                    echo $apply;
                ?>

            </div>
            <div class="activity left">
                <div class="activity_time">
                    <p>活动倒计时：
                        <span id="day"></span>
                        <a>天</a>
                        <span id="hour"></span>
                        <a>时</a>
                        <span id="minute"></span>
                        <a>分</a>
                        <span id="second"></span>
                        <a>秒</a>
                    </p>
                </div>
                <div class="apply_step">
                    <h1>申请步骤：</h1>
                    <ul>
                        <li><span>1</span> 找宝贝</li>
                        <li><span>2</span> 加入购物车</li>
                        <li><span>3</span> 提交申请</li>
                    </ul>
                </div>
                <table>
                    <tr>
                        <td><img src="<?=base_url("images/mall/xq_bg_bzj_default.png")?>" alt=""></td>
                        <td><img src="<?=base_url("images/mall/xq_bg_jdfk_default.png")?>" alt=""></td>
                        <td><img src="<?=base_url("images/mall/xq_bg_zp_default.png")?>" alt=""></td>
                    </tr>
                    <tr>
                        <td>已缴保证金</td>
                        <td>正品保障</td>
                        <td>极速返款</td>
                    </tr>
                </table>
            </div>
        </div>
        <!--试用流程-->
        <div class="use_flow">
            <div class="has_apply">
                <span>已申请试用（<b><?php echo $product_details['apply_count'];?></b>）</span>
                <!--已申请试用账户名轮播-->
                <div class="left tryAccount_carousel">
                    <div class="rollBox">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <?php
                                        foreach($apply_user as $k=>$v)
                                        {
                                            //$applyer_name = substr_replace($v['user_name'],str_repeat('*',strlen($v['user_name'])-2),2);
                                            $name = $v['user_name'];
                                            $strlen = mb_strlen($name, 'utf-8');
                                            $firstStr = mb_substr($name, 0, 2, 'utf-8');
                                            $lastStr = mb_substr($name, 0, 1, 'utf-8');
                                            $applyer_name =  $strlen <= 2 ? $lastStr . '*' : $firstStr . str_repeat('*', mb_strlen($name, 'utf-8') - 2);
                                            echo '<div class="pic">'.$applyer_name.'</div>';
                                        }
                                    ?>
                                    <!-- 用户名列表 end -->
                                </div>
                                <div id="List2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?=base_url('images/mall/xqy_bg_lc_default.png');?>" alt="">
        </div>
        <!--商品试用-->
        <div class="commodity_try">
            <!--左侧试用的其他的商品-->
            <div class="others_try left">
                <?php
                    echo '<h1>该商家试用的其他商品</h1>';
                    foreach($seller_else as $k=>$v) {
                        $freight = ((integer)$v['freight'])?'<span style="height: 0px; border:none">':'<span>包邮</span>';
                        $platform = ($v['platformid']==1)?'<img style="float:right" src="'.base_url("images/mall/bg_tb_default.png").'">':'<img style="float:right" src="'.base_url("images/mall/bg_tm_default.png").'">';
                        //是否已申请
                        $apply = ($v['isApply'])?$apply = '<input class="apply_product" type="button" disabled="disabled" style="background:#c8c8c8" value="已申请"/>':
                            '<input class="apply_product" type="button" onclick="apply_product(this,'.$v["act_id"].')" value="申请试用"/>';
                        echo '
                            <div class="products">
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
                                    <span>&yen;'.$v['unit_price'].'</span><span>
                                    '.$apply.'</span>
                                </p>
                                <p class="progress_bar">
                                    <img src="" alt="">
                                </p>
                            </div>
                            <script>la('.$v['start_time'].');</script>';
                    }

                    echo '<h1>申请了本商品的还申请了</h1>';
                    foreach($apply_else as $k=>$v) {
                        $freight = ((integer)$v['freight'])?'<span style="height: 0px; border:none">':'<span>包邮</span>';
                        $platform = ($v['platformid']==1)?'<img style="float:right" src="'.base_url("images/mall/bg_tb_default.png").'">':'<img style="float:right" src="'.base_url("images/mall/bg_tm_default.png").'">';
                        //是否已申请
                        $apply = ($v['isApply'])?$apply = '<input class="apply_product" type="button" disabled="disabled" style="background:#c8c8c8" value="已申请"/>':
                            '<input class="apply_product" type="button" onclick="apply_product(this,'.$v["act_id"].')" value="申请试用"/>';
                        echo '
                                <div class="products">
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
                    ?>

            </div>
            <!--右侧试用商品的详情-->
            <div class="try_details left">
                <h1>试用详情</h1>
                <div class="details_picture">
                    <?php
                        echo $product_details['product_details'];
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" style="display:none">
        <div class="modal_box">
            <div class="modal_prompt">
                <span>提示</span>
                <a class="close" href="javascript:void(0);">
                    <img src="<?=base_url('images/mall/sj_grzx_tc_off_default.png');?>" alt="">
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
<footer id="footer"></footer>
<script src="<?=base_url('js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url('js/mall/index_goodsby.js')?>"></script>
<script src="<?=base_url('js/mall/timecountdown.min.js')?>"></script>
<script src="<?=base_url("js/mall/mask_layer.js")?>"></script>

<script src="<?=base_url("js/mall/bootstrap-transition.js")?>"></script>
<script src="<?=base_url("js/mall/bootstrap-carousel.js")?>"></script>
<script src="<?=base_url("js/mall/return_top.js")?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/details_header.html');
        $('#footer').load('../common/footer.html');*/
        var time_3 = "<?php echo $product_details['time_3'];?>";
        var end_time = Date.parse(new Date(time_3))/1000 + 7*24*60*60;
        //var time = end_time - new Date().getTime()/1000;
        var time = end_time;
        xcsoft.countdown(time,function(obj){
            document.getElementById("day").innerHTML=obj.day;
            document.getElementById("hour").innerHTML=obj.hour;
            document.getElementById("minute").innerHTML=obj.minute;
            document.getElementById("second").innerHTML=obj.second;
        });
    })

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
                            $('.modal').myAlert('淘宝审核中');
                            break;
                        case 5:
                            //alert('该账号不能申请试用');
                            $('.modal').myAlert('该账号不能申请试用');
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