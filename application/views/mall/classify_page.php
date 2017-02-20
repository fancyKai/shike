<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城--最热试用</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/index.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/search_page.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/bookmark_page.css")?>">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="classify_title">
    <ul>
        <li>您的位置：</li>
        <li class="location_1"><a href=<?php echo base_url().''; ?> >首页</a></li>
        <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
        <li class="location_2">试用分类</li>
        <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
        <?php
            switch($classify)
            {
                case 1:
                    $class = '女装';
                    break;
                case 2:
                    $class = '男装';
                    break;
                case 3:
                    $class = '美妆';
                    break;
                case 4:
                    $class = '鞋包配饰';
                    break;
                case 5:
                    $class = '居家生活';
                    break;
                case 6:
                    $class = '数码电器';
                    break;
                case 7:
                    $class = '母婴儿童';
                    break;
                case 8:
                    $class = '户外运动';
                    break;
                case 9:
                    $class = '食品酒水';
                    break;
                case 10:
                    $class = '其他';
                    break;
                default:
                    $class = '全部';
            }
        ?>
        <li class="location_3"><?php echo $class;?></li>
    </ul>
    </div>
    <!--分类导航-->
    <div class="classify_nav">
        <ul>
            <li class="nav"><a data-subtype="11">全部</a><span>/</span></li>
            <li class="nav"><a data-subtype="1">女装</a><span>/</span></li>
            <li class="nav"><a data-subtype="2">男装</a><span>/</span></li>
            <li class="nav"><a data-subtype="3" >美妆</a><span>/</span></li>
            <li class="nav"><a data-subtype="4" >鞋包配饰</a><span>/</span></li>
            <li class="nav"><a data-subtype="5" >居家生活</a><span>/</span></li>
            <li class="nav"><a data-subtype="6" >数码电器</a><span>/</span></li>
            <li class="nav"><a data-subtype="7" >母婴儿童</a><span>/</span></li>
            <li class="nav"><a data-subtype="8" >户外运动</a><span>/</span></li>
            <li class="nav"><a data-subtype="9" >食品酒水</a><span>/</span></li>
            <li class="nav"><a data-subtype="10">其他</a></li>
        </ul>
    </div>
    <div class="data" data-classify=<?php echo $classify;?> ></div>
    <div class="classify_commodity">
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
        var index = <?php echo $classify;?>;
        var type = <?php echo $type;?>;
        index = (index == 11)?0:index;
        $('.search .right ul').find('a').removeClass('header_active');
        $('.search .right ul').find('a').eq(type-1).addClass('header_active');

        //$('.classify_nav .nav').find('a').removeClass('classify_active');
        $('.classify_nav .nav').find('a').eq(index).addClass('classify_active');
        conversion(0);
        $('.details_title').text('商品分类')
        //$('#footer').load('../common/footer.html');
        $('.nav').bind('click',function(){
            $(this).find('a').addClass('classify_active');
            $(this).siblings().find('a').removeClass('classify_active');
        })

//        初始化pagination
        $('#pagination').twbsPagination({
             totalPages: 1,//总页数
             startPage:1,//开始的页码
             visiblePages: 7,//显示的页面的数字个数
             initiateStartPageClick:true,
             first:'首页',
             prev:'上一页',
             next:'下一页',
             last:'尾页',
         });
        var $pagination = $('#pagination');
        var defaultOpts = {
            totalPages: 20
        };
        $pagination.twbsPagination(defaultOpts);

//        新修改的部分
        var type = <?php echo $type;?> , subtype = <?php echo $classify;?>;
//        拉取第一页数据
        getData();
//        点击头部type大分类
        $('.nav_title a').click(function(e){
//            处理头部type的css
            if($(this).text() === '最新试用') conversion(1);
            else if($(this).text() === '首页') conversion(0);
            else conversion(2);
//            处理小分类css 使之回到全部
            $('.classify_nav .nav .classify_active').removeClass('classify_active');
            $('.classify_nav .nav a').eq(0).addClass('classify_active');
            type = $(this).data('type');
            subtype = '11';
            $('.header_active').removeClass('header_active');
            $(this).addClass('header_active');
            getData();
            return false;
        })
//        点击subtype小分类
        $('.classify_nav .nav a').click(function(e){
            subtype = $(this).data('subtype');
            $('.classify_nav .nav .classify_active').removeClass('classify_active');
            $(this).addClass('classify_active');
            getData();
            return false;
        })
//        拉取总数据 并更新页码
        var temp = {1:'女装',
            2:'男装',
            3:'美妆',
            4:'鞋包配饰',
            5:'居家生活',
            6:'数码电器',
            7:'母婴儿童',
            8:'户外运动',
            9:'食品酒水',
            10:'其他',
            11:'全部'};
        function getData(){
            console.log('subtype:'+subtype)
            $.ajax({
                url: "<?=base_url('mall/homepage/getClassify')?>",
                method:'post',
                data:{
                    type:type,
                    classify:subtype,
                    page:1
                },
                success:function(result){
                    result = JSON.parse(result);
                    if(result.success==true) {
                        //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                        $('.classify_commodity').empty();
                        var html = '';
                        var classify_count = result.data.classify_count.count;
                        var totalPages = !(classify_count % 2) ? (classify_count / 2) : Math.floor(classify_count / 2) + 1;
//                        0数据时不可初始化pagination 并接入缺省内容
                        if (!totalPages) {
                            $pagination.hide();
                            switch (type)
                            {
                                case 1:
                                    var str = '<a href="'+ base_url+''+ '">首页</a>';
                                    $('.location_1').empty();
                                    $('.location_1').append(str);
                                    break;
                                case 2:
                                    $('.location_1').text('最新试用');
                                    break;
                                case 3:
                                    $('.location_1').text('最热试用');
                                    break;
                                default:
                                    break;
                            }

                            html = '<div class="search_page_noGood">'+
                                '<p><img src="'+ base_url + 'images/mall/ss_bg_wu_default.png" alt=""></p>'+
                                '<p class="introductions">亲，没有找到与“ <b>'+ temp[subtype]+'</b>”相关的宝贝哦！</p>'+
                                '</div>';
                            $('.classify_commodity').append(html);
                            console.log(subtype);
                            console.log(temp[subtype]);
                            $('.location_3').text(temp[subtype]);
                        } else {
                            $pagination.show();
                            $pagination.twbsPagination('destroy');
                            $pagination.twbsPagination($.extend({}, defaultOpts, {
                                totalPages: totalPages,
                                visiblePages: 7,//显示的页面的数字个数
//                            initiateStartPageClick:true,
                                first: '首页',
                                prev: '上一页',
                                next: '下一页',
                                last: '尾页',

                                onPageClick: function (event, page) {
                                    getPageData(page);
                                }
                            }));

                            recommend_list = result.data.classify_list;
                            recommend_list.forEach(function(e){
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
                                $('.classify_commodity').append(html);
                                la(e.start_time)
                            });

                            switch (type)
                            {
                                case 1:
                                    var str = '<a href="'+ base_url+''+ '">首页</a>';
                                    $('.location_1').empty();
                                    $('.location_1').append(str);
                                    break;
                                case 2:
                                    $('.location_1').text('最新试用');
                                    break;
                                case 3:
                                    $('.location_1').text('最热试用');
                                    break;
                                default:
                                    break;
                            }
                            console.log(subtype);
                            console.log(temp[subtype]);
                            $('.location_3').text(temp[subtype]);
                        }

                    }
                },
                error:function(result){
                    alert('error')
                }
            })
        }

//      拉取每页数据
        function getPageData(page){
            console.log('我是pagination调用的 type:'+type+'; subtype:'+subtype)
            $.ajax({
                //var base_url = 'localhost/shike/'
                url: "<?=base_url('mall/homepage/getClassify')?>",
                method:'post',
                data:{
                    type:type,
                    classify:subtype,
                    page:page
                },
                success:function(result){
                    result = JSON.parse(result);
                    if(result.success==true){
                        //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                        $('.classify_commodity').empty();
                        var html = '';
                        recommend_list = result.data.classify_list;
                        recommend_list.forEach(function(e){
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
                                '<span>限量'+ e.apply_amount + '份</span>'+ freight + '</span><span>已申请<b>'+ e.apply_count + '</b>次</span>'+
                                '</p>'+
                                '<p class="price">'+
                                '<span>&yen;'+ e.unit_price +'</span><span>'+apply+'</span>'+
                                '</p>'+
                                '<p class="progress_bar">'+
                                '<img src="" alt="">'+
                                '</p>'+
                                '</div>';
                            console.log(e);
                            $('.classify_commodity').append(html);
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
        }
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