/**
 * Created by 二更 on 2017/1/12.
 */
$(function(){
    $('.return_top ').hover(function(){
        $(this).find('img').attr('src','../../images/right_icon_top_selected.png');
    },function(){
        $(this).find('img').attr('src','../../images/right_icon_top_default.png');
    });




    if($("meta[name=toTop]").attr("content")=="true"){
        if($(".return_top").scrollTop()==0){
            $(".return_top").hide();
        }
        $(window).scroll(function(event) {
            /* Act on the event */
            if($(this).scrollTop()==0){
                $(".return_top").hide();
            }
            if($(this).scrollTop()!=0){
                $(".return_top").show();





            }
        });
        $(".return_top").click(function(event) {
            /* Act on the event */
            $("html,body").animate({scrollTop:"0px"},1000)
        });
    }
})
