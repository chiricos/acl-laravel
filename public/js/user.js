


$(document).on('ready', function() {
    if($('#role_id').val()<3)
    {
        $('.create-manager').addClass('hidden');
        $('#manager').val(0);
    }
    $('#role_id').on('change',function()
    {
        if($('#role_id').val()<3)
        {
            $('.create-manager').addClass('hidden');
            $('#manager').val(0);
        }else{
            $('.create-manager').removeClass('hidden');
        }
    });
    var j=0;
    $('.changePassword').on('click',function()
    {
        if(j==0)
        {
            $('.profilePassword').removeClass('hidden');
            j++;
        }else{
            $('.profilePassword').addClass('hidden');
            j=0;
        }
    });
    var k=0;
    $('.showMove').on('click',function()
    {
        if(k==0)
        {
            $('.profileLogs').removeClass('hidden');
            k++;
        }else{
            $('.profileLogs').addClass('hidden');
            k=0;
        }
    });

});
var i=0;
    function showForm()
    {
        if(i==0)
        {
            $('.profileUpdate').removeClass('hidden');
            i++;
        }else{
            $('.profileUpdate').addClass('hidden');
            i=0;
        }
    }

$(document).on('ready',function()
{

    $('.icon-camera').on('click',function()
    {
       $('.popUp').removeClass('hidden');
    });
    $('.close-popUp').on('click',function()
    {
        $('.popUp').addClass('hidden');
    });
});

