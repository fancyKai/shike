/**
 * Created by 二更 on 2016/12/21.
 */
function alert(){
    $('.mask_layer').height(document.body.scrollHeight+1000);

    $('.close,.cancel,.confirm').bind('click',function(){
        $('.modal').css('display','none');
        enableScroll();
    });
}