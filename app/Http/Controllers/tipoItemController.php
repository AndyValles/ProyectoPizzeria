<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_tipoitem;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class tipoitemController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Tipoitem/";
    private $search;
    private $tipoitem;
    private $entidad="tipoitem";
    private $procedure;

    public function __construct(){
        $this->search=new  search();
        $this->tipoitem=new tb_tipoitem();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Tipoitem","PROCEDURE_SELECT_Tipoitem");
    }

    public function index(){
        $data=array();
        $data["data"] =  $this->table();
        $data["select_estado"] = $this->procedure->select_estado("Bus_TIPIT_Estado");
        $data["entidad"] =  $this->entidad;
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->tipoitem->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="TIPIT";
        $data["iniciA"]=5;
        return view(self::ruta.'tipoitemIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("nombre"=>"","importancia"=>1,"Seleccion"=>1);
        if($id!=""){
            $marc_value=$this->search->search_TipoItem("TIPIT_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->TIPIT_Nombre;
                $valor["importancia"]=$value->TIPIT_Importancia;
                $valor["Seleccion"]=$value->TIPIT_seleccion;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."tipoitemAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->TIPIT_Nombre;
        }
        $data["entidad"]=$this->entidad;
        $data["name"]=$name;
        $data["id"]=$id;
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table()]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table()]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->valuesStore($request)]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $tipoitemV=new tb_tipoitem();
        $tipoitemV->setTIPIT_CodigoInterno($request->input("TIPIT_CodigoInterno")==null?0:$request->input("TIPIT_CodigoInterno"));
        $tipoitemV->setTIPIT_Nombre($request->input("TIPIT_Nombre")==null?"":$request->input("TIPIT_Nombre"));
        $tipoitemV->setTIPIT_Importancia($request->input("TIPIT_Importancia")==null?"":$request->input("TIPIT_Importancia"));
        $tipoitemV->setTIPIT_Seleccion($request->input("TIPIT_Seleccion")==null?"":$request->input("TIPIT_Seleccion"));
        $tipoitemV->setTIPIT_Estado($request->input("TIPIT_Estado")==null?"1":$request->input("TIPIT_Estado"));
        return  $tipoitemV->getArray();
    }

    public function loadData(Request $request){
        $TIPIT_CodigoInterno=$request->input("TIPIT_CodigoInterno")==null?"%%":$request->input("TIPIT_CodigoInterno");
        $TIPIT_Nombre=$request->input("TIPIT_Nombre")==null?"%%":"%".$request->input("TIPIT_Nombre")."%";
        $TIPIT_Estado=$request->input("TIPIT_Estado")==null?"1":$this->procedure->ObtenerEstado($request->input("TIPIT_Estado"));
        $values=array(":TIPIT_CodigoInterno"=>$TIPIT_CodigoInterno,":TIPIT_Nombre"=>$TIPIT_Nombre,":TIPIT_Estado"=>$TIPIT_Estado);
        return response()->json(['values'=>$values,'entidad'=>"tipoitem"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->tipoitem->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->TIPIT_CodigoInterno.'</div>
                            <div class="table-cell tb_Nombre">'.$d->TIPIT_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->TIPIT_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->TIPIT_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option  btn-close-modal" data-id='.$d->TIPIT_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
