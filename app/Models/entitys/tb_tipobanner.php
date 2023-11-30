<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_tipobanner extends Model
{
    use HasFactory;

    protected $TIPBAN_CodigoInterno;
    protected $TIPBAN_Nombre;
    protected $TIPBAN_Html;
    protected $TIPBAN_Cantidad;
    protected $TIPBAN_Estado;

    public function getArray():array{
        return [
            ":TIPBAN_CodigoInterno"=>$this->getTIPBAN_CodigoInterno(),
            ":TIPBAN_Nombre"=>$this->getTIPBAN_Nombre(),
            ":TIPBAN_Html"=>$this->getTIPBAN_Html(),
            ":TIPBAN_Cantidad"=>$this->getTIPBAN_Cantidad(),
            ":TIPBAN_Estado"=>$this->getTIPBAN_Estado()];
    }

    public function getArrayAll():array{
        return [
            ":TIPBAN_CodigoInterno"=>"%%",
            ":TIPBAN_Nombre"=>"%%",
            ":TIPBAN_Estado"=>"1"
        ];
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
     * Get the value of TIPBAN_Nombre
     */
    public function getTIPBAN_Nombre()
    {
        return $this->TIPBAN_Nombre;
    }

    /**
     * Set the value of TIPBAN_Nombre
     *
     * @return  self
     */
    public function setTIPBAN_Nombre($TIPBAN_Nombre)
    {
        $this->TIPBAN_Nombre = $TIPBAN_Nombre;

        return $this;
    }

    /**
     * Get the value of TIPBAN_Estado
     */
    public function getTIPBAN_Estado()
    {
        return $this->TIPBAN_Estado;
    }

    /**
     * Set the value of TIPBAN_Estado
     *
     * @return  self
     */
    public function setTIPBAN_Estado($TIPBAN_Estado)
    {
        $this->TIPBAN_Estado = $TIPBAN_Estado;

        return $this;
    }

    /**
     * Get the value of TIPBAN_Html
     */
    public function getTIPBAN_Html()
    {
        return $this->TIPBAN_Html;
    }

    /**
     * Set the value of TIPBAN_Html
     *
     * @return  self
     */
    public function setTIPBAN_Html($TIPBAN_Html)
    {
        $this->TIPBAN_Html = $TIPBAN_Html;

        return $this;
    }
}
