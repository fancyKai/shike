/**
 * Created by 二更 on 2016/12/21.
 */

$('.modal .mask_layer').height(document.body.scrollHeight+1000);
$('.modal .close,.cancel,.confirm').on('click',function(){
    $(this).parents('.modal').fadeOut();
    enableScroll();
});
$.fn.myAlert=function(msg){
    $(this).fadeIn();
    $(this).find('.modal_content p').text(msg);
}

//function myAlert(txt){
//    $('.modal').fadeIn();
//    $('.modal .modal_content p').text(txt);
//}