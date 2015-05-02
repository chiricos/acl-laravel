$(document).on('ready',function()
{
   $('.menu').on('click',function()
   {
       $('header').css("display","block");
   }) ;

    $('.close-menu').on('click',function()
    {
       $('header').css('display','none');
    });
});