<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_sexo;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class sexoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Sexo/";
    private $search;
    private $sexo;
    private $procedure;
    private $entidad="sexo";

    public function __construct(){
        $this->search=new search();
        $this->sexo=new tb_sexo();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Sexo","PROCEDURE_SELECT_Sexo");
    }

    public function index(){
        $data=array();
        $data["data"] =  $this->table();
        $data["select_estado"] = $this->procedure->select_estado("Bus_SEX_Estado");
        $data["entidad"] =  $this->entidad;
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->sexo->getArrayAll());
        $data["paginate"]=$this->paginate($this->sexo->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate("sexo",5);
        $data["Variable_prop"]="SEX";
        $data["iniciA"]=5;
        return view(self::ruta.'sexoIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("nombre"=>"","identificador"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Sexo("SEX_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->SEX_Nombre;
                $valor["identificador"]=$value->SEX_Identificador;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."sexoAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->SEX_Nombre;
        }
        $data["entidad"]="sexo";
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
        $sexoV=new tb_sexo();
        $sexoV->setSEX_Codigo($request->input("SEX_Codigo")==null?0:$request->input("SEX_Codigo"));
        $sexoV->setSEX_Nombre($request->input("SEX_Nombre")==null?"":$request->input("SEX_Nombre"));
        $sexoV->setSEX_Identificador($request->input("SEX_Identificador")==null?"":$request->input("SEX_Identificador"));
        $sexoV->setSEX_Estado($request->input("SEX_Estado")==null?"1":$request->input("SEX_Estado"));
        return  $sexoV->getArray();
    }

    public function loadData(Request $request){
        $SEX_Codigo=$request->input("SEX_Codigo")==null?"%%":$request->input("SEX_Codigo");
        $SEX_Nombre=$request->input("SEX_Nombre")==null?"%%":"%".$request->input("SEX_Nombre")."%";
        $SEX_Identificador=$request->input("SEX_Identificador")==null?"%%":"%".$request->input("SEX_Identificador")."%";
        $SEX_Estado=$request->input("SEX_Estado")==null?"1":$this->procedure->ObtenerEstado($request->input("SEX_Estado"));
        $values=array(":SEX_Codigo"=>$SEX_Codigo,":SEX_Nombre"=>$SEX_Nombre,":SEX_Identificador"=>$SEX_Identificador,":SEX_Estado"=>$SEX_Estado);
        return response()->json(['values'=>$values,'entidad'=>"sexo"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->sexo->getArrayAll():$request->input("values");
        $limit=$request->input("limit");
        $offset=$request->input("offset");

        $calculo= ($offset-1)*$limit;
        $html=$this->table($data,$limit,$calculo);
        $paginate=$this-> paginate($data,$offset,$limit);
        return response()->json(['table'=>$html,'paginate'=>$paginate,'Ver'=>$calculo,'prueba'=>$request->input("values")]);
    }

    public function table($busqueda=array("%%","%%","%%","1"),$limit=5,$offset=0){
        $data=$this->procedure->search($busqueda,$limit,$offset);
        $html="";
            foreach ($data as $key => $d) {
                if($d->SEX_Estado!="3"){
                    $html.='<div class="table-body">
                        <div class="table-row">
                                <div class="table-cell">'.(($key+1)+$offset).'</div>
                                <div class="table-cell tb_Codigo">'.$d->SEX_CodigoInterno.'</div>
                                <div class="table-cell tb_Nombre">'.$d->SEX_Nombre.'</div>
                                <div class="table-cell tb_Identificador">'.$d->SEX_Identificador.'</div>
                                <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->SEX_Estado=="1"?"Activo":"Desactivado").'</div>
                                <div class="table-cell">
                                    <section class="cnt-btn-option">
                                        <button  class="btn btn-option btn-editar-modal" data-id='.$d->SEX_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                        <button  class="btn btn-option btn-close-modal" data-id='.$d->SEX_CodigoInterno.' ><i class="icon-bin"></i></button>
                                    </section>
                                </div>
                            </div>
                        </div>';
                }
            }
        return $html;
    }
}

?>
