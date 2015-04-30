$(document).on('ready',function()
{
    if($('#phone').val()==0)
    {
        $('#phone').val(null);
    }

    if($('#phone1').val()==0)
    {
        $('#phone1').val(null);
    }

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