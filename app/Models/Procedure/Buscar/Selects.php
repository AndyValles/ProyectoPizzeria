<?php
 namespace App\Models\Procedure\Buscar;

 class Selects{

    public function __construct() {

    }


    public function select_lugar($value){
        $bus_item=new Busqueda("PROCEDURE_SELECT_Lugar");
        return $bus_item->select_table("BUS_LUG_".$value,"LUG_CodigoInterno","LUG_Nombre");
    }

    public function select_provincia($value){
        $bus_item=new Busqueda("PROCEDURE_SELECT_Provincia");
        return $bus_item->select_table("BUS_PROV_".$value,"PROV_CodigoInterno","PROV_Nombre");
    }

    public function select_distrito($value){
        $bus_item=new Busqueda("PROCEDURE_SELECT_Distrito");
        return $bus_item->select_table("BUS_DIS_".$value,"DIS_CodigoInterno","DIS_Nombre");
    }

    public function select_sexo($value){
        $bus_item=new Busqueda("PROCEDURE_SELECT_Sexo");
        return $bus_item->select_table("BUS_SEX_".$value,"SEX_CodigoInterno","SEX_Nombre");
    }

    public function select_item($value){
        $bus_item=new Busqueda("PROCEDURE_SELECT_Item");
        return $bus_item->select_table("BUS_ITEM_".$value,"ITEM_CodigoInterno","ITEM_descripcion");
    }

    public function select_Tipitem($value){
        $bus_tipitem=new Busqueda("PROCEDURE_SELECT_TipoItem");
        return $bus_tipitem->select_table("BUS_TIPIT_".$value,"TIPIT_CodigoInterno","TIPIT_Nombre");
    }

    public function select_Marca($value){
        $bus_tipitem=new Busqueda("PROCEDURE_SELECT_Marca");
        return $bus_tipitem->select_table("BUS_MAR_".$value,"MAR_CodigoInterno","MAR_Nombre");
    }

    public function select_Proveedor($value){
        $bus_tipitem=new Busqueda("PROCEDURE_SELECT_Proveedor");
        return $bus_tipitem->select_table("BUS_PROV_".$value,"PROV_CodigoInterno","PROV_Nombre");
    }

    public function select_Tipoarticulo($value,$tipo="C"){
        $bus_tipitem=new Busqueda("PROCEDURE_SELECT_TipoArticulo");
        return $bus_tipitem->select_table("BUS_TIPART_".$value,"TIPART_CodigoInterno","TIPART_Nombre");
    }

    public function select_articulo($value,$tipo="C"){
        $bus_tipitem=new Busqueda("PROCEDURE_SELECT_Articulo");
        return $bus_tipitem->select_table($value,"ART_CodigoInterno","ART_Nombre");
    }

    public function select_Tipopedido($value){
        $bus_tipitem=new Busqueda("PROCEDURE_SELECT_TipoPedido");
        return $bus_tipitem->select_table("BUS_TIPPED_".$value,"TIPED_CodigoInterno","TIPED_Nombre");
    }

    public function select_Tipobanner($value){
        $bus_tipitem=new Busqueda("PROCEDURE_SELECT_TipoBanner");
        return $bus_tipitem->select_table("BUS_TIPBAN_".$value,"TIPBAN_CodigoInterno","TIPBAN_Nombre");
    }

}
?>
