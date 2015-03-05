$(document).on("ready",function()
{
    var i=0;
    $('.new-contact').on("click",function()
    {
        if(i==1)
        {
            $(".content-contact").addClass("hidden");
            i=0;
        }else{
            $(".content-contact").removeClass("hidden");
            i++;
        }
    });
    $('.contact1').removeClass('hidden');
});