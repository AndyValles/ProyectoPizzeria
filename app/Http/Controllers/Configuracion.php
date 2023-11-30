<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_menu;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Buscar\Buscar_Menu;
use App\Models\Procedure\Buscar\search;
use Illuminate\Support\Facades\Auth;

class Configuracion extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $procedure;
    private $search;

    public function __construct()
    {
        $this->search=new search();
        $this->procedure = new Buscar_Menu();
    }


    public function user(){
        $User=array();
        $ID=session()->get("userId");
        $usuario=$this->search->search_Usuario("USU_CodigoInterno",$ID);
        foreach ($usuario as $key => $value) {
            $User=$value;
        }
        return $User;
    }

    public function parent_path($pathparent,$path){
        $count=0;
        $name="";
        for($i=0;$i<count(str_split($path));$i++){
            if($pathparent==$name){
                break;
            }else{
                $count=$count+1;
                $name=substr($path,0,$count);
            }
        }
        return $name;
    }

    public function total_pedidos(){
        $pedido=["total"=>0,"cantidad"=>0];
        if(Auth::check()){
            $id_pedido=Auth::user()->USU_CodigoInterno;
            $p=$this->search->search_pedido("USU_CodigoInterno",$id_pedido,$this->search->cantidad_pedido());
                foreach($p as $key=>$value){
                    if($value->PED_Estado==1){
                        $pd=$this->search->search_PedidoDetalle("PED_CodigoInterno",$value->PED_CodigoInterno,$this->search->cantidad_PedidoDetalle());
                        foreach($pd as $keya=>$valuea){
                            $pedido["total"]+=$valuea->ART_Precio;
                            $pedido["cantidad"]+=1;
                        }
                    }
                }
            }
       return $pedido;
    }

    public function menu_Admin(){
        $url=Request();
        $html="";
        $query=$this->procedure->BusquedaAll();

        foreach ($query as $key => $value){
            $html.="<div class='w-100 '>";
            if($value->MEN_Estado!="0"){
            if($value->MEN_CodigoPadre=="0"){
                $selecion=$value->MEN_Ruta==$this->parent_path($value->MEN_Ruta,"/".$url->path())?"btn-adminselect":"";
                if($value->MEN_Tipo=="btn"){
                    $html.="<button class='btn adminmenu-btn  $selecion' data-value='".$value->MEN_Nombre."' id='btn-".$value->MEN_Nombre."'><i class='$value->MEN_Icono'></i> $value->MEN_Nombre</button>";
                }else{
                    $html.="<a class='df-ac adminmenu-btn $selecion'  href='".url($value->MEN_Ruta)."'><i class='$value->MEN_Icono'></i> $value->MEN_Nombre</a>";
                }
                $data=$this->procedure->BusquedaParametro($this->value_menu($value->MEN_CodigoInterno),"MEN_CodigoPadre");
                if($data!=null){
                    $html.="<div class='adminmenu-hr-btn ".($selecion!=""?"h-100":"")."'  id='ctn-".$value->MEN_Nombre."'>";
                        foreach($data as $key => $dvalue){
                            if($dvalue->MEN_Estado!="0"){
                                $html.="<div class='w-100'><a  class='btn ".("/".$url->path()."/"==$dvalue->MEN_Ruta?"btn-hr-select":"")."'  href='".url($dvalue->MEN_Ruta)."'><i class='$dvalue->MEN_Icono'></i>$dvalue->MEN_Nombre</a></div>";
                            }
                        }
                    $html.="</div>";
                 }
                }
            }
            $html.="</div>";
        }
        return $html;
    }

    public function value_menu($data){
        $value="";
        $promp=str_replace("0","",$data);
        if(count(str_split($promp))>=3){
            $value=$promp;
        }else{
            $value=str_replace("-","",$promp);
        }
        return $value;
    }

}
?>
