<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_banner extends Model
{
    use HasFactory;

    private $BAN_CodigoInterno;
    private $BAN_Imagen;
    private $BAN_Ruta;
    private $TIPBAN_CodigoInterno;
    private $ART_CodigoInterno;
    private $BAN_Estado;


    public function getArray():array{
        return [
            ":BAN_CodigoInterno"=>$this->getBAN_CodigoInterno(),
            ":TIPBAN_CodigoInterno"=>$this->getTIPBAN_CodigoInterno(),
            ":ART_CodigoInterno"=>$this->getPAQDET_CodigoInterno(),
            ":BAN_Estado"=>$this->getBAN_Estado(),
        ];
    }

    public function getArrayAll():array{
        return [
            ":BAN_CodigoInterno"=>"%%",
            ":TIPBAN_CodigoInterno"=>"%%",
            ":ART_CodigoInterno"=>"%%",
            ":BAN_Estado"=>"%%",

            ];
    }

    /**
     * Get the value of BAN_CodigoInterno
     */
    public function getBAN_CodigoInterno()
    {
        return $this->BAN_CodigoInterno;
    }

    /**
     * Set the value of BAN_CodigoInterno
     *
     * @return  self
     */
    public function setBAN_CodigoInterno($BAN_CodigoInterno)
    {
        $this->BAN_CodigoInterno = $BAN_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of BAN_Imagen
     */
    public function getBAN_Imagen()
    {
        return $this->BAN_Imagen;
    }

    /**
     * Set the value of BAN_Imagen
     *
     * @return  self
     */
    public function setBAN_Imagen($BAN_Imagen)
    {
        $this->BAN_Imagen = $BAN_Imagen;

        return $this;
    }

    /**
     * Get the value of BAN_Ruta
     */
    public function getBAN_Ruta()
    {
        return $this->BAN_Ruta;
    }

    /**
     * Set the value of BAN_Ruta
     *
     * @return  self
     */
    public function setBAN_Ruta($BAN_Ruta)
    {
        $this->BAN_Ruta = $BAN_Ruta;

        return $this;
    }

    /**
     * Get the value of TIPBAN_CodigoInterno
     */
    public function getTIPBAN_CodigoInterno()
    {
        return $this->TIPBAN_CodigoInterno;
    }

    /**
     * Set the value of TIPBAN_CodigoInterno
     *
     * @return  self
     */
    public function setTIPBAN_CodigoInterno($TIPBAN_CodigoInterno)
    {
        $this->TIPBAN_CodigoInterno = $TIPBAN_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of PAQDET_CodigoInterno
     */
    public function getART_CodigoInterno()
    {
        return $this->ART_CodigoInterno;
    }

    /**
     * Set the value of PAQDET_CodigoInterno
     *
     * @return  self
     */
    public function setART_CodigoInterno($ART_CodigoInterno)
    {
        $this->ART_CodigoInterno = $ART_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of BAN_Estado
     */
    public function getBAN_Estado()
    {
        return $this->BAN_Estado;
    }

    /**
     * Set the value of BAN_Estado
     *
     * @return  self
     */
    public function setBAN_Estado($BAN_Estado)
    {
        $this->BAN_Estado = $BAN_Estado;

        return $this;
    }
}
