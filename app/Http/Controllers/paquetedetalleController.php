<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_paquetedetalle;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class paquetedetalleController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Paquetedetalle/";
    private $paquetedetalle;
    private $procedure;

    public function __construct(){
        $this->paquetedetalle=new tb_paquetedetalle();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Paquetedetalle","PROCEDURE_SELECT_Paquetedetalle");
    }

    public function index(){
        $data=array();
        $data["data"] =  $this->table();
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->paquetedetalle->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate("paquetedetalle",5);
        $data["Variable_prop"]="PAQDET";
        $data["iniciA"]=5;
        return view(self::ruta.'paquetedetalleIndex',$data);
    }

    public function modal_create(){
        return view(self::ruta."paquetedetalleAgregar");
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->PAQDET_Nombre;
        }
        $data["entidad"]="paquetedetalle";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Paquetedetalledelete(".$id.")";
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
        $htm=$this->procedure->Paginate("paquetedetalle",$pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $paquetedetalleV=new tb_paquetedetalle();
        $paquetedetalleV->setPAQDET_CodigoInterno($request->input("PAQDET_CodigoInterno")==null?0:$request->input("PAQDET_CodigoInterno"));
        $paquetedetalleV->setPAQDET_Descripcion($request->input("PAQDET_Descripcion")==null?0:$request->input("PAQDET_Descripcion"));
        $paquetedetalleV->setPAQ_CodigoInterno($request->input("PAQ_CodigoInterno")==null?0:$request->input("PAQ_CodigoInterno"));
        $paquetedetalleV->setART_CodigoInterno($request->input("ART_CodigoInterno")==null?0:$request->input("ART_CodigoInterno"));
        $paquetedetalleV->setPAQDET_FechaRegistro($request->input("PAQDET_FechaRegistro")==null?0:$request->input("PAQDET_FechaRegistro"));
        $paquetedetalleV->setPAQDET_Cantidad($request->input("PAQDET_Cantidad")==null?0:$request->input("PAQDET_Cantidad"));
        $paquetedetalleV->setPAQDET_Precio($request->input("PAQDET_Precio")==null?0:$request->input("PAQDET_Precio"));
        $paquetedetalleV->setPAQDET_descuento($request->input("PAQDET_descuento")==null?0:$request->input("PAQDET_descuento"));
        $paquetedetalleV->setPAQDET_Estado($request->input("PAQDET_Estado")==null?0:$request->input("PAQDET_Estado"));
        return  $paquetedetalleV->getArray();
    }

    public function loadData(Request $request){
        $PAQDET_CodigoInterno=$request->input("PAQDET_CodigoInterno")==null?"%%":$request->input("PAQDET_CodigoInterno");
        $PAQDET_Descripcion=$request->input("PAQDET_Descripcion")==null?"%%":$request->input("PAQDET_Descripcion");
        $PAQ_CodigoInterno=$request->input("PAQ_CodigoInterno")==null?"%%":$request->input("PAQ_CodigoInterno");
        $ART_CodigoInterno=$request->input("ART_CodigoInterno")==null?"%%":$request->input("ART_CodigoInterno");
        $PAQDET_FechaRegistro=$request->input("PAQDET_FechaRegistro")==null?"%%":$request->input("PAQDET_FechaRegistro");
        $PAQDET_Cantidad=$request->input("PAQDET_Cantidad")==null?"%%":$request->input("PAQDET_Cantidad");
        $PAQDET_Precio=$request->input("PAQDET_Precio")==null?"%%":$request->input("PAQDET_Precio");
        $PAQDET_descuento=$request->input("PAQDET_descuento")==null?"%%":$request->input("PAQDET_descuento");
        $PAQDET_Estado=$request->input("PAQDET_Estado")==null?"%%":$request->input("PAQDET_Estado");

        $values=array(
            ":PAQDET_CodigoInterno"=>$PAQDET_CodigoInterno,
            ":PAQDET_Descripcion"=>$PAQDET_Descripcion,
            ":PAQ_CodigoInterno"=>$PAQ_CodigoInterno,
            ":ART_CodigoInterno"=>$ART_CodigoInterno,
            ":PAQDET_FechaRegistro"=>$PAQDET_FechaRegistro,
            ":PAQDET_Cantidad"=>$PAQDET_Cantidad,
            ":PAQDET_Precio"=>$PAQDET_Precio,
            ":PAQDET_descuento"=>$PAQDET_descuento,
            ":PAQDET_Estado"=>$PAQDET_Estado,
        );
        return response()->json(['values'=>$values,'entidad'=>"paquetedetalle"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->paquetedetalle->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->PAQDET_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQDET_Descripcion.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQ_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->ART_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQDET_FechaRegistro.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQDET_Cantidad.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQDET_Precio.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQDET_descuento.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PAQDET_Estado.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->PAQDET_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->PAQDET_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'/paquetedetalle/modal_delete/".$d->PAQDET_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->PAQDET_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->PAQDET_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_PAQDET_Name'.$d->PAQDET_CodigoInterno.'" value="'. $d->PAQDET_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Paquetedetalleedit('.$d->PAQDET_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->PAQDET_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
