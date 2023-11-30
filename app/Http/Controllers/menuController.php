<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_menu;
use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class menuController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Menu/";
    private $search;
    private $menu;
    private $procedure;
    private $entidad="menu";

    public function __construct(){
        $this->search=new  search();
        $this->menu=new tb_menu();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Menu","PROCEDURE_SELECT_Menu");
    }

    public function index(){
        $data=array();

        $data["select_estado"] = $this->procedure->select_estado("Bus_MEN_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->menu->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->menu->getArrayAll());
        $data["paginate"]=$this->paginate($this->menu->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="MEN";
        $data["iniciA"]=5;
        return view(self::ruta.'menuIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("padre"=>"","nombre"=>"","tipo"=>"","icono"=>"","ruta"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Menu("MEN_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["padre"]=$value->MEN_CodigoPadre;
                $valor["nombre"]=$value->MEN_Nombre;
                $valor["tipo"]=$value->MEN_Tipo;
                $valor["icono"]=$value->MEN_Icono;
                $valor["ruta"]=$value->MEN_Ruta;
            }
        }

        foreach($valor as $key =>$value){
            $data[$key]=$value;
        }

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."menuAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->MEN_Nombre;
        }
        $data["entidad"]="menu";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Menudelete(".$id.")";
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->menu->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->menu->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->menu->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $menuV=new tb_menu();
        $menuV->setMEN_CodigoInterno($request->input("MEN_CodigoInterno")==null?0:$request->input("MEN_CodigoInterno"));
        $menuV->setMEN_Nombre($request->input("MEN_Nombre")==null?0:$request->input("MEN_Nombre"));
        $menuV->setMEN_Tipo($request->input("MEN_Tipo")==null?0:$request->input("MEN_Tipo"));
        $menuV->setMEN_Icono($request->input("MEN_Icono")==null?0:$request->input("MEN_Icono"));
        $menuV->setMEN_Ruta($request->input("MEN_Ruta")==null?0:$request->input("MEN_Ruta"));
        $menuV->setMEN_Estado($request->input("MEN_Estado")==null?0:$request->input("MEN_Estado"));
        return  $menuV->getArray();
    }

    public function loadData(Request $request){
        $MEN_CodigoInterno=$request->input("MEN_CodigoInterno")==null?"%%":$request->input("MEN_CodigoInterno");
        $MEN_Nombre=$request->input("MEN_Nombre")==null?"%%":"%".$request->input("MEN_Nombre")."%";
        $MEN_Icono=$request->input("MEN_Icono")==null?"%%":"%".$request->input("MEN_Icono")."%";
        $MEN_Ruta=$request->input("MEN_Ruta")==null?"%%":$request->input("MEN_Ruta");
        $MEN_Estado=$request->input("MEN_Estado")==null?"%%":$this->procedure->ObtenerEstado($request->input("MEN_Estado"));

        $values=array(
            ":MEN_CodigoInterno"=>$MEN_CodigoInterno,
            ":MEN_Nombre"=>$MEN_Nombre,
            ":MEN_Icono"=>$MEN_Icono,
            ":MEN_Ruta"=>$MEN_Ruta,
            ":MEN_Estado"=>$MEN_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"menu"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->menu->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->MEN_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->MEN_CodigoPadre.'</div>
                            <div class="table-cell tb_Codigo">'.$d->MEN_Nombre.'</div>
                            <div class="table-cell tb_Codigo"><i  class="'.$d->MEN_Icono.'"></i></div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->MEN_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->MEN_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->MEN_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
