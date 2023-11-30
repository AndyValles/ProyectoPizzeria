<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_administrador;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class administradorController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Administrador/";
    private $search;
    private $var="MAR";
    private $entidad="administrador";
    private $administrador;
    private $procedure;

    public function __construct(){
        $this->search=new  search();
        $this->administrador=new tb_administrador();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Administrador","PROCEDURE_SELECT_Administrador");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_ADM_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->administrador->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->administrador->getArrayAll());
        $data["paginate"]=$this->paginate($this->administrador->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="ADM";
        $data["iniciA"]=5;
        return view(self::ruta.'administradorIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("WRITE"=>1, "READ"=>1, "VIEW"=>1 ,"ip"=>"");

        if($id!=""){
            $marc_value=$this->search->search_Administrador("ADM_CodigoInterno",$id);
            foreach($marc_value as $key=>$val){
                $valor["usuario"]=$val->USU_CodigoInterno;
                $valor["WRITE"]=$val->ADM_Write;
                $valor["READ"]=$val->ADM_READ;
                $valor["VIEW"]=$val->ADM_VIEW;
                $valor["ip"]=$val->ADM_Ip;
            }
        }
        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }
        $data["usuario"]=$this->search->select_Usuario();
        $data["codigo"]=$id;
        $data["Variable_prop"]=$this->var;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."administradorAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->ADM_Nombre;
        }
        $data["entidad"]="administrador";
        $data["name"]=$name;
        $data["id"]=$id;
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->administrador->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->administrador->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->administrador->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $administradorV=new tb_administrador();
        $administradorV->setADM_CodigoInterno($request->input("ADM_CodigoInterno")==null?0:$request->input("ADM_CodigoInterno"));
        $administradorV->setUSUARIO($request->input("USU_CodigoInterno")==null?0:$request->input("USU_CodigoInterno"));
        $administradorV->setADM_Write($request->input("ADM_Write")==null?"":$request->input("ADM_Write"));
        $administradorV->setADM_READ($request->input("ADM_READ")==null?"":$request->input("ADM_READ"));
        $administradorV->setADM_VIEW($request->input("ADM_VIEW")==null?"":$request->input("ADM_VIEW"));
        $administradorV->setADM_CodigoConfirmacion($request->input("ADM_CodigoConfirmacion")==null?0:$request->input("ADM_CodigoConfirmacion"));
        $administradorV->setADM_Ip($request->input("ADM_Ip")==null?"":$request->input("ADM_Ip"));
        $administradorV->setADM_Estado($request->input("ADM_Estado")==null?"":$request->input("ADM_Estado"));
        return  $administradorV->getArray();
    }

    public function loadData(Request $request){
        $ADM_CodigoInterno=$request->input("ADM_CodigoInterno")==null?"%%":$request->input("ADM_CodigoInterno");
        $USU_CodigoInterno=$request->input("USU_CodigoInterno")==null?"%%":$request->input("USU_CodigoInterno");
        $ADM_Write=$request->input("ADM_Write")==null?"%%":$request->input("ADM_Write");
        $ADM_READ=$request->input("ADM_READ")==null?"%%":$request->input("ADM_READ");
        $ADM_VIEW=$request->input("ADM_VIEW")==null?"%%":$request->input("ADM_VIEW");
        $ADM_Estado=$request->input("ADM_Estado")==null?"%%":$this->procedure->ObtenerEstado($request->input("ADM_Estado"));

        $values=array(
            ":ADM_CodigoInterno"=>$ADM_CodigoInterno,
            ":USU_CodigoInterno"=>$USU_CodigoInterno,
            ":ADM_Write"=>$ADM_Write,
            ":ADM_READ"=>$ADM_READ,
            ":ADM_VIEW"=>$ADM_VIEW,
            ":ADM_Estado"=>$ADM_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"administrador"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->administrador->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->ADM_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->USU_PriNombre.'</div>
                            <div class="table-cell tb_Codigo">'.($d->ADM_Write=="1"?"SI":"NO").'</div>
                            <div class="table-cell tb_Codigo">'.($d->ADM_READ=="1"?"SI":"NO").'</div>
                            <div class="table-cell tb_Codigo">'.($d->ADM_VIEW=="1"?"SI":"NO").'</div>
                            <div class="table-cell tb_Codigo">'.$d->ADM_Ip.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->ADM_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                            <section class="cnt-btn-option">';
                            if(str_replace("0","",$d->ADM_CodigoInterno)!="1"){
                             $html.=
                                    '<button class="btn btn-option  btn-editar-modal"  data-id='.$d->ADM_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button class="btn btn-option  btn-close-modal"  data-id='.$d->ADM_CodigoInterno.' ><i class="icon-bin"></i></button>';
                            }
                $html.=         '</section></div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
