<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_banner;
use App\Models\Procedure\Buscar\Busqueda;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class bannerController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Banner/";
    private $busqueda;
    private  $search;
    private $banner;
    private $procedure;
    private $entidad="banner";

    public function __construct(){
        $this->busqueda=new Selects();
        $this->search=new  search();
        $this->banner=new tb_banner();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Banner","PROCEDURE_SELECT_Banner");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_BUS_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table($this->banner->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["tipobanner"]=$this->busqueda->select_Tipobanner("Index");
        //$data["articulo"]=$this->busqueda->select_Articulo("Index");
        $data["total"]=$this->procedure->pagination($this->banner->getArrayAll());
        $data["paginate"]=$this->paginate($this->banner->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="BAN";
        $data["iniciA"]=5;
        return view(self::ruta.'bannerIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("imagen"=>"","nombre"=>"");
        if($id!=""){
            $marc_value=$this->search->search_Banner("BAN_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["imagen"]=$value->BAN_Imagen;
                $valor["nombre"]=$value->BAN_Ruta;
            }
        }

        $data["imagen"]=$valor["imagen"];
        $data["nombre"]=$valor["nombre"];
        $data["tipobanner"]=$this->busqueda->select_Tipobanner("Agregar");
        //$data["paquete"]=$this->busqueda->select_Articulo("Agregar");

        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."bannerAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->BAN_Nombre;
        }
        $data["entidad"]="banner";
        $data["name"]=$name;
        $data["id"]=$id;
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->banner->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->banner->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->banner->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $bannerV=new tb_banner();
        $bannerV->setBAN_CodigoInterno($request->input("BAN_CodigoInterno")==null?0:$request->input("BAN_CodigoInterno"));
        $bannerV->setBAN_Imagen($request->input("BAN_Imagen")==null?0:$request->input("BAN_Imagen"));
        $bannerV->setBAN_Ruta($request->input("BAN_Ruta")==null?0:$request->input("BAN_Ruta"));
        $bannerV->setTIPBAN_CodigoInterno($request->input("TIPBAN_CodigoInterno")==null?0:$request->input("TIPBAN_CodigoInterno"));
        $bannerV->setART_CodigoInterno($request->input("ART_CodigoInterno")==null?0:$request->input("ART_CodigoInterno"));
        $bannerV->setBAN_Estado($request->input("BAN_Estado")==null?0:$request->input("BAN_Estado"));
        return  $bannerV->getArray();
    }

    public function loadData(Request $request){
        $BAN_CodigoInterno=$request->input("BAN_CodigoInterno")==null?"%%":$request->input("BAN_CodigoInterno");
        $BAN_Imagen=$request->input("BAN_Imagen")==null?"%%":$request->input("BAN_Imagen");
        $BAN_Ruta=$request->input("BAN_Ruta")==null?"%%":$request->input("BAN_Ruta");
        $TIPBAN_CodigoInterno=$request->input("TIPBAN_CodigoInterno")==null?"%%":$request->input("TIPBAN_CodigoInterno");
        $ART_CodigoInterno=$request->input("ART_CodigoInterno")==null?"%%":$request->input("ART_CodigoInterno");
        $BAN_Estado=$request->input("BAN_Estado")==null?"%%":$request->input("BAN_Estado");

        $values=array(
            ":BAN_CodigoInterno"=>$BAN_CodigoInterno,
            ":BAN_Imagen"=>$BAN_Imagen,
            ":BAN_Ruta"=>$BAN_Ruta,
            ":TIPBAN_CodigoInterno"=>$TIPBAN_CodigoInterno,
            ":ART_CodigoInterno"=>$ART_CodigoInterno,
            ":BAN_Estado"=>$BAN_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"banner"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->banner->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->BAN_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->BAN_Imagen.'</div>
                            <div class="table-cell tb_Codigo">'.$d->BAN_Ruta.'</div>
                            <div class="table-cell tb_Codigo">'.$d->TIPBAN_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->ART_CodigoInterno.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->BAN_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->BAN_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->BAN_CodigoInterno.'><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
