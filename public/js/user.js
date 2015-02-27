

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

});

