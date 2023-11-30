<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_inventario;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class inventarioController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Inventario/";
    private $select;
    private $search;
    private $inventario;
    private $procedure;
    private $entidad="inventario";

    public function __construct(){
        $this->select=new Selects();
        $this->search=new  search();
        $this->inventario=new tb_inventario();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Inventario","PROCEDURE_SELECT_Inventario");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_INV_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->inventario->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->inventario->getArrayAll());
        $data["paginate"]=$this->paginate($this->inventario->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="INV";
        $data["iniciA"]=5;
        return view(self::ruta.'inventarioIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("stock"=>"","articulo"=>"","item"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Inventario("INV_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["stock"]=$value->INV_StockModificado;
                $valor["articulo"]=$value->ART_CodigoInterno;
                $valor["item"]=$value->ITEM_CodigoInterno;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }
        $data["articulo"]=$this->search->select_Articulo();
        $data["item"]=$this->search->select_Item();
        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."inventarioAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->INV_Nombre;
        }
        $data["entidad"]="inventario";
        $data["name"]=$name;
        $data["id"]=$id;
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->inventario->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->inventario->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->inventario->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $inventarioV=new tb_inventario();
        $inventarioV->setINV_CodigoInterno($request->input("INV_CodigoInterno")==null?0:$request->input("INV_CodigoInterno"));
        $inventarioV->setINV_FechaRegistro(date("Y-m-d H:i:s"));
        $inventarioV->setINV_StockModificado($request->input("INV_StockModificado")==null?1:$request->input("INV_StockModificado"));
        $inventarioV->setART_CodigoInterno($request->input("ART_CodigoInterno")==null?1:$request->input("ART_CodigoInterno"));
        $inventarioV->setITEM_CodigoInterno($request->input("ITEM_CodigoInterno")==null?1:$request->input("ITEM_CodigoInterno"));
        $inventarioV->setINV_Estado($request->input("INV_Estado")==null?0:$request->input("INV_Estado"));

        return  $inventarioV->getArray();
    }

    public function loadData(Request $request){
        $INV_CodigoInterno=$request->input("INV_CodigoInterno")==null?"%%":$request->input("INV_CodigoInterno");
        $INV_FechaRegistro=$request->input("INV_FechaRegistro")==null?"%%":$request->input("INV_FechaRegistro");
        $INV_StockModificado=$request->input("INV_StockModificado")==null?"%%":$request->input("INV_StockModificado");
        $ART_CodigoInterno=$request->input("ART_CodigoInterno")==null?"%%":$request->input("ART_CodigoInterno");
        $INV_Estado=$request->input("INV_Estado")==null?"%%":$request->input("INV_Estado");

        $values=array(
            ":INV_CodigoInterno"=>$INV_CodigoInterno,
            ":INV_FechaRegistro"=>$INV_FechaRegistro,
            ":INV_StockModificado"=>$INV_StockModificado,
            ":ART_CodigoInterno"=>$ART_CodigoInterno,
            ":INV_Estado"=>$INV_Estado,

        );
        return response()->json(['values'=>$values,'entidad'=>"inventario"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->inventario->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->INV_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->INV_FechaRegistro.'</div>
                            <div class="table-cell tb_Codigo">'.$d->INV_StockModificado.'</div>';
                            if($d->ITEM_CodigoInterno!=1){ '<div class="table-cell tb_Codigo">'.$d->ART_Nombre.'</div>';}
                            else{ '<div class="table-cell tb_Codigo">'.$d->ITEM_Descripcion.'</div>';}
                $html.=     '<div class="table-cell tb_Codigo">'.$d->INV_Estado.'</div>

                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->INV_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick='.$d->INV_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick='.$d->INV_CodigoInterno.' ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
