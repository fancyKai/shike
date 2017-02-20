<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="toTop" content="true">
    <title>商城--搜索页</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/search_page.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/bookmark_page.css")?>">
</head>
<body>
<!--返回顶部-->
<div class="return_top">
    <img src="<?=base_url("images/mall/right_icon_top_default.png")?>" alt="">
</div>
<header id="header"></header>
<section id="section">
    <div class="search_title">
        <ul>
            <li>您的位置：</li>
            <li><a href=<?php echo base_url().''; ?> >首页</a></li>
            <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
            <li>商品搜索</li>
            <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
            <li><?php echo $search;?></li>
        </ul>
    </div>
    <div class="search_commodity">
        <?php
/*        foreach($search_list as $k=>$v)
        {
            //运费
            $freight = ($v['freight'])?'':'包邮';
            echo '
            <div class="products left">
                <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="'.$v['picture_url'].'" alt=""></a>
                <p class="product_introduction">'.$v['product_name'].'</p>
                <p class="quantity">
                    <span>限量版'.$v['apply_amount'].'</span><span>'.$freight.'</span>
                </p>
                <p class="price">
                    <span>&yen;'.$v['unit_price'].'</span><span>已申请<b>'.$v['apply_apply_amount'].'</b>次</span>
                </p>
            </div>';
        }
        ;*/?>
    </div>
    <!--分页-->
    <div style="text-align:center;">
        <ul id="pagination" class="pagination-sm pagination"></ul>
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


<footer id="footer"></footer>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script src="<?=base_url("js/mall/jquery.twbsPagination.js")?>"></script>
<script src="<?=base_url("js/mall/mask_layer.js")?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/details_header.html',function(){


        });
        $('#footer').load('../common/footer.html');*/
        $('.search .right ul').find('a').removeClass('header_active');
        $('.search .right ul').find('a').eq(0).addClass('header_active');
        conversion(0);
        $('.details_title').text('商品搜索')

        //第1页
        $.ajax({
            //var base_url = 'localhost/shike/'
            url: "<?=base_url('mall/homepage/searchList')?>",
            method:'post',
            data:{
                page:1,
                search : "<?php echo $search;?>"
            },
            success:function(result){
                result = JSON.parse(result);
                if(result.success==true){
                    //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                    $('.search_commodity').empty();
                    var html = '';
                    search_list = result.data.search_list;
                    if(search_list.length)
                    {
                        search_list.forEach(function(e){
                            var html = '';
                            var freight = (parseInt(e.freight))?'<span style="height: 0px;border:none">':'<span>包邮</span>';
                            var platform = (e.platformid == 1)?'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tb_default.png")?>'+'">':'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tm_default.png")?>'+'">';
                            var apply = (e.isApply)?'<input class="apply_product" type="button" disabled="disabled" style="background:#c8c8c8" value="已申请"/>':'<input class="apply_product" type="button" onclick="apply_product(this,'+ e.act_id +')" value="申请试用"/>';
                            html = '<div class="products left">'+
                                '<a href="<?=base_url('mall/homepage/productdetails/')?>'+ e.act_id+ '"><img src="'+ e.picture_url + '" alt=""></a>'+
                                '<div style="overflow: hidden;margin-top: 8px;">'+
                                '<p class="product_introduction" style="float: left;margin-top: 0;width: 200px;">'+ e.product_name +'</p>'+ platform +
                                '</div>'+
                                '<p class="quantity">'+
                                '<span>限量版'+ e.apply_amount + '份</span>'+ freight + '</span><span>已申请<b>'+ e.apply_count + '</b>次</span>'+
                                '</p>'+
                                '<p class="price">'+
                                '<span>&yen;'+ e.unit_price +'</span><span>'+apply+'</span>'+
                                '</p>'+
                                '<p class="progress_bar">'+
                                '<img src="" alt="">'+
                                '</p>'+
                                '</div>';
                            console.log(e)
                            $('.search_commodity').append(html);
                            la(e.start_time)
                        });
                    }else
                    {
                        html = '<div class="search_page_noGood">'+
                            '<p><img src="'+ base_url + 'images/mall/ss_bg_wu_default.png" alt=""></p>'+
                            '<p class="introductions">亲，没有找到与“ <b>'+"<?php echo $search;?>"+'</b>”相关的宝贝哦！</p>'+
                        '</div>';
                        $('.search_commodity').append(html);
                    }
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
            totalPages: <?php echo !($search_count['count']%2)?($search_count['count']/2):(integer)($search_count['count']/2) + 1; ?>,//总页数
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
                    url: "<?=base_url('mall/homepage/searchList')?>",
                    method:'post',
                    data:{
                        page:page,
                        search : "<?php echo $search;?>"
                    },
                    success:function(result){
                        result = JSON.parse(result);
                        if(result.success==true){
                            //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                            $('.search_commodity').empty();
                            var html = '';
                            search_list = result.data.search_list;
                            if(search_list.length)
                            {
                                search_list.forEach(function(e){
                                    var html = '';
                                    var freight = (parseInt(e.freight))?'<span style="height: 0px;border:none">':'<span>包邮</span>';
                                    var platform = (e.platformid == 1)?'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tb_default.png")?>'+'">':'<img style="float:right" src="'+ '<?=base_url("images/mall/bg_tm_default.png")?>'+'">';
                                    var apply = (e.isApply)?'<input class="apply_product" type="button" disabled="disabled" style="background:#c8c8c8" value="已申请"/>':'<input class="apply_product" type="button" onclick="apply_product(this,'+ e.act_id +')" value="申请试用"/>';
                                    html = '<div class="products left">'+
                                        '<a href="<?=base_url('mall/homepage/productdetails/')?>'+ e.act_id+ '"><img src="'+ e.picture_url + '" alt=""></a>'+
                                        '<div style="overflow: hidden;margin-top: 8px;">'+
                                        '<p class="product_introduction" style="float: left;margin-top: 0;width: 200px;">'+ e.product_name +'</p>'+ platform +
                                        '</div>'+
                                        '<p class="quantity">'+
                                        '<span>限量版'+ e.apply_amount + '份</span>'+ freight + '</span><span>已申请<b>'+ e.apply_count + '</b>次</span>'+
                                        '</p>'+
                                        '<p class="price">'+
                                        '<span>&yen;'+ e.unit_price +'</span><span>'+apply+'</span>'+
                                        '</p>'+
                                        '<p class="progress_bar">'+
                                        '<img src="" alt="">'+
                                        '</p>'+
                                        '</div>';
                                    console.log(e)
                                    $('.search_commodity').append(html);
                                    la(e.start_time)
                                });
                            }else
                            {
                                html = '<div class="search_page_noGood">'+
                                    '<p><img src="'+ base_url + 'images/mall/ss_bg_wu_default.png" alt=""></p>'+
                                    '<p class="introductions">亲，没有找到与“ <b>'+"<?php echo $search;?>"+'</b>”相关的宝贝哦！</p>'+
                                    '</div>';
                                $('.search_commodity').append(html);
                            }
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