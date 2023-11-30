<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_inventariodetalle;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class inventariodetalleController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Inventariodetalle/";
    private $inventariodetalle;
    private $procedure;

    public function __construct(){
        $this->inventariodetalle=new tb_inventariodetalle();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Inventariodetalle","PROCEDURE_SELECT_Inventariodetalle");
    }

    public function index(){
        $data=array();
        $data["data"] =  $this->table();
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "odal_filter";
        $data["total"]=$this->procedure->pagination($this->inventariodetalle->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate("inventariodetalle",5);
        $data["Variable_prop"]="INVDET";
        $data["iniciA"]=5;
        return view(self::ruta.'inventariodetalleIndex',$data);
    }

    public function modal_create(){
        return view(self::ruta."inventariodetalleAgregar");
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->INVDET_Nombre;
        }
        $data["entidad"]="inventariodetalle";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Inventariodetalledelete(".$id.")";
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
        $inventariodetalleV=new tb_inventariodetalle();
        $inventariodetalleV->setINVDET_CodigoInterno($request->input("INVDET_CodigoInterno")==null?0:$request->input("INVDET_CodigoInterno"));
        $inventariodetalleV->setINVDET_FechaRegistro($request->input("INVDET_FechaRegistro")==null?0:$request->input("INVDET_FechaRegistro"));
        $inventariodetalleV->setINVDET_FechaModificacion($request->input("INVDET_FechaModificacion")==null?0:$request->input("INVDET_FechaModificacion"));
        $inventariodetalleV->setINVDET_StockIngreso($request->input("INVDET_StockIngreso")==null?0:$request->input("INVDET_StockIngreso"));
        $inventariodetalleV->setINVDET_StockModificado($request->input("INVDET_StockModificado")==null?0:$request->input("INVDET_StockModificado"));
        $inventariodetalleV->setINV_CodigoInterno($request->input("INV_CodigoInterno")==null?0:$request->input("INV_CodigoInterno"));

        return  $inventariodetalleV->getArray();
    }

    public function loadData(Request $request){
        $INVDET_CodigoInterno=$request->input("INVDET_CodigoInterno")==null?"%%":$request->input("INVDET_CodigoInterno");
        $INVDET_FechaRegistro=$request->input("INVDET_FechaRegistro")==null?"%%":$request->input("INVDET_FechaRegistro");
        $INVDET_FechaModificacion=$request->input("INVDET_FechaModificacion")==null?"%%":$request->input("INVDET_FechaModificacion");
        $INVDET_StockIngreso=$request->input("INVDET_StockIngreso")==null?"%%":$request->input("INVDET_StockIngreso");
        $INVDET_StockModificado=$request->input("INVDET_StockModificado")==null?"%%":$request->input("INVDET_StockModificado");
        $INV_CodigoInterno=$request->input("INV_CodigoInterno")==null?"%%":$request->input("INV_CodigoInterno");

        $values=array(
            ":INVDET_CodigoInterno"=>$INVDET_CodigoInterno,
            ":INVDET_FechaRegistro"=>$INVDET_FechaRegistro,
            ":INVDET_FechaModificacion"=>$INVDET_FechaModificacion,
            ":INVDET_StockIngreso"=>$INVDET_StockIngreso,
            ":INVDET_StockModificado"=>$INVDET_StockModificado,
            ":INV_CodigoInterno"=>$INV_CodigoInterno,
        );
        return response()->json(['values'=>$values,'entidad'=>"inventariodetalle"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->inventariodetalle->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->INVDET_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->INVDET_FechaRegistro.'</div>
                            <div class="table-cell tb_Codigo">'.$d->INVDET_FechaModificacion.'</div>
                            <div class="table-cell tb_Codigo">'.$d->INVDET_StockIngreso.'</div>
                            <div class="table-cell tb_Codigo">'.$d->INVDET_StockModificado.'</div>
                            <div class="table-cell tb_Codigo">'.$d->INV_CodigoInterno.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->INVDET_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->INVDET_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'modal_delete/".$d->INVDET_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->INVDET_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->INVDET_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_INVDET_Name'.$d->INVDET_CodigoInterno.'" value="'. $d->INVDET_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Inventariodetalleedit('.$d->INVDET_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->INVDET_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
