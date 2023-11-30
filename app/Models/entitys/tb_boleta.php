<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_boleta extends Model
{
    use HasFactory;

    private $BOL_CodigoInterno;
    private $BOL_Numero;
    private $BOL_Serie;
    private $BOL_FechaRegistro;
    private $BOL_Total;
    private $PED_CodigoInterno;

    public function getArray():array{
        return [
            ":BOL_CodigoInterno"=>$this->getBOL_CodigoInterno(),
            ":BOL_Numero"=>$this->getBOL_Numero(),
            ":BOL_Serie"=>$this->getBOL_Serie(),
            ":BOL_FechaRegistro"=>$this->getBOL_FechaRegistro(),
            ":BOL_Total"=>$this->getBOL_Total(),
            ":PED_CodigoInterno"=>$this->getPED_CodigoInterno(),

            ];
    }

    public function getArrayAll():array{
        return [
            ":BOL_CodigoInterno"=>"%%",
            ":BOL_Numero"=>"%%",
            ":BOL_Serie"=>"%%",
            ":BOL_FechaRegistro"=>"%%",
            ":BOL_Total"=>"%%",
            ":PED_CodigoInterno"=>"%%",

        ];
    }

    /**
     * Get the value of BOL_CodigoInterno
     */
    public function getBOL_CodigoInterno()
    {
        return $this->BOL_CodigoInterno;
    }

    /**
     * Set the value of BOL_CodigoInterno
     *
     * @return  self
     */
    public function setBOL_CodigoInterno($BOL_CodigoInterno)
    {
        $this->BOL_CodigoInterno = $BOL_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of BOL_Numero
     */
    public function getBOL_Numero()
    {
        return $this->BOL_Numero;
    }

    /**
     * Set the value of BOL_Numero
     *
     * @return  self
     */
    public function setBOL_Numero($BOL_Numero)
    {
        $this->BOL_Numero = $BOL_Numero;

        return $this;
    }

    /**
     * Get the value of BOL_Serie
     */
    public function getBOL_Serie()
    {
        return $this->BOL_Serie;
    }

    /**
     * Set the value of BOL_Serie
     *
     * @return  self
     */
    public function setBOL_Serie($BOL_Serie)
    {
        $this->BOL_Serie = $BOL_Serie;

        return $this;
    }

    /**
     * Get the value of BOL_FechaRegistro
     */
    public function getBOL_FechaRegistro()
    {
        return $this->BOL_FechaRegistro;
    }

    /**
     * Set the value of BOL_FechaRegistro
     *
     * @return  self
     */
    public function setBOL_FechaRegistro($BOL_FechaRegistro)
    {
        $this->BOL_FechaRegistro = $BOL_FechaRegistro;

        return $this;
    }

    /**
     * Get the value of BOL_Total
     */
    public function getBOL_Total()
    {
        return $this->BOL_Total;
    }

    /**
     * Set the value of BOL_Total
     *
     * @return  self
     */
    public function setBOL_Total($BOL_Total)
    {
        $this->BOL_Total = $BOL_Total;

        return $this;
    }

    /**
     * Get the value of PED_CodigoInterno
     */
    public function getPED_CodigoInterno()
    {
        return $this->PED_CodigoInterno;
    }

    /**
     * Set the value of PED_CodigoInterno
     *
     * @return  self
     */
    public function setPED_CodigoInterno($PED_CodigoInterno)
    {
        $this->PED_CodigoInterno = $PED_CodigoInterno;

        return $this;
    }
}
