<?php

use cerverus\Repositories\ProductRepo;
use cerverus\Managers\ProductManager;
use cerverus\Managers\CreateProductManager;
use cerverus\Entities\Product;
use cerverus\Entities\Payment;
use cerverus\Repositories\LogRepo;
use cerverus\Entities\BusinessProduct;
use cerverus\Entities\Business;

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
        $business=Business::find($id);
        $showProducts=Product::all();
        $products=[''=>'seleccione un producto']+Product::all()->lists('name','id');
        $businessProducts=BusinessProduct::where('business_id','=',$id)->get();
        return View::make('front.products.showProducts',compact('total','id','products','businessProducts','business','showProducts'));
    }

    public function addProducts($id)
    {
        $productManager=new CreateProductManager(new BusinessProduct(),Input::all());
        $productValidator=$productManager->isValid();
        if($productValidator)
        {
            return Redirect::route('createProducts',$id)->withErrors($productValidator)->withInput();
        }
        $productManager->saveProduct($id);
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha agregado un producto a una empresa ',
                'affected_entity'=> '',
            ]
        );
        return Redirect::route('createProducts',$id)->with('message','el producto fue creado correctamente');
    }

    public function delete($id)
    {

        $product=BusinessProduct::find($id);
        $ids=Business::find($product->business_id)->lists('id');
        $payment=Payment::where('businessProduct_id','=',$id);
        if($product->delete() and $payment->delete())
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha eliminado un producto de una empresa ',
                    'affected_entity'=> '',
                ]
            );
            return Redirect::route('createProducts',$ids)->with('message','El producto fue eliminado correctamente');
        }
        return Redirect::route('createProducts',$ids)->with('message_error','El producto no fue eliminado correctamente');
    }

}