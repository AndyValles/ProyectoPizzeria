<?php

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_tipoarticulo extends Model
{
    use HasFactory;
    private $TIPART_Codigo;
    private $TIPART_Nombre;
    private $TIPART_Estado;

    public function getTIPART_Codigo()
    {
        return $this->TIPART_Codigo;
    }

    public function setTIPART_Codigo($TIPART_Codigo)
    {
        $this->TIPART_Codigo = $TIPART_Codigo;

        return $this;
    }
    public function getTIPART_Nombre()
    {
        return $this->TIPART_Nombre;
    }

    public function setTIPART_Nombre($TIPART_Nombre)
    {
        $this->TIPART_Nombre = $TIPART_Nombre;

        return $this;
    }

    public function getTIPART_Estado()
    {
        return $this->TIPART_Estado;
    }

    public function setTIPART_Estado($TIPART_Estado)
    {
        $this->TIPART_Estado = $TIPART_Estado;

        return $this;
    }


    public function getArray(){
            return array(
                ':TIPART_Codigo' => $this->TIPART_Codigo,
                ':TIPART_Nombre' => $this->TIPART_Nombre,
                ':TIPART_Estado' => $this->TIPART_Estado,

            );
        }

        public function getArrayAll(){
            return array(
                ':TIPART_Codigo' => "%%",
                ':TIPART_Nombre' => "%%",
                ':TIPART_Estado' => "1",
            );
        }



}
?>
