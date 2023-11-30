<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_ubicacion;
use App\Models\Procedure\Buscar\Busqueda;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class ubicacionController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Ubicacion/";
    private $busqueda;
    private $search;
    private $ubicacion;
    private $procedure;
    private $entidad="ubicacion";

    public function __construct(){
        $this->busqueda=new Selects();
        $this->search=new  search();
        $this->ubicacion=new tb_ubicacion();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Ubicacion","PROCEDURE_SELECT_Ubicacion");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->ubicacion->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["lugar"]=$this->busqueda->select_lugar("Index");
        $data["provincia"]=$this->busqueda->select_provincia("Index");
        $data["distrito"]=$this->busqueda->select_distrito("Index");
        $data["total"]=$this->procedure->pagination($this->ubicacion->getArrayAll());
        $data["paginate"]=$this->paginate($this->ubicacion->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("ubicacion",5);
        $data["Variable_prop"]="UBI";
        $data["iniciA"]=5;
        return view(self::ruta.'ubicacionIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("direccion"=>"", "calle"=>"", "numero"=>"", "referencia"=>"", "usuario"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Ubicacion("UBI_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["direccion"]=$value->UBI_Direccion;
                $valor["calle"]=$value->UBI_Calle;
                $valor["numero"]=$value->UBI_Numero;
                $valor["referencia"]=$value->UBI_Referencia;
                $valor["usuario"]=$value->USU_CodigoInterno;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }

        $data["lugar"]=$this->busqueda->select_lugar("Agregar");
        $data["provincia"]=$this->busqueda->select_provincia("Agregar");
        $data["distrito"]=$this->busqueda->select_distrito("Agregar");

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."ubicacionAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->UBI_Nombre;
        }
        $data["entidad"]="ubicacion";
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
        return response()->json(['table'=> $this->table()]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $ubicacionV=new tb_ubicacion();
        $ubicacionV->setUBI_CodigoInterno($request->input("UBI_CodigoInterno")==null?0:$request->input("UBI_CodigoInterno"));
        $ubicacionV->setLUG_CodigoInterno($request->input("LUG_CodigoInterno")==null?0:$request->input("LUG_CodigoInterno"));
        $ubicacionV->setPROV_CodigoInterno($request->input("PROV_CodigoInterno")==null?0:$request->input("PROV_CodigoInterno"));
        $ubicacionV->setDIS_CodigoInterno($request->input("DIS_CodigoInterno")==null?0:$request->input("DIS_CodigoInterno"));
        $ubicacionV->setUBI_Direccion($request->input("UBI_Direccion")==null?0:$request->input("UBI_Direccion"));
        $ubicacionV->setUBI_Calle($request->input("UBI_Calle")==null?0:$request->input("UBI_Calle"));
        $ubicacionV->setUBI_Numero($request->input("UBI_Numero")==null?0:$request->input("UBI_Numero"));
        $ubicacionV->setUBI_Referencia($request->input("UBI_Referencia")==null?0:$request->input("UBI_Referencia"));
        $ubicacionV->setUBI_Estado($request->input("UBI_Estado")==null?0:$request->input("UBI_Estado"));

        return  $ubicacionV->getArray();
    }

    public function loadData(Request $request){
        $UBI_CodigoInterno=$request->input("UBI_CodigoInterno")==null?"%%":$request->input("UBI_CodigoInterno");
        $LUG_CodigoInterno=$request->input("LUG_CodigoInterno")==null?"%%":$request->input("LUG_CodigoInterno");
        $PROV_CodigoInterno=$request->input("PROV_CodigoInterno")==null?"%%":$request->input("PROV_CodigoInterno");
        $DIS_CodigoInterno=$request->input("DIS_CodigoInterno")==null?"%%":$request->input("DIS_CodigoInterno");
        $UBI_Direccion=$request->input("UBI_Direccion")==null?"%%":$request->input("UBI_Direccion");
        $UBI_Calle=$request->input("UBI_Calle")==null?"%%":$request->input("UBI_Calle");
        $UBI_Numero=$request->input("UBI_Numero")==null?"%%":$request->input("UBI_Numero");
        $UBI_Referencia=$request->input("UBI_Referencia")==null?"%%":$request->input("UBI_Referencia");
        $UBI_Estado=$request->input("UBI_Estado")==null?"%%":$request->input("UBI_Estado");
        $values=array(
            ":UBI_CodigoInterno"=>$UBI_CodigoInterno,
            ":LUG_CodigoInterno"=>$LUG_CodigoInterno,
            ":PROV_CodigoInterno"=>$PROV_CodigoInterno,
            ":DIS_CodigoInterno"=>$DIS_CodigoInterno,
            ":UBI_Direccion"=>$UBI_Direccion,
            ":UBI_Calle"=>$UBI_Calle,
            ":UBI_Numero"=>$UBI_Numero,
            ":UBI_Referencia"=>$UBI_Referencia,
            ":UBI_Estado"=>$UBI_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"ubicacion"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->ubicacion->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->UBI_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->LUG_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PROV_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->DIS_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->UBI_Direccion.'</div>
                            <div class="table-cell tb_Codigo">'.$d->UBI_Calle.'</div>
                            <div class="table-cell tb_Codigo">'.$d->UBI_Numero.'</div>
                            <div class="table-cell tb_Codigo">'.$d->UBI_Referencia.'</div>
                            <div class="table-cell tb_Codigo">'.$d->UBI_Estado.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->UBI_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->UBI_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'modal_delete/".$d->UBI_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->UBI_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->UBI_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_UBI_Name'.$d->UBI_CodigoInterno.'" value="'. $d->UBI_Direccion.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Ubicacionedit('.$d->UBI_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->UBI_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
