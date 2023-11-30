<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_formapago;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class formapagoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Formapago/";
    private $search;
    private $formapago;
    private $procedure;
    private $entidad="formapago";

    public function __construct(){
        $this->search=new search();
        $this->formapago=new tb_formapago();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Formapago","PROCEDURE_SELECT_Formapago");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->formapago->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->formapago->getArrayAll());
        $data["paginate"]=$this->paginate($this->formapago->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("formapago",5);
        $data["Variable_prop"]="FORM";
        $data["iniciA"]=5;
        return view(self::ruta.'formapagoIndex',$data);
    }

    public function modal_create($id=""){
        $valor=array("nombre"=>"","identificador"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Formapago("FORM_CodigoInternoa",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->FORM_Nombre;
                $valor["identificador"]=$value->FORM_Identificador;
            }
        }

        $data["nombre"]=$valor["nombre"];
        $data["identificador"]=$valor["identificador"];

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."formapagoAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->FORM_Nombre;
        }
        $data["entidad"]="formapago";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Formapagodelete(".$id.")";
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
        $formapagoV=new tb_formapago();
        $formapagoV->setFORM_CodigoInterno($request->input("FORM_CodigoInterno")==null?0:$request->input("FORM_CodigoInterno"));
        $formapagoV->setFORM_Nombre($request->input("FORM_Nombre")==null?0:$request->input("FORM_Nombre"));
        $formapagoV->setFORM_Identificador($request->input("FORM_Identificador")==null?0:$request->input("FORM_Identificador"));
        $formapagoV->setFORM_Estado($request->input("FORM_Estado")==null?0:$request->input("FORM_Estado"));

        return  $formapagoV->getArray();
    }

    public function loadData(Request $request){
        $FORM_CodigoInterno=$request->input("FORM_CodigoInterno")==null?"%%":$request->input("FORM_CodigoInterno");
        $FORM_Nombre=$request->input("FORM_Nombre")==null?"%%":$request->input("FORM_Nombre");
        $FORM_Identificador=$request->input("FORM_Identificador")==null?"%%":$request->input("FORM_Identificador");
        $FORM_Estado=$request->input("FORM_Estado")==null?"%%":$request->input("FORM_Estado");

        $values=array(
            ":FORM_CodigoInterno"=>$FORM_CodigoInterno,
            ":FORM_Nombre"=>$FORM_Nombre,
            ":FORM_Identificador"=>$FORM_Identificador,
            ":FORM_Estado"=>$FORM_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"formapago"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->formapago->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->FORM_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->FORM_Nombre.'</div>
                            <div class="table-cell tb_Codigo">'.$d->FORM_Identificador.'</div>
                            <div class="table-cell tb_Codigo">'.$d->FORM_Estado.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->FORM_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->FORM_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'modal_delete/".$d->FORM_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->FORM_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->FORM_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_FORM_Name'.$d->FORM_CodigoInterno.'" value="'. $d->FORM_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Formapagoedit('.$d->FORM_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->FORM_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
