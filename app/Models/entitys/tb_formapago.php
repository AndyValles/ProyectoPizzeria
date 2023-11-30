<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_formapago extends Model
{
    use HasFactory;

    private  $FORM_CodigoInterno;
    private  $FORM_Nombre;
    private  $FORM_Identificador;
    private  $FORM_Estado;

    public function getArray():array{
        return [
            ":FORM_CodigoInterno"=>$this->getFORM_CodigoInterno(),
            ":FORM_Nombre"=>$this->getFORM_Nombre(),
            ":FORM_Identificador"=>$this->getFORM_Identificador(),
            ":FORM_Estado"=>$this->getFORM_Estado(),
        ];
    }

    public function getArrayAll():array{
        return [
            ":FORM_CodigoInterno"=>"%%",
            ":FORM_Nombre"=>"%%",
            ":FORM_Identificador"=>"%%",
            ":FORM_Estado"=>"%%",

        ];
    }

    public function getFORM_CodigoInterno()
    {
        return $this->FORM_CodigoInterno;
    }

    public function setFORM_CodigoInterno($FORM_CodigoInterno)
    {
        $this->FORM_CodigoInterno = $FORM_CodigoInterno;

        return $this;
    }


    public function getFORM_Nombre()
    {
        return $this->FORM_Nombre;
    }

    public function setFORM_Nombre($FORM_Nombre)
    {
        $this->FORM_Nombre = $FORM_Nombre;

        return $this;
    }

    public function getFORM_Identificador()
    {
        return $this->FORM_Identificador;
    }

    public function setFORM_Identificador($FORM_Identificador)
    {
        $this->FORM_Identificador = $FORM_Identificador;

        return $this;
    }


    public function getFORM_Estado()
    {
        return $this->FORM_Estado;
    }

    public function setFORM_Estado($FORM_Estado)
    {
        $this->FORM_Estado = $FORM_Estado;

        return $this;
    }
}
