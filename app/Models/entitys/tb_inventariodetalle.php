<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_inventariodetalle extends Model
{
    use HasFactory;

    private $INVDET_CodigoInterno;
    private $INVDET_FechaRegistro;
    private $INVDET_FechaModificacion;
    private $INVDET_StockIngreso;
    private $INVDET_StockModificado;
    private $INV_CodigoInterno;


    public function getArray():array{
        return [
            ":INVDET_CodigoInterno"=>$this->getINVDET_CodigoInterno(),
            ":INVDET_FechaRegistro"=>$this->getINVDET_FechaRegistro(),
            ":INVDET_FechaModificacion"=>$this->getINVDET_FechaModificacion(),
            ":INVDET_StockIngreso"=>$this->getINVDET_StockIngreso(),
            ":INVDET_StockModificado"=>$this->getINVDET_StockModificado(),
            ":INV_CodigoInterno"=>$this->getINV_CodigoInterno(),
        ];
    }

    public function getArrayAll():array{
        return [
            ":INVDET_CodigoInterno"=>"%%",
            ":INVDET_FechaRegistro"=>"%%",
            ":INVDET_FechaModificacion"=>"%%",
            ":INVDET_StockIngreso"=>"%%",
            ":INVDET_StockModificado"=>"%%",
            ":INV_CodigoInterno"=>"%%",

        ];
    }

    /**
     * Get the value of INVDET_CodigoInterno
     */
    public function getINVDET_CodigoInterno()
    {
        return $this->INVDET_CodigoInterno;
    }

    /**
     * Set the value of INVDET_CodigoInterno
     *
     * @return  self
     */
    public function setINVDET_CodigoInterno($INVDET_CodigoInterno)
    {
        $this->INVDET_CodigoInterno = $INVDET_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of INVDET_FechaRegistro
     */
    public function getINVDET_FechaRegistro()
    {
        return $this->INVDET_FechaRegistro;
    }

    /**
     * Set the value of INVDET_FechaRegistro
     *
     * @return  self
     */
    public function setINVDET_FechaRegistro($INVDET_FechaRegistro)
    {
        $this->INVDET_FechaRegistro = $INVDET_FechaRegistro;

        return $this;
    }

    /**
     * Get the value of INVDET_FechaModificacion
     */
    public function getINVDET_FechaModificacion()
    {
        return $this->INVDET_FechaModificacion;
    }

    /**
     * Set the value of INVDET_FechaModificacion
     *
     * @return  self
     */
    public function setINVDET_FechaModificacion($INVDET_FechaModificacion)
    {
        $this->INVDET_FechaModificacion = $INVDET_FechaModificacion;

        return $this;
    }

    /**
     * Get the value of INVDET_StockIngreso
     */
    public function getINVDET_StockIngreso()
    {
        return $this->INVDET_StockIngreso;
    }

    /**
     * Set the value of INVDET_StockIngreso
     *
     * @return  self
     */
    public function setINVDET_StockIngreso($INVDET_StockIngreso)
    {
        $this->INVDET_StockIngreso = $INVDET_StockIngreso;

        return $this;
    }

    /**
     * Get the value of INVDET_StockModificado
     */
    public function getINVDET_StockModificado()
    {
        return $this->INVDET_StockModificado;
    }

    /**
     * Set the value of INVDET_StockModificado
     *
     * @return  self
     */
    public function setINVDET_StockModificado($INVDET_StockModificado)
    {
        $this->INVDET_StockModificado = $INVDET_StockModificado;

        return $this;
    }

    /**
     * Get the value of INV_CodigoInterno
     */
    public function getINV_CodigoInterno()
    {
        return $this->INV_CodigoInterno;
    }

    /**
     * Set the value of INV_CodigoInterno
     *
     * @return  self
     */
    public function setINV_CodigoInterno($INV_CodigoInterno)
    {
        $this->INV_CodigoInterno = $INV_CodigoInterno;

        return $this;
    }
}
