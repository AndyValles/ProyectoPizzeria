<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pedido extends Model
{
    use HasFactory;

    private $PED_CodigoInterno;
    private $PED_Numero;
    private $PED_Total;
    private $PED_Descuento;
    private $PED_FechaRegistro;
    private $FORM_CodigoInterno;
    private $USU_CodigoInterno;
    private $TIPPED_CodigoInterno;
    private $PED_Comentario;
    private $PED_Estado;


    public function getArray():array{
        return [
            ":PED_CodigoInterno"=>$this->getPED_CodigoInterno(),
            ":PED_Numero"=>$this->getPED_Numero(),
            ":PED_Total"=>$this->getPED_Total(),
            ":PED_Descuento"=>$this->getPED_Descuento(),
            ":PED_FechaRegistro"=>$this->getPED_FechaRegistro(),
            ":FORM_CodigoInterno"=>$this->getFORM_CodigoInterno(),
            ":USU_CodigoInterno"=>$this->getUSU_CodigoInterno(),
            ":TIPPED_CodigoInterno"=>$this->getTIPPED_CodigoInterno(),
            ":PED_Comentario"=>$this->getPED_Comentario(),
            ":PED_Estado"=>$this->getPED_Estado(),
            ];
    }

    public function getArrayAll():array{
        return [
            ":PED_CodigoInterno"=>"%%",
            ":PED_Numero"=>"%%",
            ":PED_Total"=>"%%",
            ":PED_Descuento"=>"%%",
            ":PED_FechaRegistro"=>"%%",
            ":FORM_CodigoInterno"=>"%%",
            ":USU_CodigoInterno"=>"%%",
            ":TIPPED_CodigoInterno"=>"%%",
            ":PED_Comentario"=>"%%",
            ":PED_Estado"=>"%%",
        ];
    }
}
