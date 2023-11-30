<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_lugar extends Model
{
    use HasFactory;

    protected $PEDDET_CodigoInterno;
    protected $PED_CodigoInterno;
    protected $PAQ_CodigoInterno;
    protected $ART_CodigoInterno;
    protected $PEDDET_Cantidad;



    public function getArray():array{
        return [
            ":PEDDET_CodigoInterno"=>$this->getPEDDET_CodigoInterno(),
            ":PED_CodigoInterno"=>$this->getPED_CodigoInterno(),
            ":PAQ_CodigoInterno"=>$this->getPAQ_CodigoInterno(),
            ":ART_CodigoInterno"=>$this->getART_CodigoInterno(),
            ":PEDDET_Cantidad"=>$this->getPEDDET_Cantidad(),
            ];
    }

    public function getArrayAll():array{
        return [
            ":PEDDET_CodigoInterno"=>"%%",
            ":PED_CodigoInterno"=>"%%",
            ":PAQ_CodigoInterno"=>"%%",
            ":ART_CodigoInterno"=>"%%",
            ":PEDDET_Cantidad"=>"%%",
        ];
    }

    /**
     * Get the value of PEDDET_Cantidad
     */
    public function getPEDDET_Cantidad()
    {
        return $this->PEDDET_Cantidad;
    }

    /**
     * Set the value of PEDDET_Cantidad
     *
     * @return  self
     */
    public function setPEDDET_Cantidad($PEDDET_Cantidad)
    {
        $this->PEDDET_Cantidad = $PEDDET_Cantidad;

        return $this;
    }

    /**
     * Get the value of ART_CodigoInterno
     */
    public function getART_CodigoInterno()
    {
        return $this->ART_CodigoInterno;
    }

    /**
     * Set the value of ART_CodigoInterno
     *
     * @return  self
     */
    public function setART_CodigoInterno($ART_CodigoInterno)
    {
        $this->ART_CodigoInterno = $ART_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of PAQ_CodigoInterno
     */
    public function getPAQ_CodigoInterno()
    {
        return $this->PAQ_CodigoInterno;
    }

    /**
     * Set the value of PAQ_CodigoInterno
     *
     * @return  self
     */
    public function setPAQ_CodigoInterno($PAQ_CodigoInterno)
    {
        $this->PAQ_CodigoInterno = $PAQ_CodigoInterno;

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

    /**
     * Get the value of PEDDET_CodigoInterno
     */
    public function getPEDDET_CodigoInterno()
    {
        return $this->PEDDET_CodigoInterno;
    }

    /**
     * Set the value of PEDDET_CodigoInterno
     *
     * @return  self
     */
    public function setPEDDET_CodigoInterno($PEDDET_CodigoInterno)
    {
        $this->PEDDET_CodigoInterno = $PEDDET_CodigoInterno;

        return $this;
    }
}
