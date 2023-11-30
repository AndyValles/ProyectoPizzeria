<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_factura extends Model
{
    use HasFactory;

    private $FAC_CodigoInterno;
    private $FAC_FechaRegistro;
    private $FAC_Descuento;
    private $FAC_IGV;
    private $FAC_Total;
    private $PED_CodigoInterno;


    public function getArray():array{
        return [
            ":FAC_CodigoInterno"=>$this->getFAC_CodigoInterno(),
            ":FAC_FechaRegistro"=>$this->getFAC_FechaRegistro(),
            ":FAC_Descuento"=>$this->getFAC_Descuento(),
            ":FAC_IGV"=>$this->getFAC_IGV(),
            ":FAC_Total"=>$this->getFAC_Total(),
            ":PED_CodigoInterno"=>$this->getPED_CodigoInterno(),

            ];
    }

    public function getArrayAll():array{
        return [
            ":FAC_CodigoInterno"=>"%%",
            ":FAC_FechaRegistro"=>"%%",
            ":FAC_Descuento"=>"%%",
            ":FAC_IGV"=>"%%",
            ":FAC_Total"=>"%%",
            ":PED_CodigoInterno"=>"%%",
            ];
    }

    /**
     * Get the value of FAC_CodigoInterno
     */
    public function getFAC_CodigoInterno()
    {
        return $this->FAC_CodigoInterno;
    }

    /**
     * Set the value of FAC_CodigoInterno
     *
     * @return  self
     */
    public function setFAC_CodigoInterno($FAC_CodigoInterno)
    {
        $this->FAC_CodigoInterno = $FAC_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of FAC_FechaRegistro
     */
    public function getFAC_FechaRegistro()
    {
        return $this->FAC_FechaRegistro;
    }

    /**
     * Set the value of FAC_FechaRegistro
     *
     * @return  self
     */
    public function setFAC_FechaRegistro($FAC_FechaRegistro)
    {
        $this->FAC_FechaRegistro = $FAC_FechaRegistro;

        return $this;
    }

    /**
     * Get the value of FAC_Descuento
     */
    public function getFAC_Descuento()
    {
        return $this->FAC_Descuento;
    }

    /**
     * Set the value of FAC_Descuento
     *
     * @return  self
     */
    public function setFAC_Descuento($FAC_Descuento)
    {
        $this->FAC_Descuento = $FAC_Descuento;

        return $this;
    }

    /**
     * Get the value of FAC_IGV
     */
    public function getFAC_IGV()
    {
        return $this->FAC_IGV;
    }

    /**
     * Set the value of FAC_IGV
     *
     * @return  self
     */
    public function setFAC_IGV($FAC_IGV)
    {
        $this->FAC_IGV = $FAC_IGV;

        return $this;
    }

    /**
     * Get the value of FAC_Total
     */
    public function getFAC_Total()
    {
        return $this->FAC_Total;
    }

    /**
     * Set the value of FAC_Total
     *
     * @return  self
     */
    public function setFAC_Total($FAC_Total)
    {
        $this->FAC_Total = $FAC_Total;

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
