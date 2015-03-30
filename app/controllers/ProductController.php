<?php

use cerverus\Repositories\ProductRepo;
use cerverus\Managers\ProductManager;
use cerverus\Managers\CreateProductManager;
use cerverus\Entities\Product;
use cerverus\Repositories\LogRepo;

class ProductController extends BaseController
{
    public function product()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $product=new ProductRepo();
        $services=$product->getServices();
        $products=Product::all();
        return View::make('back.product',compact('total','services','products'));
    }

    public function saveProduct()
    {
        $productManager=new ProductManager(new Product(),Input::all());
        $productValidator=$productManager->isValid();
        if($productValidator)
        {
            return Redirect::route('product')->withErrors($productValidator)->withInput();
        }
        $productManager->saveProduct();
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha creado un producto ',
                'affected_entity'=> Input::get('name'),
            ]
        );

        return Redirect::route('product')->with('message','el producto se guardo correctamente');

    }

    public function showProducts($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $products=[''=>'seleccione un producto']+Product::all()->lists('name','id');
        return View::make('front.products.showProducts',compact('total','id','products'));
    }

    public function addProducts($id)
    {
        $productManager=new CreateProductManager(new Product(),Input::all());
        $productValidator=$productManager->isValid();
        if($productValidator)
        {
            return Redirect::route('createProducts',$id)->withErrors($productValidator)->withInput();
        }
    }

}