<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_factura;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class facturaController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Factura/";
    private $factura;
    private $procedure;
    private $entidad="factura";

    public function __construct(){
        $this->factura=new tb_factura();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Factura","PROCEDURE_SELECT_Factura");
    }

    public function index(){
        $data=array();
        $data["select_estado"] = $this->procedure->select_estado("Bus_MAR_Estado");
        $data["entidad"] =  $this->entidad;
        $data["data"] =  $this->table();
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["total"]=$this->procedure->pagination($this->factura->getArrayAll());
        $data["paginate"]=$this->paginate();
        $data["pgValue"]=$this->procedure->SelectPaginate("factura",5);
        $data["Variable_prop"]="FAC";
        $data["iniciA"]=5;
        return view(self::ruta.'facturaIndex',$data);
    }

    public function Agregar($id=""){
        return view(self::ruta."facturaAgregar");
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->FAC_Nombre;
        }
        $data["entidad"]="factura";
        $data["name"]=$name;
        $data["id"]=$id;
        $data["Eventname"]="Facturadelete(".$id.")";
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
        $facturaV=new tb_factura();
        $facturaV->setFAC_CodigoInterno($request->input("FAC_CodigoInterno")==null?0:$request->input("FAC_CodigoInterno"));
        $facturaV->setFAC_FechaRegistro($request->input("FAC_FechaRegistro")==null?0:$request->input("FAC_FechaRegistro"));
        $facturaV->setFAC_Descuento($request->input("FAC_Descuento")==null?0:$request->input("FAC_Descuento"));
        $facturaV->setFAC_IGV($request->input("FAC_IGV")==null?0:$request->input("FAC_IGV"));
        $facturaV->setFAC_Total($request->input("FAC_Total")==null?0:$request->input("FAC_Total"));
        $facturaV->setPED_CodigoInterno($request->input("PED_CodigoInterno")==null?0:$request->input("PED_CodigoInterno"));

        return  $facturaV->getArray();
    }

    public function loadData(Request $request){
        $FAC_CodigoInterno=$request->input("FAC_CodigoInterno")==null?"%%":$request->input("FAC_CodigoInterno");
        $FAC_FechaRegistro=$request->input("FAC_FechaRegistro")==null?"%%":$request->input("FAC_FechaRegistro");
        $FAC_Descuento=$request->input("FAC_Descuento")==null?"%%":$request->input("FAC_Descuento");
        $FAC_IGV=$request->input("FAC_IGV")==null?"%%":$request->input("FAC_IGV");
        $FAC_Total=$request->input("FAC_Total")==null?"%%":$request->input("FAC_Total");
        $PED_CodigoInterno=$request->input("PED_CodigoInterno")==null?"%%":$request->input("PED_CodigoInterno");

        $values=array(
            ":FAC_CodigoInterno"=>$FAC_CodigoInterno,
            ":FAC_FechaRegistro"=>$FAC_FechaRegistro,
            ":FAC_Descuento"=>$FAC_Descuento,
            ":FAC_IGV"=>$FAC_IGV,
            ":FAC_Total"=>$FAC_Total,
            ":PED_CodigoInterno"=>$PED_CodigoInterno,

        );
        return response()->json(['values'=>$values,'entidad'=>"factura"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->factura->getArrayAll():$request->input("values");
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
                            <div class="table-cell tb_Codigo">'.$d->FAC_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->FAC_FechaRegistro.'</div>
                            <div class="table-cell tb_Codigo">'.$d->FAC_Descuento.'</div>
                            <div class="table-cell tb_Codigo">'.$d->FAC_IGV.'</div>
                            <div class="table-cell tb_Codigo">'.$d->FAC_Total.'</div>
                            <div class="table-cell tb_Codigo">'.$d->PED_CodigoInterno.'</div>

                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->FAC_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option" onclick="edit_open('.$d->FAC_CodigoInterno.')" ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option" onclick="cargar_modal('."'modal_delete/".$d->FAC_CodigoInterno."'".')" ><i class="icon-bin"></i></button>
                                    <button  class="btn btn-option" onclick="" ><i class="icon-option"></i></button>
                                </section>
                            </div>
                        </div>
                        <div class="table-row-edit" id="Edit_'.$d->FAC_CodigoInterno.'">
                            <div class="table-cell gray-181">Codigo: <input class="input input-edit" type="text" value="'. $d->FAC_CodigoInterno.'" disabled></div>
                            <div class="table-cell gray-181">Nombre: <input class="input input-edit" type="text" id="Edit_FAC_Name'.$d->FAC_CodigoInterno.'" value="'. $d->FAC_Nombre.'"></div>
                            <div class="table-cell">
                                <button class="btn btn-crud-edit" onclick="Facturaedit('.$d->FAC_CodigoInterno.')">Guardar</button>
                                <button class="btn btn-crud-cancelar" onclick="edit_open('.$d->FAC_CodigoInterno.')">cancelar</button>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
