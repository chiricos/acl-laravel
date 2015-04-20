<?php

use cerverus\Repositories\ProductRepo;
use cerverus\Managers\ProductManager;
use cerverus\Managers\StateProductManager;
use cerverus\Managers\UpdateProductManager;
use cerverus\Managers\CreateProductManager;
use cerverus\Entities\Product;
use cerverus\Entities\Payment;
use cerverus\Repositories\LogRepo;
use cerverus\Entities\BusinessProduct;
use cerverus\Entities\StateProduct;
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

    public function createProduct()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $product=new ProductRepo();
        $services=$product->getServices();
        return View::make('back.createProduct',compact('services','total'));
    }

    public function productSearch()
    {

        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $product=new ProductRepo();
        $services=$product->getServices();
        $products= DB::table('products')
            ->where('name', 'LIKE', "%".Input::get('search')."%")
            ->orWhere('id', 'LIKE', "%".Input::get('search')."%")
            ->get();
        if(Input::get('search')=="")
        {
            $products=Product::all();
        }

        return View::make('back.product',compact('total','services','products'));
    }

    public function saveProduct()
    {
        $productManager=new ProductManager(new Product(),Input::all());
        $productValidator=$productManager->isValid();
        if($productValidator)
        {
            return Redirect::route('createProduct')->withErrors($productValidator)->withInput();
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
            return Redirect::back()->with('message','El producto fue eliminado correctamente');
        }
        return Redirect::back()->with('message_error','El producto no fue eliminado correctamente');
    }

    public function update($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $product=new ProductRepo();
        $services=$product->getServices();
        $products=Product::all();
        $updateProduct=Product::find($id);
        return View::make('back.updateProduct',compact('total','services','products','updateProduct'));
    }

    public function updateSave($id)
    {
        $updateProduct=new UpdateProductManager(new Product(),Input::all());
        $productValidator=$updateProduct->isValid();
        if($productValidator){
            return Redirect::route('updateProduct',$id)->withErrors($productValidator)->withInput();
        }
        $update=$updateProduct->updateProduct($id);

        if($update)
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha actualizado un producto ',
                    'affected_entity'=> '',
                ]
            );
            return Redirect::route('product',Input::get('id'))->with('message','el producto se actualizo correctamente');
        }
        return Redirect::route('updateProduct',$id)->with('message_error','el producto no se actualizo porque el id ya esta siendo utilizado');
    }

    public function deleteProduct($id)
    {
        $businessProduct=BusinessProduct::where('product_id','=',$id)->first();
        if($businessProduct)
        {
            return Redirect::route('product')->with('message_error','El producto no se puede eliminar por que esta siendo utilizado');
        }
        $product=Product::find($id);
        $product->delete();
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha eliminado un producto ',
                'affected_entity'=> '',
            ]
        );
        return Redirect::route('product')->with('message','El producto fue eliminado correctamente');
    }

    public function seeProducts($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $business=Business::find($id);
        $showProducts=Product::all();
        $products=[''=>'seleccione un producto']+Product::all()->lists('name','id');
        $businessProducts=StateProduct::where('business_id','=',$id)->get();
        return View::make('front.products.stateProducts',compact('total','id','products','businessProducts','business','showProducts'));
    }

    public function saveProducts($id)
    {
        $stateProduct=new StateProductManager(new StateProduct(),Input::all());
        $productValidator=$stateProduct->isValid();
        if($productValidator)
        {
            return Redirect::route('addProducts',$id)->withErrors($productValidator)->withInput();
        }
        $stateProduct->saveProduct($id);
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha agregado un producto para cotizacion ',
                'affected_entity'=> '',
            ]
        );
        return Redirect::route('addProducts',$id)->with('message','El producto fue agregado correctamente');
    }

    public function showUpdateProducts($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $stateProduct=StateProduct::find($id);
        $business=Business::find($stateProduct->business_id);
        $showProducts=Product::all();
        $products=[''=>'seleccione un producto']+Product::all()->lists('name','id');
        $businessProducts=StateProduct::where('business_id','=',$business->id)->get();
        return View::make('front.products.updateProducts',compact('total','id','products','businessProducts','business','showProducts','stateProduct'));
    }

    public function updateProducts($id)
    {
        $stateProduct=StateProduct::find($id);
        $product=new StateProductManager(new StateProduct(),Input::all());
        $productValidator=$product->isValid();
        if($productValidator)
        {
            return Redirect::back()->withErrors($productValidator)->withInput();
        }
        $product->updateProduct($id);
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha actualizado un producto para cotizacion ',
                'affected_entity'=> '',
            ]
        );
        return Redirect::route('addProducts',$stateProduct->business_id)->with('message','el producto de cotizacion fue actualizado correactemente');
    }

    public function dellProducts($id)
    {
        $stateProduct=StateProduct::find($id);
        $stateProduct->delete();
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha eliminado un producto para cotizacion ',
                'affected_entity'=> '',
            ]
        );
        return Redirect::back()->with('message','El producto para cotizacion fue eliminado correctamente');
    }

}