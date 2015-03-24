<?php



class ProductController extends BaseController
{
    public function product()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        return View::make('back.product',compact('total'));
    }
}