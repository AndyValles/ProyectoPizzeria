<?php
 namespace App\Models\Procedure\Buscar;

class search{
    private $marca=array("MAR_CodigoInterno","MAR_Nombre","MAR_Estado");
    private $administrador=array("ADM_CodigoInterno","USU_CodigoInterno","ADM_Write","ADM_READ","ADM_VIEW","ADM_Estado");
    private $articulo=array("ART_CodigoInterno","ART_Nombre","ART_Descripcion","ART_Precio","ART_Stock","ART_FechaIngreso","ART_Estado","TIPART_CodigoInterno","MAR_CodigoInterno","PROV_CodigoInterno");
    private $banner=array("BAN_CodigoInterno","TIPBAN_CodigoInterno","PAQ_CodigoInterno","BAN_Estado");
    private $cuotakm=array("CKM_CodigoInterno","CKM_Metros","CKM_Precio","CKM_Estado");
    private $distrito=array("DIS_CodigoInterno","DIS_Nombre","DIS_Estado");
    private $formapago=array("FORM_CodigoInterno","FORM_Nombre","FORM_Estado");
    private $lugar=array("LUG_CodigoInterno","LUG_Nombre","LUG_Estado");
    private $menu=array("MEN_CodigoInterno","MEN_CodigoPadre","MEN_Nombre","MEN_Tipo","MEN_Estado");
    private $proveedor=array("PROV_CodigoInterno","PROV_Nombre","PROV_Identificador","PROV_FechaRegistro","PROV_Estado");
    private $provincia=array("PROV_CodigoInterno","PROV_Nombre","PROV_Estado");
    private $item=array("ITEM_CodigoInterno","ITEM_precio","TIPIT_CodigoInterno","ITEM_Estado");
    private $sexo=array("SEX_CodigoInterno","SEX_Nombre","SEX_Identificador","SEX_Estado");
    private $tipoarticulo=array("TIPART_CodigoInterno","TIPART_Nombre","TIPART_Estado");
    private $tipobanner=array("TIPBAN_CodigoInterno","TIPBAN_Nombre","TIPBAN_Estado");
    private $pedido=array("PED_CodigoInterno","PED_Numero","PED_Total","PED_FechaRegistro","USU_CodigoInterno","PED_Estado");
    private $tipopedido=array("TIPPED_CodigoInterno","TIPPED_Nombre","TIPPED_Estado");
    private $tipoitem=array("TIPIT_CodigoInterno","TIPIT_Nombre","TIPIT_Estado");
    private $ubicacion=array("UBI_CodigoInterno","LUG_CodigoInterno","DIS_CodigoInterno","PROV_CodigoInterno","UBI_Estado","UBI_Direccion","UBI_Calle","USU_CodigoInterno");
    private $usuario=array('USU_CodigoInterno','USU_DNI','USU_PriNombre','USU_SegNombre','USU_ApePaterno','USU_ApeMaterno','USU_FechaNacimiento','USU_FechaRegistro','USU_Estado','SEXO');
    private $sucursal=array("SUC_CodigoInterno","DIS_CodigoInterno","SUC_Referencia","SUC_HorasAtencion","SUC_Estado");
    private $inventario=array("INV_CodigoInterno","INV_FechaRegistro","INV_StockModificado","ART_CodigoInterno","ITEM_CodigoInterno","INV_Estado");
    private $pedidodetalle=array("PEDDET_CodigoInterno","PED_CodigoInterno","ART_CodigoInterno","PEDDET_Cantidad");
    public function __construct() {

    }

   public function search($nameP,$parametro,$limit,$offset){
		$S_producto=new Busqueda($nameP);

		return $S_producto->Busqueda($parametro,$limit,$offset);
  }

  public function param($value,$parValue,$val){
    $param=array();
    $data=$value;
    for($i=0;$i<count($data);$i++){
        if($data[$i]==$parValue){
            $param[":".$data[$i]]=$val;
        }else{
            $param[":".$data[$i]]="%%";
        }
    }
    return $param;
  }

  public function search_PedidoDetalle($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_PedidoDetalle");
    return $S_producto->Busqueda($this->param($this->pedidodetalle,$parValue,$val),$limit,0);
  }

  public function search_Sucursal($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Sucursal");
    return $S_producto->Busqueda($this->param($this->sucursal,$parValue,$val),$limit,0);
  }

  public function search_Marca($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Marca");
    return $S_producto->Busqueda($this->param($this->marca,$parValue,$val),$limit,0);
  }

  public function search_Administrador($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Administrador");
    return $S_producto->Busqueda($this->param($this->administrador,$parValue,$val),$limit,0);
  }

  public function search_Articulo($parValue="",$val="%%",$limit=1,$offset=0){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Articulo");
    return $S_producto->Busqueda($this->param($this->articulo,$parValue,$val),$limit,$offset);
  }

  public function search_Banner($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Banner");
    return $S_producto->Busqueda($this->param($this->banner,$parValue,$val),$limit,0);
  }

  public function search_CuotaKm($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Cuotakm");
    return $S_producto->Busqueda($this->param($this->cuotakm,$parValue,$val),$limit,0);
  }

  public function search_Distrito($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Distrito");
    return $S_producto->Busqueda($this->param($this->distrito,$parValue,$val),$limit,0);
  }

  public function search_Formapago($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Formapago");
    return $S_producto->Busqueda($this->param($this->formapago,$parValue,$val),$limit,0);
  }

  public function search_Item($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Item");
    return $S_producto->Busqueda($this->param($this->item,$parValue,$val),$limit,0);
  }

  public function search_Lugar($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Lugar");
    return $S_producto->Busqueda($this->param($this->lugar,$parValue,$val),$limit,0);
  }

  public function search_Menu($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Menu");
    return $S_producto->Busqueda($this->param($this->menu,$parValue,$val),$limit,0);
  }

  public function search_Proveedor($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Proveedor");
    return $S_producto->Busqueda($this->param($this->proveedor,$parValue,$val),$limit,0);
  }

  public function search_Provincia($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Provincia");
    return $S_producto->Busqueda($this->param($this->provincia,$parValue,$val),$limit,0);
  }

  public function search_Sexo($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_Sexo");
    return $S_producto->Busqueda($this->param($this->sexo,$parValue,$val),$limit,0);
  }

  public function search_TipoArticulo($parValue="",$val="%%",$limit=1){
    $S_producto=new Busqueda("PROCEDURE_SELECT_TipoArticulo");
    return $S_producto->Busqueda($this->param($this->tipoarticulo,$parValue,$val),$limit,0);
    }

    public function search_TipoBanner($parValue="",$val="%%",$limit=1){
        $S_producto=new Busqueda("PROCEDURE_SELECT_TipoBanner");
        return $S_producto->Busqueda($this->param($this->tipobanner,$parValue,$val),$limit,0);
    }

    public function search_TipoPedido($parValue="",$val="%%",$limit=1){
        $S_producto=new Busqueda("PROCEDURE_SELECT_TipoPedido");
        return $S_producto->Busqueda($this->param($this->tipopedido,$parValue,$val),$limit,0);
    }

    public function search_TipoItem($parValue="",$val="%%",$limit=1){
        $S_producto=new Busqueda("PROCEDURE_SELECT_TipoItem");
        return $S_producto->Busqueda($this->param($this->tipoitem,$parValue,$val),$limit,0);
    }

    public function search_Ubicacion($parValue="",$val="%%",$limit=1){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Ubicacion");
        return $S_producto->Busqueda($this->param($this->ubicacion,$parValue,$val),$limit,0);
    }

    public function search_Usuario($parValue="",$val="%%",$limit=1){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Usuario");
        return $S_producto->Busqueda($this->param($this->usuario,$parValue,$val),$limit,0);
    }

    public function search_pedido($parValue="",$val="%%",$limit=1){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Pedido");
        return $S_producto->Busqueda($this->param($this->pedido,$parValue,$val),$limit,0);
    }

    public function search_Inventario($parValue="",$val="%%",$limit=1){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Inventario");
        return $S_producto->Busqueda($this->param($this->inventario,$parValue,$val),$limit,0);
    }


    /*Cantidad*/
    public function cantidad_PedidoDetalle($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_PedidoDetalle");
        return $S_producto->CantidaTotales($this->param($this->pedidodetalle,$parValue,$val));
      }

    public function cantidad_Inventario($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Inventario");
        return $S_producto->CantidaTotales($this->param($this->inventario,$parValue,$val));
    }

    public function cantidad_Sucursal($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Sucursal");
        return $S_producto->CantidaTotales($this->param($this->sucursal,$parValue,$val));
    }

    public function cantidad_Marca($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Marca");
        return $S_producto->CantidaTotales($this->param($this->marca,$parValue,$val));
      }

      public function cantidad_Administrador($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Administrador");
        return $S_producto->CantidaTotales($this->param($this->administrador,$parValue,$val));
      }

      public function cantidad_Articulo($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Articulo");
        return $S_producto->CantidaTotales($this->param($this->articulo,$parValue,$val));
      }

      public function cantidad_Banner($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Banner");
        return $S_producto->CantidaTotales($this->param($this->banner,$parValue,$val));
      }

      public function cantidad_CuotaKm($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Cuotakm");
        return $S_producto->CantidaTotales($this->param($this->cuotakm,$parValue,$val));
      }

      public function cantidad_Distrito($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Distrito");
        return $S_producto->CantidaTotales($this->param($this->distrito,$parValue,$val));
      }

      public function cantidad_Formapago($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Formapago");
        return $S_producto->CantidaTotales($this->param($this->formapago,$parValue,$val));
      }

      public function cantidad_Item($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Item");
        return $S_producto->CantidaTotales($this->param($this->item,$parValue,$val));
      }

      public function cantidad_Lugar($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Lugar");
        return $S_producto->CantidaTotales($this->param($this->lugar,$parValue,$val));
      }

      public function cantidad_Menu($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Menu");
        return $S_producto->CantidaTotales($this->param($this->menu,$parValue,$val));
      }

      public function cantidad_Proveedor($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Proveedor");
        return $S_producto->CantidaTotales($this->param($this->proveedor,$parValue,$val));
      }

      public function cantidad_Provincia($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Provincia");
        return $S_producto->CantidaTotales($this->param($this->provincia,$parValue,$val));
      }

      public function cantidad_Sexo($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_Sexo");
        return $S_producto->CantidaTotales($this->param($this->sexo,$parValue,$val));
      }

      public function cantidad_TipoArticulo($parValue="",$val="%%"){
        $S_producto=new Busqueda("PROCEDURE_SELECT_TipoArticulo");
        return $S_producto->CantidaTotales($this->param($this->tipoarticulo,$parValue,$val));
        }

        public function cantidad_TipoBanner($parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_TipoBanner");
            return $S_producto->CantidaTotales($this->param($this->tipobanner,$parValue,$val));
        }

        public function cantidad_TipoPedido($parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_TipoPedido");
            return $S_producto->CantidaTotales($this->param($this->tipopedido,$parValue,$val));
        }

        public function cantidad_TipoItem(String $parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_TipoItem");
            return $S_producto->CantidaTotales($this->param($this->tipoitem,$parValue,$val));
        }

        public function cantidad_Ubicacion(String $parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_Ubicacion");
            return $S_producto->CantidaTotales($this->param($this->ubicacion,$parValue,$val));
        }

        public function cantidad_Usuario(String $parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_Usuario");
            return $S_producto->CantidaTotales($this->param($this->usuario,$parValue,$val));
        }

        public function cantidad_pedido(String $parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_Pedido");
            return $S_producto->CantidaTotales($this->param($this->pedido,$parValue,$val));
        }

        /*Select*/
        public function select_Articulo($parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_Articulo");
            $parametros=$this->param($this->articulo,$parValue,$val);
            $cantidad=$S_producto->CantidaTotales($parametros);
            return  $this->input_select($S_producto->Busqueda($parametros,$cantidad,0),"ART_CodigoInterno","ART_CodigoInterno","ART_Nombre");
        }

        public function select_Item($parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_Item");
            $parametros=$this->param($this->item,$parValue,$val);
            $cantidad=$S_producto->CantidaTotales($parametros);
            return  $this->input_select($S_producto->Busqueda($parametros,$cantidad,0),"ITEM_CodigoInterno","ITEM_CodigoInterno","ITEM_Descripcion");
        }

        public function select_Usuario($parValue="",$val="%%"){
            $S_producto=new Busqueda("PROCEDURE_SELECT_Usuario");
            $parametros=$this->param($this->usuario,$parValue,$val);
            $cantidad=$S_producto->CantidaTotales($parametros);
            return  $this->input_select($S_producto->Busqueda($parametros,$cantidad,0),"USU_CodigoInterno","USU_CodigoInterno","USU_PriNombre");
        }

        public function select_TipoItem($parValue="",$val="%%"){
            return $this->Select_box_procedure("PROCEDURE_SELECT_TipoItem",
            $this->tipoitem,"TIPIT_CodigoInterno","TIPIT_Nombre",$val);
        }

        public function   select_distrito($parValue="",$val="%%"){
            return $this->Select_box_procedure("PROCEDURE_SELECT_Distrito",
            $this->distrito,"DIS_CodigoInterno","DIS_Nombre",$val);
        }

        public function  select_sexo($parValue="",$val="%%"){
            return $this->Select_box_procedure("PROCEDURE_SELECT_Sexo",
            $this->sexo,"SEX_CodigoInterno","SEX_Nombre",$val);
        }

        public function  select_Marca($val="%%"){
            return $this->Select_box_procedure("PROCEDURE_SELECT_Marca",
            $this->marca,"MAR_CodigoInterno","MAR_Nombre",$val);
        }

        public function  select_Proveedor($val="%%"){
            return $this->Select_box_procedure("PROCEDURE_SELECT_Proveedor",
            $this->proveedor,"PROV_CodigoInterno","PROV_Nombre",$val);
        }

        public function  select_Tipoarticulo($val="%%"){
            return $this->Select_box_procedure("PROCEDURE_SELECT_Tipoarticulo",
            $this->tipoarticulo,"TIPART_CodigoInterno","TIPART_Nombre",$val);
        }

        public function Select_box_procedure($nameProcedure,$entidad,$id,$name,$val="%%"){
            $S_producto=new Busqueda($nameProcedure);
            $parametros=$this->param($entidad,"","%%");
            $cantidad=$S_producto->CantidaTotales($parametros);
            return  $this->box_select($S_producto->Busqueda($parametros,$cantidad,0),$id,$id,$name,$val);
        }

        public function input_select($busqueda,$nameCodigo,$value,$name){
            $val=array();$nam=array();$a=0;
            $html=' <div class="w-100">
                    <section class="ctn-input-drop">
                        <i class="input-drop-cc icon-search"></i>
                        <input type="hidden" id="'.$nameCodigo.'"  name="'.$nameCodigo.'"  value="" class="input Codigo-'.$nameCodigo.' w-100 bg-transparent">
                        <input type="text" id="lista-'.$nameCodigo.'" name="lista" class="input lista w-100 bg-transparent" data-value="'.$nameCodigo.'">
                    </section>
            <div class="ctn-list listar-'.$nameCodigo.'">';
            foreach($busqueda as $key=>$val1){
                foreach($val1 as $key1=>$d){
                    if($key1==$value){$val[$a]=$d;}
                    if($key1==$name){$nam[$a]=$d;}
                }
                $a=$a+1;
            }
            for($i=0;$i<count($val);$i++){
                if(count($val)==count($nam)){
                    $html.='<article class="item-list"><button class="btn ctn-btn-list" data-value="'.$nameCodigo.'" data-id="'.$val[$i].'">'. $nam[$i].'</button></article>';
                }
            }
            $html.='</div></div>';
            return $html;
        }




        public function box_select($busqueda,$nameid,$id,$valor,$info="%%"){
            $data="";$select="Seleccione";
            $val=$this-> busqueda_parametro($busqueda,$id,$valor);
            for($i=0;$i<count($val["values"]);$i++){
                if($val["values"][$i]==$info){
                    $data=$val["values"][$i];
                    $select=$val["nombre"][$i];
                }
            }
            $html='  <section class="ctn-drop-select">
                        <article class="input-drop-select"><button class="btn btn-input-select" id="'.$nameid.'" data-id="'.$data.'"><span class="info-input-'.$nameid.'">'.$select.'</span><i class="icon-bottom icon-'.$nameid.'"></i></button></article>
                        <article class="ctn-drop box-'.$nameid.'">
                        <div class="w-100"><button class="btn btn-select" data-value="'.$nameid.'" data-id="">Seleccione</button></div>';

            for($i=0;$i<count($val["values"]);$i++){
                if(count($val["values"])==count($val["nombre"])){
                    $html.='<div class="w-100"><button class="btn btn-select" data-value="'.$nameid.'" data-id="'.$val["values"][$i].'">'. $val["nombre"][$i].'</button></div>';
                }
            }
            $html.='</article></section>';
            return $html;
        }


        public function busqueda_parametro($busqueda,$id,$valor){
            $val=array();$nam=array();$a=0;
            foreach($busqueda as $key=>$val1){
                foreach($val1 as $key1=>$d){
                    if($key1==$id){$val[$a]=$d;}
                    if($key1==$valor){$nam[$a]=$d;}
                }
                $a=$a+1;
            }

            return ["values"=>$val,"nombre"=>$nam];
        }

  public function search_Product(){
		$S_producto=new Busqueda("PROCEDURE_SELECT_Articulo");
		return $S_producto->BusquedaParametro("1","ART_Estado");
  }






}
?>
