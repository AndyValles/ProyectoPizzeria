<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_tipoarticulo;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class tipoarticuloController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/TipoArticulo/";
    private $search;
    private $item;
    private $tipoarticulo;
    private $procedure;
    private $entidad="tipoarticulo";

    public function __construct(){
        $this->search=new  search();
        $this->item=new Selects();
        $this->tipoarticulo=new tb_tipoarticulo();
        $this->procedure=new Procedure("PROCEDURE_CRUD_TipoArticulo","PROCEDURE_SELECT_TipoArticulo");
    }

    public function index(){

        $data=array();

        $data["item"]=$this->item->select_item("Index");
        $data["entidad"]=$this->entidad;
        $data["select_estado"] = $this->procedure->select_estado("Bus_TIPART_Estado");
        $data["data"] =  $this->table($this->tipoarticulo->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->tipoarticulo->getArrayAll());
        $data["paginate"]=$this->paginate($this->tipoarticulo->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("tipoarticulo",5);
        $data["Variable_prop"]="TIPART";
        $data["iniciA"]=5;
        return view(self::ruta.'tipoarticuloIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("nombre"=>"");
        if($id!=""){
            $marc_value=$this->search->search_TipoArticulo("TIPART_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->TIPART_Nombre;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."tipoarticuloAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->TIPART_Nombre;
        }
        $data["name"]=$name;
        $data["id"]=$id;

        $data["Eventname"]="Tipoarticulodelete(".$id.")";
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->tipoarticulo->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->tipoarticulo->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->tipoarticulo->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","%%","%%"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $tipoarticuloV=new tb_tipoarticulo();
        $tipoarticuloV->setTIPART_Codigo($request->input("TIPART_Codigo")==null?0:$request->input("TIPART_Codigo"));
        $tipoarticuloV->setTIPART_Nombre($request->input("TIPART_Nombre")==null?"":$request->input("TIPART_Nombre"));
        $tipoarticuloV->setTIPART_Estado($request->input("TIPART_Estado")==null?"1":$request->input("TIPART_Estado"));
        return  $tipoarticuloV->getArray();
    }

    public function loadData(Request $request){
        $TIPART_Codigo=$request->input("TIPART_Codigo")==null?"%%":$request->input("TIPART_Codigo");
        $TIPART_Nombre=$request->input("TIPART_Nombre")==null?"%%":"%".$request->input("TIPART_Nombre")."%";
        $TIPART_Estado=$request->input("TIPART_Estado")==null?"1":$this->procedure->ObtenerEstado   ($request->input("TIPART_Estado"));
        $values=array(
            ":TIPART_Codigo"=>$TIPART_Codigo,
            ":TIPART_Nombre"=>$TIPART_Nombre,
            ":TIPART_Estado"=>$TIPART_Estado);
        return response()->json(['values'=>$values,'entidad'=>"tipoarticulo"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->tipoarticulo->getArrayAll():$request->input("values");
        $limit=$request->input("limit");
        $offset=$request->input("offset");

        $calculo= ($offset-1)*$limit;
        $html=$this->table($data,$limit,$calculo);
        $paginate=$this-> paginate($data,$offset,$limit);
        return response()->json(['table'=>$html,'paginate'=>$paginate,'Ver'=>$calculo,'prueba'=>$request->input("values")]);
    }

    public function table($busqueda=array("%%","%%","%%","1"),$limit=5,$offset=0){
        $data=$this->procedure->search($busqueda,$limit,$offset);
        $html="";
            foreach ($data as $key => $d) {
                $html.='<div class="table-body">
                    <div class="table-row">
                            <div class="table-cell">'.(($key+1)+$offset).'</div>
                            <div class="table-cell tb_Codigo">'.$d->TIPART_CodigoInterno.'</div>
                            <div class="table-cell tb_Nombre">'.$d->TIPART_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->TIPART_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->TIPART_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->TIPART_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>

                    </div>';
            }
        return $html;
    }
}

?>
