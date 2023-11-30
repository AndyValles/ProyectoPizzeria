<?php
namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_tipoitem extends Model
{
    use HasFactory;

    private $TIPIT_CodigoInterno;
    private $TIPIT_Nombre;
    private $TIPIT_Importancia;
    private $TIPIT_Seleccion;
    private $TIPIT_Estado;

    public function getTIPIT_Estado()
    {
        return $this->TIPIT_Estado;
    }

    public function setTIPIT_Estado($TIPIT_Estado)
    {
        $this->TIPIT_Estado = $TIPIT_Estado;

        return $this;
    }

    public function getTIPIT_Nombre()
    {
        return $this->TIPIT_Nombre;
    }

    public function setTIPIT_Nombre($TIPIT_Nombre)
    {
        $this->TIPIT_Nombre = $TIPIT_Nombre;

        return $this;
    }

    public function getTIPIT_CodigoInterno()
    {
        return $this->TIPIT_CodigoInterno;
    }

    public function setTIPIT_CodigoInterno($TIPIT_CodigoInterno)
    {
        $this->TIPIT_CodigoInterno = $TIPIT_CodigoInterno;

        return $this;
    }

    public function getArray(){
        return [
            ':TIPIT_CodigoInterno' => $this->TIPIT_CodigoInterno,
            ':TIPIT_Nombre' => $this->TIPIT_Nombre,
            ':TIPIT_Importancia' => $this->TIPIT_Importancia,
            ':TIPIT_Seleccion' => $this->TIPIT_Seleccion,
            ':TIPIT_Estado' => $this->TIPIT_Estado
        ];
    }

    public function getArrayAll(){
        return [
            ':TIPIT_CodigoInterno' => "%%",
            ':TIPIT_Nombre' => "%%",
            ':TIPIT_Estado' => "1"
        ];
    }

    /**
     * Get the value of TIPIT_Seleccion
     */
    public function getTIPIT_Seleccion()
    {
        return $this->TIPIT_Seleccion;
    }

    /**
     * Set the value of TIPIT_Seleccion
     *
     * @return  self
     */
    public function setTIPIT_Seleccion($TIPIT_Seleccion)
    {
        $this->TIPIT_Seleccion = $TIPIT_Seleccion;

        return $this;
    }

    /**
     * Get the value of TIPIT_Importancia
     */
    public function getTIPIT_Importancia()
    {
        return $this->TIPIT_Importancia;
    }

    /**
     * Set the value of TIPIT_Importancia
     *
     * @return  self
     */
    public function setTIPIT_Importancia($TIPIT_Importancia)
    {
        $this->TIPIT_Importancia = $TIPIT_Importancia;

        return $this;
    }
}
?>
