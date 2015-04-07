<?php



class PromotionController extends BaseController
{

    public function show()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        return View::make('front.promotion.showPromotion',compact('total'));
    }

    public function sendPromotion()
    {
        drawde(Input::all());
    }

}
