<?php



class ProductController extends BaseController
{
    public function product()
    {
        return View::make('back.product');
    }
}