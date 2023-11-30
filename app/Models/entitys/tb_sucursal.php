<?php
namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_sucursal extends Model
{
    use HasFactory;
    private $SUC_CodigoInterno;
    private $DIS_CodigoInterno;
    private $SUC_Referencia;
    private $SUC_Direccion;
    private $SUC_HorasAtencion;
    private $SUC_URL;
    private $SUC_Telefono;
    private $SUC_Estado;



    public function getArray(){
        return [
                    ':SUC_CodigoInterno' => $this->SUC_CodigoInterno,
                    ':DIS_CodigoInterno' => $this->DIS_CodigoInterno,
                    ':SUC_Referencia' => $this->SUC_Referencia,
                    ':SUC_Direccion' => $this->SUC_Direccion,
                    ':SUC_HorasAtencion' => $this->SUC_HorasAtencion,
                    ':SUC_Telefono' => $this->SUC_Telefono,
                    ':SUC_URL' => $this->SUC_URL,
                    ':SUC_Estado' => $this->SUC_Estado
                ];
    }

    public function getArrayAll(){
        return [
                    ':SUC_CodigoInterno' => "%%",
                    ':DIS_CodigoInterno' => "%%",
                    ':SUC_Referencia' => "%%",
                    ':SUC_HorasAtencion' => "%%",
                    ':SUC_Estado' => "1"
                ];
    }

    /**
     * Get the value of SUC_Estado
     */
    public function getSUC_Estado()
    {
        return $this->SUC_Estado;
    }


    public function setSUC_Estado($SUC_Estado)
    {
        $this->SUC_Estado = $SUC_Estado;

        return $this;
    }

    public function getSUC_Telefono()
    {
        return $this->SUC_Telefono;
    }


    public function setSUC_Telefono($SUC_Telefono)
    {
        $this->SUC_Telefono = $SUC_Telefono;

        return $this;
    }

    public function getSUC_URL()
    {
        return $this->SUC_URL;
    }

    public function setSUC_URL($SUC_URL)
    {
        $this->SUC_URL = $SUC_URL;

        return $this;
    }

    public function getSUC_HorasAtencion()
    {
        return $this->SUC_HorasAtencion;
    }

    public function setSUC_HorasAtencion($SUC_HorasAtencion)
    {
        $this->SUC_HorasAtencion = $SUC_HorasAtencion;

        return $this;
    }

    public function getSUC_Direccion()
    {
        return $this->SUC_Direccion;
    }

    public function setSUC_Direccion($SUC_Direccion)
    {
        $this->SUC_Direccion = $SUC_Direccion;

        return $this;
    }

    public function getSUC_Referencia()
    {
        return $this->SUC_Referencia;
    }

    public function setSUC_Referencia($SUC_Referencia)
    {
        $this->SUC_Referencia = $SUC_Referencia;

        return $this;
    }

    public function getDIS_CodigoInterno()
    {
        return $this->DIS_CodigoInterno;
    }

    public function setDIS_CodigoInterno($DIS_CodigoInterno)
    {
        $this->DIS_CodigoInterno = $DIS_CodigoInterno;

        return $this;
    }

    public function getSUC_CodigoInterno()
    {
        return $this->SUC_CodigoInterno;
    }

    public function setSUC_CodigoInterno($SUC_CodigoInterno)
    {
        $this->SUC_CodigoInterno = $SUC_CodigoInterno;

        return $this;
    }
}
?>
