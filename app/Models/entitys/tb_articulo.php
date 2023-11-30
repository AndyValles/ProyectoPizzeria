<?php

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_articulo extends Model{

    private $ART_Codigo;
    private $ART_Nombre;
    private $ART_Descripcion;
    private $ART_Precio;
    private $ART_Stock;
    private $ART_FechaIngreso;
    private $ART_Imagen;
    private $ART_Estado;
    private $TIPOARTICULO;
    private $MAR_CodigoInterno;
    private $PROVEEDOR;

    public function getART_Codigo(){return $this->ART_Codigo;}
    public function setART_Codigo($ART_Codigo){
        $this->ART_Codigo = $ART_Codigo;
        return $this;
    }
    public function getART_Nombre(){return $this->ART_Nombre;}
    public function setART_Nombre($ART_Nombre){
        $this->ART_Nombre = $ART_Nombre;
        return $this;
    }
    public function getART_Descripcion(){return $this->ART_Descripcion;}

    public function setART_Descripcion($ART_Descripcion){
        $this->ART_Descripcion = $ART_Descripcion;
        return $this;
    }

    public function getPROVEEDOR(){return $this->PROVEEDOR;}

    public function setPROVEEDOR($PROVEEDOR){
        $this->PROVEEDOR = $PROVEEDOR;
        return $this;
    }

    public function getMAR_CodigoInterno(){return $this->MAR_CodigoInterno;}
    public function setMAR_CodigoInterno($MAR_CodigoInterno){
        $this->MAR_CodigoInterno = $MAR_CodigoInterno;
        return $this;
    }
    public function getTIPOARTICULO(){return $this->TIPOARTICULO;}
    public function setTIPOARTICULO($TIPOARTICULO){
        $this->TIPOARTICULO = $TIPOARTICULO;
        return $this;
    }

    public function getART_Estado(){return $this->ART_Estado;}
    public function setART_Estado($ART_Estado){
        $this->ART_Estado = $ART_Estado;
        return $this;
    }
    public function getART_FechaIngreso(){return $this->ART_FechaIngreso;}
    public function setART_FechaIngreso($ART_FechaIngreso){
        $this->ART_FechaIngreso = $ART_FechaIngreso;
        return $this;
    }
    public function getART_Imagen(){return $this->ART_Imagen;}
    public function setART_Imagen($ART_Imagen){
        $this->ART_Imagen = $ART_Imagen;
        return $this;
    }
    public function getART_Precio(){return $this->ART_Precio;}
    public function setART_Precio($ART_Precio){
        $this->ART_Precio = $ART_Precio;
        return $this;
    }
    public function getART_Stock(){return $this->ART_Stock;}
    public function setART_Stock($ART_Stock){
        $this->ART_Stock = $ART_Stock;
        return $this;
    }

    public function getArray(){
        return array(
                    ':ART_Codigo' => $this->ART_Codigo,
                    ':ART_Nombre' => $this->ART_Nombre,
                    ':ART_Descripcion' => $this->ART_Descripcion,
                    ':ART_Precio' => $this->ART_Precio,
                    ':ART_Stock' => $this->ART_Stock,
                    ':ART_FechaIngreso' => $this->ART_FechaIngreso,
                    ':ART_Imagen'=>$this->ART_Imagen,
                    ':ART_Estado' => $this->ART_Estado,
                    ':TIPOARTICULO' => $this->TIPOARTICULO,
                    ':MAR_CodigoInterno' => $this->MAR_CodigoInterno,
                    ':PROVEEDOR' => $this->PROVEEDOR
                );
    }

    public function getArrayAll(){
        return array(
                    ':ART_Codigo' => "%%",
                    ':ART_Nombre' => "%%",
                    ':ART_Descripcion' => "%%",
                    ':ART_Precio' => "%%",
                    ':ART_Stock' => "%%",
                    ':ART_FechaIngreso' => "%%",
                    ':ART_Estado' => "1",
                    ':TIPOARTICULO' => "%%",
                    ':MAR_CodigoInterno' => "%%",
                    ':PROVEEDOR' => "%%"
                );
    }
}

?>
