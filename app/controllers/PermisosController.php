<?php
use Illuminate\Auth\UserInterface;

class PermisosController extends BaseController {

    public function logs($accion)
    {

        $log=new Registro();
        if(Auth::user())
        {
            $log->nombre=Auth::user()->username;
            $log->accion=$accion;
        }else{
            $log->nombre=Input::get("username");
            $log->accion="se ha registrado";
        }

        $log->save();

    }

    public function menu(){
        $menus= DB::select('SELECT * FROM menus WHERE nivel = 0');
        $submenus= DB::select('SELECT * FROM menus WHERE nivel = 1');
        $subsubmenus=DB::select('SELECT * FROM menus WHERE nivel = 2');

            return View::make('menu', array("menus" => $menus, "submenus" => $submenus, "subsubmenus" => $subsubmenus));

    }

    public function registrarse()
    {
        if(Input::get())
        {
            $inputs =$this->getInputs(Input::all());
            if($this->validateForms2($inputs) === true)
            {

                $user=new User($inputs);

                $user->password=Hash::make(Input::get("password"));
                $user->id_role=3;
                if($user->save())
                {
                    $this->logs("creo una cuenta");
                    return Redirect::to('login')->with(array('mensaje'=>'la cuenta ha sido creada correctamente'));
                }
            }else{
                return Redirect::to('registrarse')->withErrors($this->validateForms($inputs))->withInput();
            }
        }else {

            return View::make('accounts.registrarse');
        }

    }

    public function permiso1(){
        if((Auth::user()->id_role)==1) {
            $roles =
                ["auto" => "Tipo de Cuenta"] +
                [3 => "Usuario"] +
                [2 => "Administrador"] +
                [1 => "Super Administrador"];
        }else{
            $roles=
                [ "auto" => "Tipo de Cuenta"]+
                [ 3 => "Usuario"]+
                [ 2 => "Administrador"];
        }

        if(Input::get())
        {

            $inputs =$this->getInputs(Input::all());
            if($this->validateForms($inputs) === true)
            {

                $user=new User($inputs);

                $user->password=Hash::make(Input::get("password"));
                if($user->save())
                {
                    $this->logs("creo una cuenta");
                    return Redirect::to('')->with(array('mensaje'=>'la cuenta ha sido creada correctamente'));
                }
            }else{
                return Redirect::to('permiso1')->withErrors($this->validateForms($inputs))->withInput();
            }
        }else {

            return View::make('administration.createAccounts', compact('roles'));
        }
    }public function permiso2(){
        $users= User::all();
        return View::make('permission.permission',compact("users"));
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



    private function validateForms($inputs =array())
    {
        $rules= array(
            'user_name'                 =>  'required|min:1|max:105|unique:users',
            'name'                      =>  'required|min:1|max:105',
            'last_name'                 =>  'required|min:1|max:15',
            'email'                     =>  'required|min:1|max:100|unique:users',
            'password'                  =>  'required|min:1|max:105',
            'confirmar_password'        =>  'required|min:1|max:105|same:password',
            'role_id'                   =>  'numeric'
        );

        $messages=array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max'       => 'El campo :attribute no puede tener más de :max carácteres.',
            'email'     => 'El correo esta mal escrito',
            'same'      => 'Las contraseñas deben ser iguales',
            'unique'    => 'ya se encuentra registrado',
            'numeric'   => 'ingrese el tipo de cuenta'
        );

        $validation = Validator::make($inputs,$rules,$messages);
        if($validation->fails())
        {

            return $validation;

        }else{

            return true;

        }
    }
    private function validateForms2($inputs =array())
    {
        $rules= array(
            'username'            =>  'required|min:1|max:105|unique:users',
            'nombre'            =>  'required|min:1|max:105',
            'apellido'          =>  'required|min:1|max:15',
            'correo'            =>  'required|min:1|max:100|unique:users',
            'password'          =>  'required|min:1|max:105',
            'confirmar_password'=>  'required|min:1|max:105|same:password'
        );

        $messages=array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max'       => 'El campo :attribute no puede tener más de :max carácteres.',
            'email'     => 'El correo esta mal escrito',
            'same'      => 'Las contraseñas deben ser iguales',
            'unique'    => 'ya se encuentra registrado',
            'numeric'   => 'ingrese el tipo de cuenta'
        );

        $validation2 = Validator::make($inputs,$rules,$messages);
        if($validation2->fails())
        {

            return $validation2;

        }else{

            return true;

        }
    }

    private function getInputs($inputs =array())
    {
        foreach($inputs as $key=>$val){
            $inputs[$key]= $val;
        }
        return $inputs;
    }


}