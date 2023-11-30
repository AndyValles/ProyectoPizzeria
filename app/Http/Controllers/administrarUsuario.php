<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_administrador;

use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class administrarUsuario extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $search;

    public function __construct(){
        $this->search=new search();
    }

    public function Admin($id){
        if(session()->get("userId")==$id){
            $user=$id;
            $usu=array("nombres"=>"","sexo"=>"","fechanacimiento"=>"","telefono"=>"","correo"=>"");
            $usuario=$this->search->search_Usuario("USU_CodigoInterno",$user);
            foreach($usuario as $key=>$value){
                $usu["nombres"]=$value->USU_PriNombre." ".$value->USU_ApePaterno;
                $usu["sexo"]=$value->SEX_Nombre;
                $usu["fechanacimiento"]=$value->USU_FechaNacimiento;
                $usu["telefono"]=$value->USU_Telefono;
                $usu["correo"]=$value->USU_Correo;
            }
            foreach($usu as $key=>$value){
                $data[$key]=$value;
            }
            $data["admin"]=$this->admin_cc($user);
            $data["user_modal"]=$this->Usuario();
            $data["user"]=$user;

            return view("AdministrarUsuario.admin_user",$data);
        }else{
            return "hola";
        }
    }

    private function admin_cc($id){
        $admin_id=false;
        $admin=$this->search->search_Administrador("USU_CodigoInterno",$id);
        foreach($admin as $key=>$value){
            $admin_id=true;
        }
        return $admin_id;
    }

    public function Usuario(){
        $usu=session()->get("userId");
        $values=array("dni"=>"","prinombre"=>"","segnombre"=>"","apepaterno"=>"","apematerno"=>"","telefono"=>"",
        "correo"=>"","fechanacimiento"=>"","sexo"=>"","usuario"=>"","clave"=>"",);
        $usuario=$this->search->search_Usuario("USU_CodigoInterno",$usu);
        foreach($usuario as $key=>$value){
            $values["dni"]=$value->USU_DNI;
            $values["prinombre"]=$value->USU_PriNombre;
            $values["segnombre"]=$value->USU_SegNombre;
            $values["apepaterno"]=$value->USU_ApePaterno;
            $values["apematerno"]=$value->USU_ApeMaterno;
            $values["telefono"]=$value->USU_Telefono;
            $values["correo"]=$value->USU_Correo;
            $values["fechanacimiento"]=$value->USU_FechaNacimiento;
            $values["sexo"]=$value->SEX_Nombre;
            $values["usuario"]=$value->USU_Usuario;
            $values["clave"]=$value->USU_Clave;
        }
        foreach($values as $key=>$value){
            $data[$key]=$value;
        }
        $data["user"]=$usu;
        return view("AdministrarUsuario.perfil",$data);
    }

    public function Ubicacion(){
        $user=session()->get("userId");
        $values=array("lugar"=>"","provincia"=>"","distrito"=>"","direccion"=>"","calle"=>"","numero"=>"","referencia"=>"",);
        $usuario=$this->search->search_Ubicacion("USU_CodigoInterno",$user);
        foreach($usuario as $key=>$value){
            $values["lugar"]=$value->LUG_Nombre;
            $values["provincia"]=$value->PROV_Nombre;
            $values["distrito"]=$value->DIS_Nombre;
            $values["direccion"]=$value->UBI_Direccion;
            $values["calle"]=$value->UBI_Calle;
            $values["numero"]=$value->UBI_Numero;
            $values["referencia"]=$value->UBI_Referencia;
        }
        foreach($values as $key=>$value){
            $data[$key]=$value;
        }

        $data["user"]=$user;
        return view("AdministrarUsuario.ubicacion",$data);
    }

    public function editarUsuario(){
        $user=session()->get("userId");
        $values=array("lugar"=>"","provincia"=>"","distrito"=>"","direccion"=>"","calle"=>"","numero"=>"","referencia"=>"",);
        $usuario=$this->search->search_Ubicacion("USU_CodigoInterno",$user);
        foreach($usuario as $key=>$value){
            $values["lugar"]=$value->LUG_Nombre;
            $values["provincia"]=$value->PROV_Nombre;
            $values["distrito"]=$value->DIS_Nombre;
            $values["direccion"]=$value->UBI_Direccion;
            $values["calle"]=$value->UBI_Calle;
            $values["numero"]=$value->UBI_Numero;
            $values["referencia"]=$value->UBI_Referencia;
        }
        foreach($values as $key=>$value){
            $data[$key]=$value;
        }

        $data["user"]=$user;
        return view("AdministrarUsuario.ubicacion",$data);
    }

    public function AgregarUbicacion(){
        $user=session()->get("userId");
        $values=array("lugar"=>"","provincia"=>"","distrito"=>"","direccion"=>"","calle"=>"","numero"=>"","referencia"=>"",);
        $usuario=$this->search->search_Ubicacion("USU_CodigoInterno",$user);
        foreach($usuario as $key=>$value){
            $values["lugar"]=$value->LUG_Nombre;
            $values["provincia"]=$value->PROV_Nombre;
            $values["distrito"]=$value->DIS_Nombre;
            $values["direccion"]=$value->UBI_Direccion;
            $values["calle"]=$value->UBI_Calle;
            $values["numero"]=$value->UBI_Numero;
            $values["referencia"]=$value->UBI_Referencia;
        }
        foreach($values as $key=>$value){
            $data[$key]=$value;
        }

        $data["user"]=$user;
        return view("AdministrarUsuario.ubicacion",$data);
    }

}

?>
