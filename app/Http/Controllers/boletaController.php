<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_boleta;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class boletaController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Boleta/";
    private $boleta;
    private $procedure;
    private $entidad="boleta";

    public function __construct(){
        $this->boleta=new tb_boleta();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Boleta","PROCEDURE_SELECT_Boleta");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->boleta->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->boleta->getArrayAll());
        $data["paginate"]=$this->paginate($this->boleta->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="BOL";
        $data["iniciA"]=5;
        return view(self::ruta.'boletaIndex',$data);
    }

    public function Agregar(){
        return view(self::ruta."boletaAgregar");
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->BOL_Nombre;
        }
        $data["entidad"]="boleta";
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
        $htm=$this->procedure->Paginate("boleta",$pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $boletaV=new tb_boleta();
        $boletaV->setBOL_CodigoInterno($request->input("BOL_CodigoInterno")==null?0:$request->input("BOL_CodigoInterno"));
        $boletaV->setBOL_Numero($request->input("BOL_Numero")==null?0:$request->input("BOL_Numero"));
        $boletaV->setBOL_Serie($request->input("BOL_Serie")==null?0:$request->input("BOL_Serie"));
        $boletaV->setBOL_FechaRegistro($request->input("BOL_FechaRegistro")==null?0:$request->input("BOL_FechaRegistro"));
        $boletaV->setBOL_Total($request->input("BOL_Total")==null?0:$request->input("BOL_Total"));
        $boletaV->setPED_CodigoInterno($request->input("PED_CodigoInterno")==null?0:$request->input("PED_CodigoInterno"));

        return  $boletaV->getArray();
    }

    public function loadData(Request $request){
        $BOL_CodigoInterno=$request->input("BOL_CodigoInterno")==null?"%%":$request->input("BOL_CodigoInterno");
        $BOL_Numero=$request->input("BOL_Numero")==null?"%%":$request->input("BOL_Numero");
        $BOL_Serie=$request->input("BOL_Serie")==null?"%%":$request->input("BOL_Serie");
        $BOL_FechaRegistro=$request->input("BOL_FechaRegistro")==null?"%%":$request->input("BOL_FechaRegistro");
        $BOL_Total=$request->input("BOL_Total")==null?"%%":$request->input("BOL_Total");
        $PED_CodigoInterno=$request->input("PED_CodigoInterno")==null?"%%":$request->input("PED_CodigoInterno");

        $values=array(
            ":BOL_CodigoInterno"=>$BOL_CodigoInterno,
            ":BOL_Numero"=>$BOL_Numero,
            ":BOL_Serie"=>$BOL_Serie,
            ":BOL_FechaRegistro"=>$BOL_FechaRegistro,
            ":BOL_Total"=>$BOL_Total,
            ":PED_CodigoInterno"=>$PED_CodigoInterno,

        );
        return response()->json(['values'=>$values,'entidad'=>"boleta"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->boleta->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->BOL_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->BOL_Numero.'</div>
                            <div class="table-cell tb_Codigo">'.$d->BOL_Serie.'</div>
                            <div class="table-cell tb_Codigo">'.$d->BOL_FechaRegistro.'</div>
                            <div class="table-cell tb_Codigo">'.$d->BOL_Total.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PED_CodigoInterno.'</div>

                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->BOL_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->BOL_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'modal_delete/".$d->BOL_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->BOL_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->BOL_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_BOL_Name'.$d->BOL_CodigoInterno.'" value="'. $d->BOL_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Boletaedit('.$d->BOL_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->BOL_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
