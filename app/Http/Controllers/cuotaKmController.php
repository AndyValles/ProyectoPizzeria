<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_cuotakm;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class cuotakmController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Cuotakm/";
    private $search;
    private $cuotakm;
    private $procedure;
    private $entidad="cuotakm";

    public function __construct(){
        $this->search=new  search();
        $this->cuotakm=new tb_cuotakm();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Cuotakm","PROCEDURE_SELECT_Cuotakm");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_CKM_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->cuotakm->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->cuotakm->getArrayAll());
        $data["paginate"]=$this->paginate($this->cuotakm->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="CKM";
        $data["iniciA"]=5;
        return view(self::ruta.'cuotakmIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("precio"=>"","metros"=>"");
        if($id!=""){
            $marc_value=$this->search->search_CuotaKm("CKM_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["precio"]=$value->CKM_Precio;
                $valor["metros"]=$value->CKM_Metros;
            }
        }

        $data["precio"]=$valor["precio"];
        $data["metros"]=$valor["metros"];

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."cuotakmAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->search->search_CuotaKm("CKM_CodigoInterno",$id);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->CKM_Metros;
        }
        $data["entidad"]=$this->entidad;
        $data["name"]=$name." metros";
        $data["id"]=$id;
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->cuotakm->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->cuotakm->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->cuotakm->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $cuotakmV=new tb_cuotakm();
        $cuotakmV->setCKM_CodigoInterno($request->input("CKM_CodigoInterno")==null?0:$request->input("CKM_CodigoInterno"));
        $cuotakmV->setCKM_Precio($request->input("CKM_Precio")==null?0:$request->input("CKM_Precio"));
        $cuotakmV->setCKM_Metros($request->input("CKM_Metros")==null?0:$request->input("CKM_Metros"));
        $cuotakmV->setCKM_estado($request->input("CKM_estado")==null?0:$request->input("CKM_estado"));


        return  $cuotakmV->getArray();
    }

    public function loadData(Request $request){
        $CKM_CodigoInterno=$request->input("CKM_CodigoInterno")==null?"%%":$request->input("CKM_CodigoInterno");
        $CKM_Precio=$request->input("CKM_Precio")==null?"%%":$request->input("CKM_Precio");
        $CKM_Metros=$request->input("CKM_Metros")==null?"%%":$request->input("CKM_Metros");
        $CKM_estado=$request->input("CKM_estado")==null?"%%":$this->procedure->ObtenerEstado($request->input("CKM_estado"));

        $values=array(
            ":CKM_CodigoInterno"=>$CKM_CodigoInterno,
            ":CKM_Precio"=>$CKM_Precio,
            ":CKM_Metros"=>$CKM_Metros,
            ":CKM_estado"=>$CKM_estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"cuotakm"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->cuotakm->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->CKM_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->CKM_Precio.'</div>
                            <div class="table-cell tb_Codigo">'.$d->CKM_Metros.'</div>
                            <div class="table-cell tb_Codigo">'.$d->CKM_estado.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->CKM_estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->CKM_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->CKM_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
