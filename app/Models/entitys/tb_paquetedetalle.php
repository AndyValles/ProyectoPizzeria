<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_paquetedetalle extends Model
{
    use HasFactory;

    protected $PAQDET_CodigoInterno ;
    protected $PAQDET_Descripcion ;
    protected $PAQ_CodigoInterno ;
    protected $ART_CodigoInterno ;
    protected $PAQDET_FechaRegistro ;
    protected $PAQDET_Cantidad ;
    protected $PAQDET_Precio ;
    protected $PAQDET_descuento ;
    protected $PAQDET_Estado ;


    public function getArray():array{
        return [
            ":PAQDET_CodigoInterno"=>$this->getPAQDET_CodigoInterno(),
            ":PAQDET_Descripcion"=>$this->getPAQDET_Descripcion(),
            ":PAQ_CodigoInterno"=>$this->getPAQ_CodigoInterno(),
            ":ART_CodigoInterno"=>$this->getART_CodigoInterno(),
            ":PAQDET_FechaRegistro"=>$this->getPAQDET_FechaRegistro(),
            ":PAQDET_Cantidad"=>$this->getPAQDET_Cantidad(),
            ":PAQDET_Precio"=>$this->getPAQDET_Precio(),
            ":PAQDET_descuento"=>$this->getPAQDET_descuento(),
            ":PAQDET_Estado"=>$this->getPAQDET_Estado(),
            ];
    }

    public function getArrayAll():array{
        return [
            ":PAQDET_CodigoInterno"=>"%%",
            ":PAQDET_Descripcion"=>"%%",
            ":PAQ_CodigoInterno"=>"%%",
            ":ART_CodigoInterno"=>"%%",
            ":PAQDET_FechaRegistro"=>"%%",
            ":PAQDET_Cantidad"=>"%%",
            ":PAQDET_Precio"=>"%%",
            ":PAQDET_descuento"=>"%%",
            ":PAQDET_Estado"=>"%%",
        ];
    }

    /**
     * Get the value of PAQDET_CodigoInterno
     */
    public function getPAQDET_CodigoInterno()
    {
        return $this->PAQDET_CodigoInterno;
    }

    /**
     * Set the value of PAQDET_CodigoInterno
     *
     * @return  self
     */
    public function setPAQDET_CodigoInterno($PAQDET_CodigoInterno)
    {
        $this->PAQDET_CodigoInterno = $PAQDET_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of PAQDET_Descripcion
     */
    public function getPAQDET_Descripcion()
    {
        return $this->PAQDET_Descripcion;
    }

    /**
     * Set the value of PAQDET_Descripcion
     *
     * @return  self
     */
    public function setPAQDET_Descripcion($PAQDET_Descripcion)
    {
        $this->PAQDET_Descripcion = $PAQDET_Descripcion;

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
     * Get the value of PAQDET_FechaRegistro
     */
    public function getPAQDET_FechaRegistro()
    {
        return $this->PAQDET_FechaRegistro;
    }

    /**
     * Set the value of PAQDET_FechaRegistro
     *
     * @return  self
     */
    public function setPAQDET_FechaRegistro($PAQDET_FechaRegistro)
    {
        $this->PAQDET_FechaRegistro = $PAQDET_FechaRegistro;

        return $this;
    }

    /**
     * Get the value of PAQDET_Cantidad
     */
    public function getPAQDET_Cantidad()
    {
        return $this->PAQDET_Cantidad;
    }

    /**
     * Set the value of PAQDET_Cantidad
     *
     * @return  self
     */
    public function setPAQDET_Cantidad($PAQDET_Cantidad)
    {
        $this->PAQDET_Cantidad = $PAQDET_Cantidad;

        return $this;
    }

    /**
     * Get the value of PAQDET_Precio
     */
    public function getPAQDET_Precio()
    {
        return $this->PAQDET_Precio;
    }

    /**
     * Set the value of PAQDET_Precio
     *
     * @return  self
     */
    public function setPAQDET_Precio($PAQDET_Precio)
    {
        $this->PAQDET_Precio = $PAQDET_Precio;

        return $this;
    }

    /**
     * Get the value of PAQDET_descuento
     */
    public function getPAQDET_descuento()
    {
        return $this->PAQDET_descuento;
    }

    /**
     * Set the value of PAQDET_descuento
     *
     * @return  self
     */
    public function setPAQDET_descuento($PAQDET_descuento)
    {
        $this->PAQDET_descuento = $PAQDET_descuento;

        return $this;
    }

    /**
     * Get the value of PAQDET_Estado
     */
    public function getPAQDET_Estado()
    {
        return $this->PAQDET_Estado;
    }

    /**
     * Set the value of PAQDET_Estado
     *
     * @return  self
     */
    public function setPAQDET_Estado($PAQDET_Estado)
    {
        $this->PAQDET_Estado = $PAQDET_Estado;

        return $this;
    }
}
