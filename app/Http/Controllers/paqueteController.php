<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_paquete;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class paqueteController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Paquete/";
    private $search;
    private $paquete;
    private $procedure;
    private $entidad="paquete";

    public function __construct(){
        $this->search=new  search();
        $this->paquete=new tb_paquete();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Paquete","PROCEDURE_SELECT_Paquete");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->paquete->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->paquete->getArrayAll());
        $data["paginate"]=$this->paginate($this->paquete->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("paquete",5);
        $data["Variable_prop"]="PAQ";
        $data["iniciA"]=5;
        return view(self::ruta.'paqueteIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array();
        if($id!=""){
            $marc_value=$this->search->search_Marca("MAR_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $nombre=$value->MAR_Nombre;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."paqueteAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->PAQ_Nombre;
        }
        $data["entidad"]="paquete";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Paquetedelete(".$id.")";
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
        return response()->json(['table'=> $this->table()]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $paqueteV=new tb_paquete();
        $paqueteV->setPAQ_CodigoInterno($request->input("PAQ_CodigoInterno")==null?0:$request->input("PAQ_CodigoInterno"));
        $paqueteV->setPAQ_Nombre($request->input("PAQ_Nombre")==null?0:$request->input("PAQ_Nombre"));
        $paqueteV->setPAQ_FechaRegistro($request->input("PAQ_FechaRegistro")==null?0:$request->input("PAQ_FechaRegistro"));
        $paqueteV->setPAQ_Estado($request->input("PAQ_Estado")==null?0:$request->input("PAQ_Estado"));
        return  $paqueteV->getArray();
    }

    public function loadData(Request $request){
        $PAQ_CodigoInterno=$request->input("PAQ_CodigoInterno")==null?"%%":$request->input("PAQ_CodigoInterno");
        $PAQ_Nombre=$request->input("PAQ_Nombre")==null?"%%":$request->input("PAQ_Nombre");
        $PAQ_FechaRegistro=$request->input("PAQ_FechaRegistro")==null?"%%":$request->input("PAQ_FechaRegistro");
        $PAQ_Estado=$request->input("PAQ_Estado")==null?"%%":$request->input("PAQ_Estado");

        $values=array(
            ":PAQ_CodigoInterno"=>$PAQ_CodigoInterno,
            ":PAQ_Nombre"=>$PAQ_Nombre,
            ":PAQ_FechaRegistro"=>$PAQ_FechaRegistro,
            ":PAQ_Estado"=>$PAQ_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"paquete"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->paquete->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->PAQ_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQ_Nombre.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQ_FechaRegistro.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQ_Estado.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->PAQ_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->PAQ_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'modal_delete/".$d->PAQ_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->PAQ_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->PAQ_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_PAQ_Name'.$d->PAQ_CodigoInterno.'" value="'. $d->PAQ_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Paqueteedit('.$d->PAQ_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->PAQ_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
