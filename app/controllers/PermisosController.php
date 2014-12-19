<?php
use Illuminate\Auth\UserInterface;

class PermisosController extends BaseController {


    public function menu(){
        $menus= DB::select('SELECT * FROM menus WHERE nivel = 0');
        $submenus= DB::select('SELECT * FROM menus WHERE nivel = 1');
        $subsubmenus=DB::select('SELECT * FROM menus WHERE nivel = 2');
        return View::make('menu',array("menus"=>$menus,"submenus"=>$submenus,"subsubmenus"=>$subsubmenus));
    }

    public function permiso1(){
        return View::make('permisos');
    }public function permiso2(){
        return View::make('permisos');
    }public function permiso3(){
        return View::make('permisos');
    }public function permiso4(){
        return View::make('permisos');
    }public function permiso5(){
        return View::make('permisos');
    }public function permiso6(){
        return View::make('permisos');
    }public function permiso7(){
        return View::make('permisos');
    }public function permiso8(){
        return View::make('permisos');
    }public function permiso9(){
        return View::make('permisos');
    }public function permiso10(){
        return View::make('permisos');
    }public function permiso11(){
        return View::make('permisos');
    }public function permiso12(){
        return View::make('permisos');
    }


}