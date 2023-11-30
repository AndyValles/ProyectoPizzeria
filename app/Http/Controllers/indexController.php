<?php
    namespace App\Http\Controllers;

    use App\Models\entitys\tb_lugar;

    use App\Models\entitys\tb_paquetedetalle;
		use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Http\Request;
    use App\Models\Procedure\Procedure;
		use App\Models\Procedure\Buscar\search;

    class indexController extends Controller
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        private $search;
				private $procedure;
        public function __construct()
        {
          	$this->procedure=new Procedure("","");
            $this->search =new search();
        }
        public function index(){
            $data["productos"]=$this->product();
            $data["productoALL"]=$this->productoALL();
            $data["carrusel"]=$this->banner()["carrusel"];
            $data["cuadricula"]=$this->banner()["cuadricula"];

            $data["footer"]=$this->banner()["footer"];
            return view('index',$data);
        }

        public function product(){
            $producto=$this->search->search_Articulo("","",4);
            $html="";
            foreach ($producto as $key=>$value){
                if($value->ART_Stock>0){
            $html .="<div class='card-product'>
                <div class='cnt-card-image'><img src='".asset($value->ART_Imagen)."' alt='$value->ART_Imagen' width='100%' height='100%' class='ob-c'></div>
                <div class='cnt-card-info'>
                        <div class='txt-card-name'>$value->ART_Nombre</div>
                        <div class='w-100'>
                            <section class='content-descrip-product'>
                                <div>Tamaño:</div>
                                <div class='w-100 df-ac-jc'>
                                    <select class='input'>
                                        <option>Personal</option>
                                        <option>Grande</option>
                                        <option>Familiar</option>
                                        <option>Big</option>
                                    </select>
                                </div>
                            </section>
                            <section></section>
                            <section></section>
                        </div>
                        <div class='txt-card-price'>S/. $value->ART_Precio</div>
                    <div class='w-100 df'>
                        <div class='w-100 mr-10'><a href='".url("/Producto/".$value->ART_CodigoInterno)."'  class='btn btn-card-agregar' data-id=$value->ART_CodigoInterno><i class='icon-plus'></i> Añadir <i class='icon-delivery'></i></a></div>
                    </div>
                </div>
            </div>";
                }
        }

        return $html;
        }


        public function banner(){
            $banner=array("carrusel"=>"","cuadricula"=>"","dia"=>"","footer"=>"");
            $banner["carrusel"]="  <!-- slider-->
            <section class='cnt-slider'>
               <div class='row-slider'>
                   <div class='item-slide' style='z-index:4'><img  class='item-slider-imagen' src='".asset("/img/public/REF/logo1 (1).jpg")."'></div>
                   <div class='item-slide' style='z-index:3'><img  class='item-slider-imagen' src='".asset("/img/public/REF/logo1 (2).jpg")."'></div>
                   <div class='item-slide' style='z-index:2'><img class='item-slider-imagen'  src='".asset("/img/public/REF/logo1 (5).jpg")."'></div>
                   <div class='item-slide' style='z-index:1'><img class='item-slider-imagen'  src='".asset("/img/public/REF/logo1 (4).jpg")."'></div>
               </div>
               <div class='cnt-button'>
                    <div class='ctn-text-progress'><span class='txt-txt-actual'>01</span>/<span>04</span></div>
                    <div class='ctn-progress-bar '>
                        <div class='progress-bar '></div>
                    </div>
                    <div class='cnt-btn'>
                        <button class='btn btn-prev'><i class='fa-solid icon-left-arrow'></i></button>
                        <button class='btn btn-next'><i class='fa-solid icon-rigth-arrow'></i></button>
                    </div>
               </div>

            </section>
           <!--End slider-->";

        $banner["footer"]=' <section class="w-100 df-ac-jc">
                        <div class="ctn-banner-footer"><img class="image-cover" src="'.asset("/img/public/REF/logo1 (5).jpg").'"></div>
                </section>';
        return $banner;
        }

        public function productoAll(){

            $tipo=$this->search->search_TipoArticulo("","",$this->search->cantidad_TipoArticulo());


            $html="";
            foreach($tipo as $keya =>$tipoval) {

                $html.="<section class='w-100'>";
                if($tipoval->TIPART_Estado!=3){
                $producto=$this->search->search_Articulo("TIPART_CodigoInterno",$tipoval->TIPART_CodigoInterno,$this->search->cantidad_Articulo());
                if(count($producto)>0){
                $html.="<div class='w-100 df-ac-jc'><div class='cnt-product-title'><span class='title-product-tipoVal '>".$tipoval->TIPART_Nombre."</span><img class='item-item-imagen' src='".asset("/img/public/REF/logo1 (1).jpg")."'></div></div>
                <section class='cnt--product'>";
                foreach ($producto as $key => $value) {
                    if($value->ART_Stock>0){
                    $html .="<div class='card-product' >
                            <div class='cnt-card-image'><img src='".asset($value->ART_Imagen)."' alt='' width='100%' height='100%' class='ob-c'></div>
                            <div class='cnt-card-info'>
                                <div class='txt-card-name' >$value->ART_Nombre</div>
                                <div class='txt-card-price'>S/. $value->ART_Precio</div>
                                <div class='txt-card-des'>$value->ART_Descripcion</div>
                                <div class='w-100 df'>

                                    <div class='w-100 mr-10'>
                                        <a href='".url("/Producto/".$value->ART_CodigoInterno)."'  class='btn btn-card-agregar' data-id=$value->ART_CodigoInterno><i class='icon-plus'></i> Añadir <i class='icon-delivery'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                }
                }
            }
                $html.="</section></section>";
            }

        return $html;
        }

        public function sucursal_actual($id){
            $distrito="SIN DISTRITO";
            $telefono="555 555 555";
            $sucursal=$this->search->search_Sucursal("SUC_CodigoInterno",$id);
            foreach($sucursal as $k=>$v){
                $data=$this->search->search_Distrito("DIS_CodigoInterno",$v->DIS_CodigoInterno);
                $telefono=$v->SUC_Telefono;
                foreach($data as $key=>$value){
                    $distrito=$value->DIS_Nombre;
                }
            }
            session(["sucursalid"=>$id]);
            return ["Distrito"=>$distrito,"Telefono"=>$telefono];
        }

      	 public function AgregarCarrito(Request $request){
            $cantidad=0;
            $total=0;
            $cantidadP=0;

            $usuario=session()->get("userId");
          	$id_pedido=0;
            if($usuario!=null){
                $pedido=$this->procedure->CRUD1("PROCEDURE_CREAR_PEDIDO",[":Usuario"=>$usuario]);
                        foreach($pedido as $key=>$value){
                                $id_pedido=$value->codigo;
                        }
                $cant_art=$request->input("cantidad");
                $articulo=$request->input("articulo");
                $artit=$request->input("artit");
                $cantidadP=$this->AgregarProducto($id_pedido,$articulo,$artit,$cant_art);
                $cantidad=$cantidadP["cantidad"];//
                $total=$cantidadP["total"];
            }
            return response()->json([
                "prueba"=>$cantidadP,
                "cantidad"=>$cantidad,
                "total"=>$total,
                "Nro_pedido"=>$id_pedido]);
        }

     		public function AgregarProducto($id,$articulo,$artit,$cantidad){
            $detalle=array("cantidad"=>0,"total"=>0);
            $parametro=array(
                ":PED_CodigoInterno"=>$id,
                ":ART_CodigoInterno"=>$articulo,
                ":PEDDET_Cantidad"=>$cantidad,
            );
            $pedidodetalle=$this->procedure->CRUD1("PROCEDURE_PEDIDO_STOCK",$parametro);
            $pedido=$this->search->search_PedidoDetalle("PED_CodigoInterno",$id,$this->search->cantidad_PedidoDetalle());
            foreach($pedido as $key=>$value){
                    $detalle["cantidad"]+=1;
                    $detalle["total"]+=($value->ART_Precio+$value->PEDDET_Cantidad);
            }
            return $detalle ;
        }
    }
?>
