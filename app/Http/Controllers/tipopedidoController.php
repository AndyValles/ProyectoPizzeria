<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_tipopedido;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class tipopedidoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/TipoPedido/";
    private $search;
    private $tipopedido;
    private $procedure;
    private $entidad="tipopedido";

    public function __construct(){
        $this->search=new  search();
        $this->tipopedido=new tb_tipopedido();
        $this->procedure=new Procedure("PROCEDURE_CRUD_TipoPedido","PROCEDURE_SELECT_TipoPedido");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_TIPPED_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table();
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->tipopedido->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate("tipopedido",5);
        $data["Variable_prop"]="TIPPED";
        $data["iniciA"]=5;
        return view(self::ruta.'tipopedidoIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("nombre"=>"");
        if($id!=""){
            $marc_value=$this->search->search_TipoPedido("TIPPED_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->TIPPED_Nombre;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }
        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."tipopedidoAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->TIPPED_Nombre;
        }
        $data["entidad"]="tipopedido";
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

    public function paginate($busqueda=array("%%","%%","%%"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $tipopedidoV=new tb_tipopedido();
        $tipopedidoV->setTIPPED_Codigo($request->input("TIPPED_Codigo")==null?0:$request->input("TIPPED_Codigo"));
        $tipopedidoV->setTIPPED_Nombre($request->input("TIPPED_Nombre")==null?"":$request->input("TIPPED_Nombre"));
        $tipopedidoV->setTIPPED_Estado($request->input("TIPPED_Estado")==null?"1":$request->input("TIPPED_Estado"));
        return  $tipopedidoV->getArray();
    }

    public function loadData(Request $request){
        $TIPPED_Codigo=$request->input("TIPPED_Codigo")==null?"%%":$request->input("TIPPED_Codigo");
        $TIPPED_Nombre=$request->input("TIPPED_Nombre")==null?"%%":"%".$request->input("TIPPED_Nombre")."%";
        $TIPPED_Estado=$request->input("TIPPED_Estado")==null?"1":$this->procedure->ObtenerEstado($request->input("TIPPED_Estado"));
        $values=array(":TIPPED_Codigo"=>$TIPPED_Codigo,":TIPPED_Nombre"=>$TIPPED_Nombre,":TIPPED_Estado"=>$TIPPED_Estado);
        return response()->json(['values'=>$values,'entidad'=>"tipopedido"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->tipopedido->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->TIPPED_CodigoInterno.'</div>
                            <div class="table-cell tb_Nombre">'.$d->TIPPED_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->TIPPED_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" data-id='.$d->TIPPED_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" data-id='.$d->TIPPED_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
