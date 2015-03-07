$(document).on('ready', function() {
    $('.type1').removeClass('hidden');
    $('.type-tow2').removeClass('hidden');
    var i= 0,j=0;
    $('.business-fixed').on('click',function()
   {
       if(i==0)
       {
           $('.business-one').removeClass('hidden');
           $('.business-two').addClass('hidden');
           $('.business1').val(1);
           $('.business2').val(0);
           i++;
           j=0;
       }else{
           $('.business-one').addClass('hidden');
           $('.business1').val(0);
           i=0;
       }



   });

    $('.business').on('click',function()
    {
        if(j==0)
        {
            $('.business-two').removeClass('hidden');
            $('.business-one').addClass('hidden');
            $('.business2').val(2);
            $('.business1').val(0);
            j++;
            i=0;
        }else{
            $('.business-two').addClass('hidden');
            $('.business2').val(0);
            j=0;
        }
    });
    /* STADOS */

    if($('.get-type').text()==1)
    {
        console.log($('.get-state').text())
    }else{
        console.log($('.get-state').text())
    }

});
