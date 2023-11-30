<?php
  namespace App\Http\Controllers;

  use App\Models\entitys\tb_articulo;

  use App\Models\Procedure\Buscar\search;
  use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
  use Illuminate\Foundation\Bus\DispatchesJobs;
  use Illuminate\Foundation\Validation\ValidatesRequests;
  use Illuminate\Http\Request;
  use App\Models\Procedure\Procedure;

  class modalController extends Controller
  {
	private $producto;
    private $search;

      use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
        $this->search=new search();
    }
      public function modal_pedido($id){
        $tipart=0;
        $values=array("tipoArticulo"=>"","nombre"=>"","precio"=>"","descripcion"=>"","stock"=>0,"url"=>"");
        $producto=$this->search->search_Articulo("ART_CodigoInterno",$id);
        foreach($producto as $key=>$valor){
            $values["nombre"]=$valor->ART_Nombre;
            $values["precio"]=$valor->ART_Precio;
            $values["descripcion"]=$valor->ART_Descripcion;
            $values["url"]=$valor->ART_Imagen;
            $values["stock"]=$valor->ART_Stock;
            $tipart=$valor->TIPART_CodigoInterno;
            $tipoart=$this->search->search_TipoArticulo("TIPART_CodigoInterno",$valor->TIPART_CodigoInterno);
            foreach($tipoart as $k=>$v){
                $values["tipoArticulo"]=$v->TIPART_Nombre;
            }
        }

        foreach($values as $key=>$valor){
            $data[$key]=$valor;
        }

        $data["produc_simil"]=$this->produc_simil($tipart);
        $data["total"]=$this->total($id);
        $data["extras"]=$this->extras($id);
	    $data["id"]=$id;
        return  view("modal.modal",$data);
      }


    public function infopedido(){
        return view("modal.modal-info-pedido");
    }
    public function modal_detalles(){
        return view("modal.modal_pedido_dashboard");
    }

      public function total($id){
       return 0;
      }

      public function modal_sucursal(){
        $data["nombre"]=$this->sucursal();
        return  view("modal.modal_pedido",$data);
       }

       public function sucursal(){
        $html="";
        $sucursal=$this->search->search_Sucursal("","",$this->search->cantidad_Sucursal());
        foreach($sucursal as $key=>$value){
            if($value->SUC_Estado!="3"){
            $html.="<div class='row-brn-disname'>
                        <button class='btn btn-disname-mm' data-id='$value->SUC_CodigoInterno'>
                                <div class='p-e-n'>$value->SUC_Referencia</div>
                                <div class='p-e-n'>$value->SUC_Direccion</div>";
                        $distrito=$this->search->search_Distrito("DIS_CodigoInterno",$value->DIS_CodigoInterno);
                            foreach($distrito as $k=>$v){
                                $html.="<div class='p-e-n'>$v->DIS_Nombre</div>";
                            }
            $html.=     "</button>
                    </div>";
            }
        }
        return $html;
       }

       public function produc_simil($id){
        $html="";
        $artic=$this->search->search_Articulo("TIPART_CodigoInterno",$id,5);
        foreach($artic as $key=>$value ){
            $html.=' <section class="ctn-card-product-similar">
                        <a class="w-100" href="'.url("/Producto/".$value->ART_CodigoInterno).'">
                            <div class="ctn-image-similar"><img class="img-siml-p" src="'.asset($value->ART_Imagen).'" alt="" ></div>
                            <div class="ctn-product-descrip">
                                <div class="gray-82_gray-224 ">'.$value->ART_Descripcion.'</div>
                                <div class="gray-82_gray-224 ">S/.'.$value->ART_Precio.'</div>
                            </div>
                            <div class="gray-82_gray-224 ">'.$value->TIPART_Nombre.'</div>
                        </a>
                    </section>';
        }
        return $html;
       }


      public function extras($id){
        $html="";
        /*$tipoItem=$this->search->search_articuloitem("ART_CodigoInterno",$id);
        //foreach($tipoItem as $key=>$valor){
            for(){
            $item=$this->search->search_item("ITEM_CodigoInterno",$valor->ITEM_CodigoInterno);
            foreach($item as $k=>$v){
            $html.='
            <div class="cnt-modal-agreg">
                <div class="row-modal-agreg">
                <div class="txt-modal-info">'.$v->ITEM_Descripcion.'</div>
                    <div class="gray-92">S/. '.$v->ITEM_Precio.'</div></div>
                <div class="df-ac-jc">
                    <input type="checkbox">
                    <button class="btn btn-modal-agreg plus-agregar" data-id="'.$v->ITEM_CodigoInterno.'">+</button>
                </div>
            </div>';
            }
        }*/
        return $html;
      }

      public function menu_index(){
        $data["menu"]=$this->menu_search("%%");
        return view("modal.modal_buscar",$data);
      }

      public function menu_search_json($name){
        return response()->json(['menu_searh'=> $this->menu_search($name)]);
      }

      public function menu_search($name){
        $html="";
        $data=$this->search->search_Menu("MEN_Nombre","%".$name."%",$this->search->cantidad_Menu());
        foreach($data as $key=>$value){
            if($value->MEN_Estado!="0"){
            $html.='<article class="row-modal-buscar">
                        <div class="item-modal-buscar"><a href="'.url($value->MEN_Ruta).'" class="btn-item-modal"><i class="'.$value->MEN_Icono.' mr-10"></i>'.$value->MEN_Nombre.'</a></div>
                    </article>';
            }
        }
        return $html;
      }
  }
?>
