$(document).on('ready',function()
{
    $('.update-business').each(function(){
        if($(this).val()==1)
        {
            $('.business-one').removeClass('hidden');
        }
        if($(this).val()==2)
        {
            $('.business-two').removeClass('hidden');
        }
    });

});