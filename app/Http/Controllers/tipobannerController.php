<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_tipobanner;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class tipobannerController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Tipobanner/";
    private $search;
    private $tipobanner;
    private $procedure;
    private $entidad="tipobanner";

    public function __construct(){
        $this->search=new  search();
        $this->tipobanner=new tb_tipobanner();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Tipobanner","PROCEDURE_SELECT_Tipobanner");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_TIPBAN_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table();
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->tipobanner->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate("tipobanner",5);
        $data["Variable_prop"]="TIPBAN";
        $data["iniciA"]=5;
        return view(self::ruta.'tipobannerIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("nombre"=>"");
        if($id!=""){
            $marc_value=$this->search->search_TipoBanner("TIPBAN_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->TIPBAN_Nombre;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }
        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."tipobannerAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->TIPBAN_Nombre;
        }
        $data["entidad"]="tipobanner";
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
        $tipobannerV=new tb_tipobanner();
        $tipobannerV->setTIPBAN_CodigoInterno($request->input("TIPBAN_CodigoInterno")==null?0:$request->input("TIPBAN_CodigoInterno"));
        $tipobannerV->setTIPBAN_Nombre($request->input("TIPBAN_Nombre")==null?"":$request->input("TIPBAN_Nombre"));
        $tipobannerV->setTIPBAN_Html($request->input("TIPBAN_Html")==null?"":$request->input("TIPBAN_Html"));
        $tipobannerV->setTIPBAN_Cantidad($request->input("TIPBAN_Cantidad")==null?"":$request->input("TIPBAN_Cantidad"));
        $tipobannerV->setTIPBAN_Estado($request->input("TIPBAN_Estado")==null?"1":$request->input("TIPBAN_Estado"));
        return  $tipobannerV->getArray();
    }

    public function loadData(Request $request){
        $TIPBAN_CodigoInterno=$request->input("TIPBAN_CodigoInterno")==null?"%%":$request->input("TIPBAN_CodigoInterno");
        $TIPBAN_Nombre=$request->input("TIPBAN_Nombre")==null?"%%":"%".$request->input("TIPBAN_Nombre")."%";
        $TIPBAN_Estado=$request->input("TIPBAN_Estado")==null?"1":$request->input("TIPBAN_Estado");
        $values=array(":TIPBAN_CodigoInterno"=>$TIPBAN_CodigoInterno,":TIPBAN_Nombre"=>$TIPBAN_Nombre,":TIPBAN_Estado"=>$TIPBAN_Estado);
        return response()->json(['values'=>$values,'entidad'=>"tipobanner"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->tipobanner->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->TIPBAN_CodigoInterno.'</div>
                            <div class="table-cell tb_Nombre">'.$d->TIPBAN_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->TIPBAN_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->TIPBAN_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->TIPBAN_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
