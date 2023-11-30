<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_distrito;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class distritoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Distrito/";
    private $search;
    private $entidad="distrito";
    private $distrito;
    private $procedure;

    public function __construct(){
        $this->search=new search();
        $this->distrito=new tb_distrito();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Distrito","PROCEDURE_SELECT_Distrito");
    }

    public function index(){
        $data=array();
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table();
        $data["Estado"] = $this->procedure->select_estado("Bus_DIS_Estado");
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->distrito->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate( $this->entidad,5);
        $data["Variable_prop"]="DIS";
        $data["iniciA"]=5;
        return view(self::ruta.'distritoIndex',$data);
    }

    public function Agregar($id=""){
        $nombre="";
        if($id!=""){
            $marc_value=$this->search->search_Distrito("DIS_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $nombre=$value->DIS_Nombre;
            }
        }

        $data["nombre"]=$nombre;

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."distritoAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->DIS_Nombre;
        }
        $data["entidad"]= $this->entidad;
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
        $distritoV=new tb_distrito();
        $distritoV->setDIS_Codigo($request->input("DIS_Codigo")==null?0:$request->input("DIS_Codigo"));
        $distritoV->setDIS_Nombre($request->input("DIS_Nombre")==null?"":$request->input("DIS_Nombre"));
        $distritoV->setDIS_Estado($request->input("DIS_Estado")==null?"1":$request->input("DIS_Estado"));
        return  $distritoV->getArray();
    }

    public function loadData(Request $request){
        $DIS_Codigo=$request->input("DIS_Codigo")==null?"%%":$request->input("DIS_Codigo");
        $DIS_Nombre=$request->input("DIS_Nombre")==null?"%%":"%".$request->input("DIS_Nombre")."%";
        $DIS_Estado=$request->input("DIS_Estado")==null?"1":$this->procedure->ObtenerEstado($request->input("DIS_Estado"));
        $values=array(":DIS_Codigo"=>$DIS_Codigo,":DIS_Nombre"=>$DIS_Nombre,":DIS_Estado"=>$DIS_Estado);
        return response()->json(['values'=>$values,'entidad'=>"distrito"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->distrito->getArrayAll():$request->input("values");
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
                if($d->DIS_Estado!="3"){
                $html.='<div class="table-body">
                    <div class="table-row">
                            <div class="table-cell">'.(($key+1)+$offset).'</div>
                            <div class="table-cell tb_Codigo">'.$d->DIS_CodigoInterno.'</div>
                            <div class="table-cell tb_Nombre">'.$d->DIS_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->DIS_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->DIS_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->DIS_CodigoInterno.' ><i class="icon-bin"></i></button>
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
