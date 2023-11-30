<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_marca;

use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class marcaController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Marca/";
    private $search;
    private $var="MAR";
    private $entidad="marca";
    private $marca;
    private $procedure;

    public function __construct(){
        $this->search=new  search();
        $this->marca=new tb_marca();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Marca","PROCEDURE_SELECT_Marca");
    }

    public function index(){
        $data=array();


        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table();
        $data["total"]=$this->procedure->pagination($this->marca->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate($this->entidad,5);
        $data["Variable_prop"]=$this->var;
        $data["iniciA"]=5;

        return view(self::ruta.'marcaIndex',$data);
    }

    public function Agregar($id=""){
        $nombre="";
        if($id!=""){
            $marc_value=$this->search->search_Marca("MAR_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $nombre=$value->MAR_Nombre;
            }
        }

        $data["nombre"]=$nombre;

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."marcaAgregar", $data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->MAR_Nombre;
        }
        $data["entidad"]=$this->entidad;
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
        $marcaV=new tb_marca();
        $marcaV->setMAR_Codigo($request->input("MAR_Codigo")==null?0:$request->input("MAR_Codigo"));
        $marcaV->setMAR_Nombre($request->input("MAR_Nombre")==null?"":$request->input("MAR_Nombre"));
        $marcaV->setMAR_Estado($request->input("MAR_Estado")==null?"1":$request->input("MAR_Estado"));
        return  $marcaV->getArray();
    }

    public function loadData(Request $request){
        $MAR_Codigo=$request->input("MAR_Codigo")==null?"%%":$request->input("MAR_Codigo");
        $MAR_Nombre=$request->input("MAR_Nombre")==null?"%%":"%".$request->input("MAR_Nombre")."%";
        $MAR_Estado=$request->input("MAR_Estado")==null?"1":$this->procedure->ObtenerEstado($request->input("MAR_Estado"));
        $values=array(":MAR_Codigo"=>$MAR_Codigo,":MAR_Nombre"=>$MAR_Nombre,":MAR_Estado"=>$MAR_Estado);
        return response()->json(['values'=>$values,'entidad'=>$this->entidad]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->marca->getArrayAll():$request->input("values");
        $limit=$request->input("limit");
        $offset=$request->input("offset");
        $calculo= ($offset-1)*$limit;
        $html=$this->table($data,$limit,$calculo);
        $paginate=$this-> paginate($data,$offset,$limit);
        return response()->json(['table'=>$html,'paginate'=>$paginate,'Ver'=>$calculo,'prueba'=>$offset]);
    }

    public function table($busqueda=array("%%","%%","1"),$limit=5,$offset=0){
        $data=$this->procedure->search($busqueda,$limit,$offset);
        $html="";
            foreach ($data as $key => $d) {
                $html.='<div class="table-body">
                    <div class="table-row">
                            <div class="table-cell">'.(($key+1)+$offset).'</div>
                            <div class="table-cell tb_Codigo">'.$d->MAR_CodigoInterno.'</div>
                            <div class="table-cell tb_Nombre">'.$d->MAR_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->MAR_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->MAR_CodigoInterno.'><i class="icon-pencil"></i></button>
                                    <button  class="btn btn-option btn-close-modal"  data-id='.$d->MAR_CodigoInterno.'><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
