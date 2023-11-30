<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_item;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class itemController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Item/";
    private  $search;
    private $item;
    private $procedure;
    private $entidad="item";
    private $tipoItem;
    public function __construct(){
        $this->search=new  search();
        $this->tipoItem=new Selects();
        $this->item=new tb_item();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Item","PROCEDURE_SELECT_Item");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_TIPIT_Estado");
        $data["tipoItem"]=$this->tipoItem->select_Tipitem("Buscar");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->item->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->item->getArrayAll());
        $data["paginate"]=$this->paginate($this->item->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("item",5);
        $data["Variable_prop"]="ITEM";
        $data["iniciA"]=5;
        return view(self::ruta.'itemIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("descripcion"=>"","precio"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Item("ITEM_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["descripcion"]=$value->ITEM_Descripcion;
                $valor["precio"]=$value->ITEM_precio;
            }
        }

        $data["descripcion"]=$valor["descripcion"];
        $data["precio"]=$valor["precio"];
        $data["tipoItem"]=$this->search->select_TipoItem();


        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."itemAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->ITEM_Nombre;
        }
        $data["entidad"]="item";
        $data["name"]=$name;
        $data["id"]=$id;
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->item->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->item->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->item->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","%%","%%"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $itemV=new tb_item();
        $itemV->setITEM_CodigoInterno($request->input("ITEM_CodigoInterno")==null?0:$request->input("ITEM_CodigoInterno"));
        $itemV->setITEM_descripcion($request->input("ITEM_Descripcion")==null?0:$request->input("ITEM_Descripcion"));
        $itemV->setITEM_precio($request->input("ITEM_Precio")==null?0:$request->input("ITEM_Precio"));
        $itemV->setITEM_Estado($request->input("ITEM_Estado")==null?0:$request->input("ITEM_Estado"));
        $itemV->setTIPIT_CodigoInterno($request->input("TIPIT_CodigoInterno")==null?0:$request->input("TIPIT_CodigoInterno"));

        return  $itemV->getArray();
    }

    public function loadData(Request $request){
        $ITEM_CodigoInterno=$request->input("ITEM_CodigoInterno")==null?"%%":$request->input("ITEM_CodigoInterno");
        $ITEM_descripcion=$request->input("ITEM_descripcion")==null?"%%":$request->input("ITEM_descripcion");
        $ITEM_precio=$request->input("ITEM_precio")==null?"%%":$request->input("ITEM_precio");
        $ITEM_Estado=$request->input("ITEM_Estado")==null?"%%":$request->input("ITEM_Estado");
        $TIPIT_CodigoInterno=$request->input("TIPIT_CodigoInterno")==null?"%%":$request->input("TIPIT_CodigoInterno");
        $values=array(
            ":ITEM_CodigoInterno"=>$ITEM_CodigoInterno,
            ":ITEM_descripcion"=>$ITEM_descripcion,
            ":ITEM_precio"=>$ITEM_precio,
            ":ITEM_Estado"=>$ITEM_Estado,
            ":TIPIT_CodigoInterno"=>$TIPIT_CodigoInterno,
        );
        return response()->json(['values'=>$values,'entidad'=>"item"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->item->getArrayAll():$request->input("values");
        $limit=$request->input("limit");
        $offset=$request->input("offset");

        $calculo= ($offset-1)*$limit;
        $html=$this->table($data,$limit,$calculo);
        $paginate=$this-> paginate($data,$offset,$limit);
        return response()->json(['table'=>$html,'paginate'=>$paginate,'Ver'=>$calculo,'prueba'=>$request->input("values")]);
    }

    public function table($busqueda=array("%%","%%","1"),$limit=5,$offset=0){
        $data=$this->procedure->search($busqueda,$limit,$offset);
        $html="";
            foreach ($data as $key => $d) {
                $html.='<div class="table-body">
                    <div class="table-row">
                            <div class="table-cell">'.(($key+1)+$offset).'</div>
                            <div class="table-cell tb_Codigo">'.$d->ITEM_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->ITEM_Descripcion.'</div>
                            <div class="table-cell tb_Codigo">'.$d->ITEM_precio.'</div>
                            <div class="table-cell tb_Codigo">'.$d->TIPIT_CodigoInterno.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->ITEM_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->ITEM_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->ITEM_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
