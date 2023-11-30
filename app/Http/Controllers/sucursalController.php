<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_sucursal;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class sucursalController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Sucursal/";
    private $busqueda;
    private $search;
    private $sucursal;
    private $procedure;
    private $entidad="sucursal";

    public function __construct(){
        $this->busqueda=new Selects();
        $this->search=new  search();
        $this->sucursal=new tb_sucursal();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Sucursal","PROCEDURE_SELECT_Sucursal");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->sucursal->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["distrito"]=$this->busqueda->select_distrito("Index");
        $data["total"]=$this->procedure->pagination($this->sucursal->getArrayAll());
        $data["paginate"]=$this->paginate($this->sucursal->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("sucursal",5);
        $data["Variable_prop"]="SUC";
        $data["iniciA"]=5;
        return view(self::ruta.'sucursalIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array( "referencia"=>"", "direccion"=>"",
                    "horasatencion"=>"00:00 a.m. a 00:00 p.m.",
                    "telefono"=>"",
                    "url"=>"");

        if($id!=""){
            $marc_value=$this->search->search_sucursal("SUC_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["referencia"]=$value->SUC_Referencia;
                $valor["direccion"]=$value->SUC_Direccion;
                $valor["horasatencion"]=$value->SUC_HorasAtencion;
                $valor["telefono"]=$value->SUC_Telefono;
                $valor["url"]=$value->SUC_URL;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }
        $data["horapp"]=$valor["horasatencion"];


        $data["distrito"]=$this->search->select_distrito();

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."sucursalAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->SUC_Nombre;
        }
        $data["entidad"]=$this->entidad();
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Sucursaldelete(".$id.")";
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->sucursal->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->sucursal->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->sucursal->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $sucursalV=new tb_sucursal();
        $sucursalV->setSUC_CodigoInterno($request->input("SUC_CodigoInterno")==null?0:$request->input("SUC_CodigoInterno"));
        $sucursalV->setDIS_CodigoInterno($request->input("DIS_CodigoInterno")==null?0:$request->input("DIS_CodigoInterno"));
        $sucursalV->setSUC_Referencia($request->input("SUC_Referencia")==null?0:$request->input("SUC_Referencia"));
        $sucursalV->setSUC_Direccion($request->input("SUC_Direccion")==null?0:$request->input("SUC_Direccion"));
        $sucursalV->setSUC_HorasAtencion($request->input("SUC_HorasAtencion")==null?0:$request->input("SUC_HorasAtencion"));
        $sucursalV->setSUC_Telefono($request->input("SUC_Telefono")==null?0:$request->input("SUC_Telefono"));
        $sucursalV->setSUC_URL($request->input("SUC_URL")==null?0:$request->input("SUC_URL"));
        $sucursalV->setSUC_Estado($request->input("SUC_Estado")==null?0:$request->input("SUC_Estado"));

        return  $sucursalV->getArray();
    }

    public function loadData(Request $request){
        $SUC_CodigoInterno=$request->input("SUC_CodigoInterno")==null?"%%":$request->input("SUC_CodigoInterno");
        $DIS_CodigoInterno=$request->input("DIS_CodigoInterno")==null?"%%":$request->input("DIS_CodigoInterno");
        $SUC_Referencia=$request->input("SUC_Referencia")==null?"%%":$request->input("SUC_Referencia");
        $SUC_HorasAtencion=$request->input("SUC_HorasAtencion")==null?"%%":$request->input("SUC_DeliveryHorasAtencion");
        $SUC_Estado=$request->input("SUC_Estado")==null?"%%":$request->input("SUC_Estado");

        $values=array(
            ":SUC_CodigoInterno"=>$SUC_CodigoInterno,
            ":DIS_CodigoInterno"=>$DIS_CodigoInterno,
            ":SUC_Referencia"=>$SUC_Referencia,
            ":SUC_HorasAtencion"=>$SUC_HorasAtencion,
            ":SUC_Estado"=>$SUC_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"sucursal"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->sucursal->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->SUC_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->SUC_Referencia.'</div>
                            <div class="table-cell tb_Codigo">'.$d->SUC_Direccion.'</div>
                            <div class="table-cell tb_Codigo">'.$d->SUC_HorasAtencion.'</div>
                            <div class="table-cell tb_Codigo">'.$d->SUC_Telefono.'</div>
                            <div class="table-cell tb_Codigo">'.$d->SUC_Estado.'</div>

                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->SUC_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->SUC_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->SUC_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
