<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_pedidodetalle;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class pedidodetalleController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Pedidodetalle/";
    private $pedidodetalle;
    private $procedure;

    public function __construct(){
        $this->pedidodetalle=new tb_pedidodetalle();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Pedidodetalle","PROCEDURE_SELECT_Pedidodetalle");
    }

    public function index(){
        $data=array();
        $data["data"] =  $this->table();
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->pedidodetalle->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate("pedidodetalle",5);
        $data["Variable_prop"]="PEDDET";
        $data["iniciA"]=5;
        return view(self::ruta.'pedidodetalleIndex',$data);
    }

    public function modal_create(){
        return view(self::ruta."pedidodetalleAgregar");
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->PEDDET_Nombre;
        }
        $data["entidad"]="pedidodetalle";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Pedidodetalledelete(".$id.")";
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
        $htm=$this->procedure->Paginate("pedidodetalle",$pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $pedidodetalleV=new tb_pedidodetalle();
        $pedidodetalleV->setPEDDET_CodigoInterno($request->input("PEDDET_CodigoInterno")==null?0:$request->input("PEDDET_CodigoInterno"));
        $pedidodetalleV->setPED_CodigoInterno($request->input("PED_CodigoInterno")==null?0:$request->input("PED_CodigoInterno"));
        $pedidodetalleV->setPAQ_CodigoInterno($request->input("PAQ_CodigoInterno")==null?0:$request->input("PAQ_CodigoInterno"));
        $pedidodetalleV->setART_CodigoInterno($request->input("ART_CodigoInterno")==null?0:$request->input("ART_CodigoInterno"));
        $pedidodetalleV->setPEDDET_Cantidad($request->input("PEDDET_Cantidad")==null?0:$request->input("PEDDET_Cantidad"));

        return  $pedidodetalleV->getArray();
    }

    public function loadData(Request $request){
        $PEDDET_CodigoInterno=$request->input("PEDDET_CodigoInterno")==null?"%%":$request->input("PEDDET_CodigoInterno");
        $PED_CodigoInterno=$request->input("PED_CodigoInterno")==null?"%%":$request->input("PED_CodigoInterno");
        $PAQ_CodigoInterno=$request->input("PAQ_CodigoInterno")==null?"%%":$request->input("PAQ_CodigoInterno");
        $ART_CodigoInterno=$request->input("ART_CodigoInterno")==null?"%%":$request->input("ART_CodigoInterno");
        $PEDDET_Cantidad=$request->input("PEDDET_Cantidad")==null?"%%":$request->input("PEDDET_Cantidad");

        $values=array(
            ":PEDDET_CodigoInterno"=>$PEDDET_CodigoInterno,
            ":PED_CodigoInterno"=>$PED_CodigoInterno,
            ":PAQ_CodigoInterno"=>$PAQ_CodigoInterno,
            ":ART_CodigoInterno"=>$ART_CodigoInterno,
            ":PEDDET_Cantidad"=>$PEDDET_Cantidad,

        );
        return response()->json(['values'=>$values,'entidad'=>"pedidodetalle"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->pedidodetalle->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->PEDDET_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PED_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQ_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->ART_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PEDDET_Cantidad.'</div>

                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->PEDDET_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->PEDDET_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'/pedidodetalle/modal_delete/".$d->PEDDET_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->PEDDET_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->PEDDET_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_PEDDET_Name'.$d->PEDDET_CodigoInterno.'" value="'. $d->PEDDET_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Pedidodetalleedit('.$d->PEDDET_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->PEDDET_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
