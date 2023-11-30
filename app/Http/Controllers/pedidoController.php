<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_pedido;

use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class pedidoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Pedido/";
    private $search;
    private $pedido;
    private $procedure;
    private $entidad="Pedido";

    public function __construct(){
        $this->search=new search();
        $this->pedido=new tb_pedido();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Pedido","PROCEDURE_SELECT_Pedido");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["pedido"] =  $this->table($this->pedido->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        //$data["total"]=$this->procedure->pagination($this->pedido->getArrayAll());
        //$data["paginate"]=$this->paginate($this->pedido->getArrayAll());
        //$data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="PED";
        $data["iniciA"]=5;
        return view(self::ruta.'pedidoIndex',$data);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->pedido->getArrayAll():$request->input("values");
        $limit=$request->input("limit");
        $offset=$request->input("offset");

        $calculo= ($offset-1)*$limit;
        $html=$this->table($data,$limit,$calculo);
        $paginate=$this-> paginate($data,$offset,$limit);
        return response()->json(['table'=>$html,'paginate'=>$paginate,'Ver'=>$calculo,'prueba'=>$request->input("values")]);
    }

    public function table($busqueda=array("%%","%%","1"),$limit=5,$offset=0){
        $data=$this->search->search_pedido("","",$this->search->cantidad_pedido());
        $html="";
            foreach ($data as $key => $d) {
                $product=$this->search->search_PedidoDetalle("PED_CodigoInterno",$d->PED_CodigoInterno);
                $ubicacion=$this->search->search_Ubicacion("USU_CodigoInterno",$d->USU_CodigoInterno);
                $cantP= $this->search->cantidad_PedidoDetalle();
                if($d->PED_Estado=="2"){
                $html.='<article class="ctn-table-pedido">
                            <section class="row-table-pedido-small">
                                <div class="w-50">
                                    <article class="txt-pedido-title-ss">Pedido Realizado</article>
                                    <article class="txt-pedido-title-ii ">'.date_format(date_create($d->PED_FechaRegistro),'Y-m-d').'</article>
                                </div>
                                <div class="w-50">
                                    <article class="txt-pedido-title-ss">Total</article>
                                    <article class="txt-pedido-title-ii ">S/. '.$d->PED_Total.'</article>
                                </div>';
                            foreach($ubicacion as $keyu=>$valueu){
                        $html.= '<div class="w-50">
                                    <article class="txt-pedido-title-ss">envio a</article>
                                    <article class="txt-pedido-title-ii ">'.$valueu->UBI_Direccion.','.$valueu->UBI_Referencia.','.$valueu->DIS_Nombre.'</article>
                                </div>';}
                        $html.=        '<div class="item-row-table-small">
                                        <article class="txt-pedido-title-ss">Nro orden</article>
                                    <article class="txt-pedido-title-ii ">#'.$d->PED_Numero.'</article>
                                </div>
                            </section>
                            <section class="row-table-pedido-big">
                                <div class="content-table-big">
                                    <i class="icon-product"></i>
                                </div>
                                <div class="table-conten-product">
                                    <article class="txt-title-product">'.$d->USU_PriNombre." ".$d->USU_SegNombre.'</article>
                                    <article class="txt-descrip-product">
                                        <div>Productos en el pedido:</div>';
                    foreach($product as $keyp=>$valueP){$html.='<div>'.$valueP->ART_Nombre.'</div>';}
                    if($cantP>5){$html.= '<div>Y mas('.($cantP-5).')</div>';}
                       $html.= '    </article>
                                </div>
                                <div class="content-table-big">
                                    <article class="w-100"><button class="btn btn-pedido-vermas">Ver mas</button></article>
                                </div>
                            </section>
                            <section class="row-table-pedido-small">
                                <div class="w-100">
                                    <span class="txt-pedido-title-ss">Delivery estimado:</span>
                                    <span class="txt-pedido-title-ii"><!--Sep 8,2023 3:40 p.m.-->30 min</span>
                                </div>
                            </section>
                        </article>';
                }
            }
        return $html;
    }
}

?>
