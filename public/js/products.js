
$(document).on('ready',function()
{
    var i=0;
    $('.seeCategory').on('click',function()
    {
        if(i==0)
        {
            $(this).text("ver por listado");
            $('.category').removeClass('hidden');
            $('#products').addClass('hidden');
            i++;
        }else{
            $(this).text("ver por categoria");
            $('.category').addClass('hidden');
            $('#products').removeClass('hidden');
            i=0;
        }

    });
});