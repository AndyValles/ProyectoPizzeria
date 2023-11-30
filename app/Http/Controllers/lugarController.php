<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_lugar;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;
use Illuminate\Support\Facades\Route;

class lugarController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Lugar/";
    private $search;
    private $entidad="lugar";
    private $lugar;
    private $procedure;
    public function __construct(){
        $this->search=new  search();
        $this->lugar=new tb_lugar();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Lugar","PROCEDURE_SELECT_Lugar");
    }

    public function index(){
        $data=array();
        $data["data"] =  $this->table($this->lugar->getArrayAll());
        $data["entidad"] =  $this->entidad;
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["select_estado"] = $this->procedure->select_estado("Bus_LUG_Estado");
        $data["total"]=$this->procedure->pagination($this->lugar->getArrayAll());
        $data["paginate"]=$this->paginate($this->lugar->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate($this->entidad,5);
        $data["Variable_prop"]="LUG";
        $data["iniciA"]=5;
        return view(self::ruta.'lugarIndex',$data);
    }

    public function Agregar($id=""){
        $nombre="";
        if($id!=""){
            $marc_value=$this->search->search_Lugar("LUG_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $nombre=$value->LUG_Nombre;
            }
        }

        $data["nombre"]=$nombre;

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."lugarAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->LUG_Nombre;
        }
        $data["entidad"]="lugar";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Lugardelete(".$id.")";
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->lugar->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->lugar->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->lugar->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $lugarV=new tb_lugar();
        $lugarV->setCodigo($request->input("LUG_Codigo")==null?0:$request->input("LUG_Codigo"));
        $lugarV->setNombre($request->input("LUG_Nombre")==null?"":$request->input("LUG_Nombre"));
        $lugarV->setEstado($request->input("LUG_Estado")==null?"1":$request->input("LUG_Estado"));
        return  $lugarV->getArray();
    }

    public function loadData(Request $request){
        $LUG_Codigo=$request->input("LUG_Codigo")==null?"%%":$request->input("LUG_Codigo");
        $LUG_Nombre=$request->input("LUG_Nombre")==null?"%%":"%".$request->input("LUG_Nombre")."%";
        $LUG_Estado=$request->input("LUG_Estado")==null?"1":$this->procedure->ObtenerEstado($request->input("LUG_Estado"));
        $values=array(":LUG_Codigo"=>$LUG_Codigo,":LUG_Nombre"=>$LUG_Nombre,":LUG_Estado"=>$LUG_Estado);
        return response()->json(['values'=>$values,'entidad'=>"lugar"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->lugar->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->LUG_CodigoInterno.'</div>
                            <div class="table-cell tb_Nombre">'.$d->LUG_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->LUG_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->LUG_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->LUG_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
