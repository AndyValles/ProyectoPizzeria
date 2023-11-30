<?php

namespace App\Http\Controllers;

use App\Models\Procedure\Buscar\search;
use APP\Models\Procedure\Procedure;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $search;
    private $config;
    public function __construct(){
        $this->config=new Configuracion();
        $this->search=new search();
    }
    public function informacion(){
        $nombre="";
        $id=session()->get("userId");
        $user=$this->search->search_Usuario("USU_CodigoInterno",$id);
        foreach($user as $key=>$value){
            $nombre=$value->USU_PriNombre." ".$value->USU_ApePaterno;
        }
        $data["id"]=$id;
        $data["user"]=$nombre;
        $data["sucursal"]=$this->sucursales();
        $data["producto"]=$this->producto();
        $data["tipoArt"]=$this->TipoArticulo();
        return  view("informacion",$data);
    }

    public function carrito(){
        $delivery=0;
        $igv=8;
        $descuento=0;
        $subtotal=$this->config->total_pedidos()["total"];
        $total=($subtotal-$descuento)-$igv;

        $data["cantidad"]=$this->config->total_pedidos()["cantidad"];
        $data["total"]=$total;
        $data["subtotal"]=$subtotal;
        $data["descuento"]=$descuento;
        $data["igv"]=$igv;
        $data["producto"]=$this->obtenerPedidos();
        $data["delivery"]= $delivery==0?"Gratis": $delivery;

        return  view("carrito",$data);
    }

    public function cerrarsesion(){
        $cerrado=false;
        try{
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            $cerrado=true;
        }catch(Exception $e){}
        return  request()->json(["succes"=>$cerrado]);
    }

    public function  obtenerPedidos(){
        $html="";
        if(Auth::check()){
        $id_pedido=Auth::user()->USU_CodigoInterno;
        $pedido=$this->search->search_pedido("USU_CodigoInterno",$id_pedido,$this->search->cantidad_pedido());
            foreach($pedido as $key=>$value){
                if($value->PED_Estado=="1"){
            $pedidodetalle=$this->search->search_PedidoDetalle("PED_CodigoInterno",$value->PED_CodigoInterno,$this->search->cantidad_PedidoDetalle());
            foreach($pedidodetalle as $keypd =>$valuepd){
                $articulo=$this->search->search_Articulo("ART_CodigoInterno",$valuepd->ART_CodigoInterno);
                foreach($articulo as $keya=>$valuea){

            $html.=' <!--item-->
            <section class="content-storecar">
                <div class="ctn-descrip-storecar">
                    <div class="row-descrip-storecar">
                        <div class="cnt-img-store"><img class="image-cover" src="'.asset($valuea->ART_Imagen).'" alt=""></div>
                        <div class="cnt-des-store">
                            <div class="txt-title-store">'.$valuea->ART_Nombre.'</div>
                            <div class="txt-descrip-store">'.$valuea->ART_Descripcion.'</div>
                            <div class="txt-subdescrip-store">'.$valuea->TIPART_Nombre.'</div>
                            <div class="txt-cantidad-store">Cantidad:'.$valuepd->PEDDET_Cantidad.'</div>
                        </div>
                    </div>
                    <section class="txt-info-price-store">
                            <div class="txt-price-store">S/ '.$valuea->ART_Precio.'</div>
                            <div class="txt-date-store">'. date_format(date_create($valuepd->PEDDET_FechaRegistro), 'F j, Y').'</div>
                    </section>
                </div>
                <div class="cnt-btn-store">
                    <div class="w-30"><button  class="btn btn-store-eval"><i class="icon-bin mr-10"></i>Eliminar</button></div>
                </div>
            </section>
            <!--enditem-->';}
                     }
                }
            }
        }
        return $html;
    }


    public function sucursales(){
        $html="";
        $sucursal=$this->search->search_Sucursal("","",5);
        foreach($sucursal as $key=>$value){
            $html.='<div class="row-local w-100">
                    <div class="w-100">
                        <div class="local-des">'.$value->SUC_Direccion.'</div>
                        <div class="gray-184">'.$value->DIS_Nombre.'</div>
                    </div>
                    <div class="num-local">'.$value->SUC_Telefono.'</div>
                </div>';
        }
        return $html;
    }

    public function producto(){
        $html="";
        $producto=$this->search->search_Articulo("","",4);
        foreach($producto as $key=>$value){
            $html.='<div class="row-plato-item">
                    <div class="row-plato-img"><img src="' .asset($value->ART_Imagen) .'" alt="'.$value->ART_Imagen.'" width="100%"></div>
                    <div class="descrip-plato-item">
                        <div class="dp-f">
                            <div class="w-50 txt-20">'.$value->ART_Nombre.'</div>
                            <div class="txt-20 yelow-239">S/. '.$value->ART_Precio.'</div>
                        </div>
                        <div class="gray-169 txt-15 w-90">'.$value->ART_Descripcion.'</div>
                    </div>
                </div>';
        }
        return $html;
    }

    public function TipoArticulo(){
        $html=' <div class="w-100"><button class="btn bg-transparent txt-menu-item txt-select-item" data-id="0">TODO</button></div>';
        $tipoart=$this->search->search_TipoArticulo("","",$this->search->cantidad_TipoArticulo());
        foreach($tipoart as $key=>$value){
            if($value->TIPART_Estado!="3"){
            $html.='<div class="w-100 ">
                        <button class="btn bg-transparent txt-menu-item" data-id="'.$value->TIPART_CodigoInterno.'">'.$value->TIPART_Nombre.'</button>
                    </div>';
            }
        }

        return $html;
    }

    public function pedidoenviado(){
        $usuario=session()->get("userId");
        $total=0;
        $procedure=new Procedure();
        $pedido=$procedure->CRUD1("PROCEDURE_CREAR_PEDIDO",[":Usuario"=>$usuario]);
        foreach($pedido as $key=>$value){
                $id_pedido=$value->codigo;
        }
        $pedidoa=$this->search->search_PedidoDetalle("PED_CodigoInterno",$id_pedido);
        foreach($pedidoa as $key=>$value){
            $articulo=$this->search->search_Articulo("ART_CodigoInterno",$value->ART_CodigoInterno);
            foreach($articulo as $keya=>$valuea){
                $total+=($valuea->ART_Precio+$value->PEDDET_Cantidad);
            }
        }

        $param=array(
            ":Codigo"=> $id_pedido,
            ":Total"=> $total,
            ":Descuento"=> 0,
            ":FORMAPAGO"=> 1,
            ":USUARIO"=> $usuario,
            ":TIPOPEDIDO"=> 1,
            ":Comentario"=> "",
            ":Estado"=>"2"
        );
        $pedido=$procedure->update($param,"PROCEDURE_CRUD_Pedido");
        return $param;
    }


}
