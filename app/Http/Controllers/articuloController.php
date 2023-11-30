<?php
 namespace App\Http\Controllers;

 use App\Models\entitys\tb_articulo;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
 use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
 use Illuminate\Foundation\Bus\DispatchesJobs;
 use Illuminate\Foundation\Validation\ValidatesRequests;
 use Illuminate\Http\Request;
 use App\Models\Procedure\Procedure;

 class articuloController extends Controller
 {
     use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     private const ruta ="./AdminCRUD/articulo/";
     private $search;
     private $busqueda;
     private $articulo;
     private $procedure;
     private $entidad="articulo";

     public function __construct(){
         $this->search=new  search();
         $this->busqueda=new Selects();
         $this->articulo=new tb_articulo();
         $this->procedure=new Procedure("PROCEDURE_CRUD_Articulo","PROCEDURE_SELECT_Articulo");
     }

     public function index(){
         $data=array();
         $data["marca"] = $this->busqueda->select_Marca("Index");
         $data["proveedor"] = $this->busqueda->select_Proveedor("Index");
         $data["tipoarticulo"] = $this->busqueda->select_Tipoarticulo("Index");
         $data["select_estado"] = $this->procedure->select_estado("Bus_ART_Estado");
         $data["entidad"] =  $this->entidad;
         $data["data"] =  $this->table($this->articulo->getArrayAll());
         $data["url_modal"] = "modal_create";
         $data["url_filtro"] = "modal_filter";
         $data["total"]=$this->procedure->pagination($this->articulo->getArrayAll());
         $data["paginate"]=$this->paginate($this->articulo->getArrayAll());
         $data["pgValue"]=$this->procedure->SelectPaginate(5);
         $data["Variable_prop"]="ART";
         $data["iniciA"]=5;
         return view(self::ruta.'articuloIndex',$data);
     }

     public function Agregar($id=""){
        $valor=array("nombre"=>"","descripcion"=>"","precio"=>"","stock"=>"","imagen"=>"");

        if($id!=""){
            $marc_value=$this->search->search_Articulo("ART_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["nombre"]=$value->ART_Nombre;
                $valor["descripcion"]=$value->ART_Descripcion;
                $valor["precio"]=$value->ART_Precio;
                $valor["stock"]=$value->ART_Stock;
                $valor["imagen"]=$value->ART_Imagen;
            }
        }

        $data["nombre"]=$valor["nombre"];
        $data["descripcion"]=$valor["descripcion"];
        $data["precio"]=$valor["precio"];
        $data["stock"]=$valor["stock"];
        $data["imagen"]=$valor["imagen"];

         $data["marca"] = $this->search->select_Marca();
         $data["proveedor"] = $this->search->select_Proveedor();
         $data["tipoarticulo"] = $this->search->select_Tipoarticulo();

         $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
         return view(self::ruta."articuloAgregar",$data);
     }

     public function modal_delete($id){
         $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
         $name="";

         foreach ($datable as $key => $d) {
             $name=$d->ART_Nombre;
         }

         $data["entidad"]="articulo";
         $data["name"]=$name;
         $data["id"]=$id;
         return view(self::ruta."modal_delete", $data);
     }

     public function load_img(Request $request){
        $id=$this->search->cantidad_Articulo()+1;
        return response()->json(['ruta'=> $this->procedure->load_img($request,"ART_Imagen_".$id)]);
     }

     public function create(Request $request){
         $data=$this->procedure->create($this->valuesStore($request));
         return response()->json(['table'=> $this->table($this->articulo->getArrayAll())]);
     }

     public function update(Request $request){
         $data=$this->procedure->update($this->valuesStore($request));
         return response()->json(['table'=> $this->table($this->articulo->getArrayAll())]);
     }

     public function delete(Request $request){
         $data=$this->procedure->delete($this->valuesStore($request));
         return response()->json(['table'=> $this->table($this->articulo->getArrayAll())]);
     }

     public function paginate($busqueda=array("%%","%%","%%"),$limit=1,$offset=5){
         $pag=$this->procedure->pagination($busqueda);
         $htm=$this->procedure->Paginate($pag,$limit,$offset);
         return $htm;
     }

     public function valuesStore(Request $request):array{
         $articuloV=new tb_articulo();
         $articuloV->setART_Codigo($request->input("ART_CodigoInterno")==null?0:$request->input("ART_CodigoInterno"));
         $articuloV->setART_Nombre($request->input("ART_Nombre")==null?0:$request->input("ART_Nombre"));
         $articuloV->setART_Descripcion($request->input("ART_Descripcion")==null?0:$request->input("ART_Descripcion"));
         $articuloV->setART_Precio($request->input("ART_Precio")==null?0:$request->input("ART_Precio"));
         $articuloV->setART_Stock($request->input("ART_Stock")==null?0:$request->input("ART_Stock"));
         $articuloV->setART_FechaIngreso(date("Y-m-d H:i:s"));
         $articuloV->setART_Imagen($request->input("ART_Imagen")==null?0:$request->input("ART_Imagen"));
         $articuloV->setART_Estado($request->input("ART_Estado")==null?0:$request->input("ART_Estado"));
         $articuloV->setTIPOARTICULO($request->input("TIPART_CodigoInterno")==null?1:$request->input("TIPART_CodigoInterno"));
         $articuloV->setMAR_CodigoInterno($request->input("MAR_CodigoInterno")==null?1:$request->input("MAR_CodigoInterno"));
         $articuloV->setPROVEEDOR($request->input("PROV_CodigoInterno")==null?1:$request->input("PROV_CodigoInterno"));
         return  $articuloV->getArray();
     }

     public function loadData(Request $request){
         $ART_CodigoInterno=$request->input("ART_CodigoInterno")==null?"%%":$request->input("ART_CodigoInterno");
         $ART_Nombre=$request->input("ART_Nombre")==null?"%%":$request->input("ART_Nombre");
         $ART_Descripcion=$request->input("ART_Descripcion")==null?"%%":$request->input("ART_Descripcion");
         $ART_Precio=$request->input("ART_Precio")==null?"%%":$request->input("ART_Precio");
         $ART_Stock=$request->input("ART_Stock")==null?"%%":$request->input("ART_Stock");
         $ART_FechaIngreso=$request->input("ART_FechaIngreso")==null?"%%":$request->input("ART_FechaIngreso");
         $ART_Estado=$request->input("ART_Estado")==null?"%%":$request->input("ART_Estado");
         $TIPART_CodigoInterno=$request->input("TIPART_CodigoInterno")==null?"%%":$request->input("TIPART_CodigoInterno");
         $MAR_CodigoInterno=$request->input("MAR_CodigoInterno")==null?"%%":$request->input("MAR_CodigoInterno");
         $PROV_CodigoInterno=$request->input("PROV_CodigoInterno")==null?"%%":$this->procedure->ObtenerEstado($request->input("PROV_CodigoInterno"));

         $values=array(
            ":ART_CodigoInterno"=>$ART_CodigoInterno,
            ":ART_Nombre"=>$ART_Nombre,
            ":ART_Descripcion"=>$ART_Descripcion,
            ":ART_Precio"=>$ART_Precio,
            ":ART_Stock"=>$ART_Stock,
            ":ART_FechaIngreso"=>$ART_FechaIngreso,
            ":ART_Estado"=>$ART_Estado,
            ":TIPART_CodigoInterno"=>$TIPART_CodigoInterno,
            ":MAR_CodigoInterno"=>$MAR_CodigoInterno,
            ":PROV_CodigoInterno"=>$PROV_CodigoInterno,
        );
         return response()->json(['values'=>$values,'entidad'=>"articulo"]);
     }

     public function search(Request $request){
         $data=$request->input("values")==null?$this->articulo->getArrayAll():$request->input("values");
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
                             <div class="table-cell tb_Codigo">'.$d->ART_CodigoInterno.'</div>
                             <div class="table-cell tb_Codigo">'.$d->ART_Nombre.'</div>
                             <div class="table-cell tb_Codigo">'.$d->ART_Precio.'</div>
                             <div class="table-cell tb_Codigo">'.$d->ART_Stock.'</div>
                             <div class="table-cell tb_Codigo">'.$d->ART_FechaIngreso.'</div>
                             <div class="table-cell tb_Codigo">'.$d->TIPART_Nombre.'</div>
                             <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->ART_Estado=="1"?"Activo":"Desactivado").'</div>
                             <div class="table-cell">
                                 <section class="cnt-btn-option">
                                     <button  class="btn btn-option" data-id='.$d->ART_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                     <button  class="btn btn-option" data-id='.$d->ART_CodigoInterno.' ><i class="icon-bin"></i></button>
                                 </section>
                             </div>
                         </div>
                     </div>';
             }
         return $html;
     }
 }
?>
