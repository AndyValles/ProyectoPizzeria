<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_inventario extends Model
{
    use HasFactory;

    private $INV_CodigoInterno;
    private $INV_FechaRegistro;
    private $INV_StockModificado;
    private $ART_CodigoInterno;
    private $ITEM_CodigoInterno;
    private $INV_Estado;


    public function getArray():array{
        return [
            ":INV_CodigoInterno"=>$this->getINV_CodigoInterno(),
            ":INV_FechaRegistro"=>$this->getINV_FechaRegistro(),
            ":INV_StockModificado"=>$this->getINV_StockModificado(),
            ":ART_CodigoInterno"=>$this->getART_CodigoInterno(),
            ":ITEM_CodigoInterno"=>$this->getITEM_CodigoInterno(),
            ":INV_Estado"=>$this->getINV_Estado(),

        ];
    }

    public function getArrayAll():array{
        return [
            ":INV_CodigoInterno"=>"%%",
            ":INV_FechaRegistro"=>"%%",
            ":INV_StockModificado"=>"%%",
            ":ART_CodigoInterno"=>"%%",
            ":ITEM_CodigoInterno"=>"%%",
            ":INV_Estado"=>"%%",
        ];
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

    /**
     * Get the value of INV_FechaRegistro
     */
    public function getINV_FechaRegistro()
    {
        return $this->INV_FechaRegistro;
    }

    /**
     * Set the value of INV_FechaRegistro
     *
     * @return  self
     */
    public function setINV_FechaRegistro($INV_FechaRegistro)
    {
        $this->INV_FechaRegistro = $INV_FechaRegistro;

        return $this;
    }

    /**
     * Get the value of INV_StockModificado
     */
    public function getINV_StockModificado()
    {
        return $this->INV_StockModificado;
    }

    /**
     * Set the value of INV_StockModificado
     *
     * @return  self
     */
    public function setINV_StockModificado($INV_StockModificado)
    {
        $this->INV_StockModificado = $INV_StockModificado;

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
     * Get the value of INV_Estado
     */
    public function getINV_Estado()
    {
        return $this->INV_Estado;
    }

    /**
     * Set the value of INV_Estado
     *
     * @return  self
     */
    public function setINV_Estado($INV_Estado)
    {
        $this->INV_Estado = $INV_Estado;

        return $this;
    }

    /**
     * Get the value of ITEM_CodigoInterno
     */
    public function getITEM_CodigoInterno()
    {
        return $this->ITEM_CodigoInterno;
    }

    /**
     * Set the value of ITEM_CodigoInterno
     *
     * @return  self
     */
    public function setITEM_CodigoInterno($ITEM_CodigoInterno)
    {
        $this->ITEM_CodigoInterno = $ITEM_CodigoInterno;

        return $this;
    }
}
