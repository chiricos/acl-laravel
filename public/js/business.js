$(document).on('ready', function() {
    $('#value').on('change',function()
    {
       if(this.value<1)
       {
           alert('El valor debe ser positivo');
           this.value='';
       }
    });
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

    var state=parseInt($('.get-state').text());
    if($('.get-type').text()==1)
    {
        $('.state-input').each(function(index)
        {
                $(this).removeClass('hidden');
        });
    }else{

        $('.state-input').each(function(index)
        {
            if(index<state)
            {
                $(this).removeClass('hidden');
            }

        });
        $('.state-change').on('change',function()
        {
            console.log("si llenas");
            alert("Si llenas este campo pasara a ser cliente de Mi-Martinez");
        });

    }


    $('.state-p0').on('click',function()
    {
        $('.state0').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p1').on('click',function()
    {
        $('.state1').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p2').on('click',function()
    {
        $('.state2').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p3').on('click',function()
    {
        $('.state3').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p4').on('click',function()
    {
        $('.state4').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p5').on('click',function()
    {
        $('.state-change').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p6').on('click',function()
    {
        $('.state6').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p7').on('click',function()
    {
        $('.state7').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p8').on('click',function()
    {
        $('.state8').css("display", "block");
        $(this).addClass('hidden');
    });
    $('.state-p9').on('click',function()
    {
        $('.state9').css("display", "block");
        $(this).addClass('hidden');
    });

});

