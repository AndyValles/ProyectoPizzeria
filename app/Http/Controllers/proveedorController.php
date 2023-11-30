<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_proveedor;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class proveedorController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Proveedor/";
    private $search;

    private $proveedor;
    private $procedure;
    private $entidad="proveedor";

    public function __construct(){
        $this->search=new  search();
        $this->proveedor=new tb_proveedor();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Proveedor","PROCEDURE_SELECT_Proveedor");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->proveedor->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->proveedor->getArrayAll());
        $data["paginate"]=$this->paginate($this->proveedor->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("proveedor",5);
        $data["Variable_prop"]="PROV";
        $data["iniciA"]=5;
        return view(self::ruta.'proveedorIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("nombre"=>"","identificador"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Proveedor("PROV_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->PROV_Nombre;
                $valor["identificador"]=$value->PROV_Identificador;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."proveedorAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->PROV_Nombre;
        }
        $data["entidad"]="proveedor";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Proveedordelete(".$id.")";
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->proveedor->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->proveedor->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->proveedor->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $proveedorV=new tb_proveedor();
        $proveedorV->setPROV_Codigo($request->input("PROV_CodigoInterno")==null?0:$request->input("PROV_CodigoInterno"));
        $proveedorV->setPROV_Nombre($request->input("PROV_Nombre")==null?0:$request->input("PROV_Nombre"));
        $proveedorV->setPROV_Identificador($request->input("PROV_Identificador")==null?0:$request->input("PROV_Identificador"));
        $proveedorV->setPROV_FechaRegistro(date("Y-m-d H:i:s"));
        $proveedorV->setPROV_Estado($request->input("PROV_Estado")==null?0:$request->input("PROV_Estado"));
        return  $proveedorV->getArray();
    }

    public function loadData(Request $request){
        $PROV_CodigoInterno=$request->input("PROV_CodigoInterno")==null?"%%":$request->input("PROV_CodigoInterno");
        $PROV_Nombre=$request->input("PROV_Nombre")==null?"%%":$request->input("PROV_Nombre");
        $PROV_Identificador=$request->input("PROV_Identificador")==null?"%%":$request->input("PROV_Identificador");
        $PROV_FechaRegistro=$request->input("PROV_FechaRegistro")==null?"%%":$request->input("PROV_FechaRegistro");
        $PROV_Estado=$request->input("PROV_Estado")==null?"%%":$request->input("PROV_Estado");

        $values=array(
            ":PROV_CodigoInterno"=>$PROV_CodigoInterno,
            ":PROV_Nombre"=>$PROV_Nombre,
            ":PROV_Identificador"=>$PROV_Identificador,
            ":PROV_FechaRegistro"=>$PROV_FechaRegistro,
            ":PROV_Estado"=>$PROV_Estado,

        );
        return response()->json(['values'=>$values,'entidad'=>"proveedor"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->proveedor->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->PROV_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PROV_Nombre.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PROV_FechaRegistro.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PROV_Estado.'</div>

                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->PROV_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->PROV_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'modal_delete/".$d->PROV_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->PROV_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->PROV_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_PROV_Name'.$d->PROV_CodigoInterno.'" value="'. $d->PROV_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Proveedoredit('.$d->PROV_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->PROV_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
