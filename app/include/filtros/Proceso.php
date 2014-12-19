<?php
class Proceso
{
    private $_tablaRole;
    private $_tablaUsuario;
    private $_tablaPermiso;
    private $_permisoTotal;
    private $_permisoDenegado;

    public function __construct()
    {
        $this->_tablaPermiso= $total_permisos=NombrePermiso::all()->lists('nombre','id');
        $this->_tablaRole=Role::whereRaw("id_role=".Auth::user()->id_role."")->lists('id_permiso');
        $this->_tablaUsuario=Permiso::whereRaw("id_usuario=".Auth::user()->id."")->lists('id_permiso');
        $this->_permisoDenegado=Permiso::whereRaw("id_usuario=".Auth::user()->id."")->lists('no_permiso');
    }

    public function filtrarPermisos()
    {
        $this->_permisoTotal=array_merge($this->_tablaRole,$this->_tablaUsuario);

        for ($i=1;$i<=count($this->_tablaPermiso);$i++)
        {
            for ($j=0;$j<count($this->_permisoTotal);$j++)
            {
                if($i==$this->_permisoTotal[$j])
                {
                    $this->_tablaPermiso[$i]=1;
                }
            }
            if($this->_tablaPermiso[$i]!=1){
                $this->_tablaPermiso[$i]=0;
            }
        }
        return $this->procesoFinal();

    }

    public function procesoFinal()
    {
        for ($i=1;$i<=count($this->_tablaPermiso);$i++)
        {
            for ($j=0;$j<count($this->_permisoDenegado);$j++)
            {
                if($i==$this->_permisoDenegado[$j])
                {
                    $this->_tablaPermiso[$i]=0;
                }
            }

        }
        return $this->_tablaPermiso;
    }

}