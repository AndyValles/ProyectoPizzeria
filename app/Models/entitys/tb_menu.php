<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_menu extends Model
{
    use HasFactory;

    private $MEN_CodigoInterno;
    private $MEN_Padre;
    private $MEN_Nombre;
    private $MEN_Tipo;
    private $MEN_Icono;
    private $MEN_Ruta;
    private $MEN_Estado;
    public const CantRow=7;

    public function getArray():array{
        return [
            ":MEN_CodigoInterno"=>$this->getMEN_CodigoInterno(),
            ":MEN_Padre"=>$this->getMEN_Padre(),
            ":MEN_Nombre"=>$this->getMEN_Nombre(),
            ":MEN_Tipo"=>$this->getMEN_Tipo(),
            ":MEN_Icono"=>$this->getMEN_Icono(),
            ":Tipo_M"=>$this->getMEN_Ruta(),
            ":MEN_Estado"=>$this->getMEN_Estado(),
        ];
    }

    public function getArrayAll():array{
        return [
            ":MEN_CodigoInterno"=>"%%",
            ":MEN_Padre"=>"%%",
            ":MEN_Nombre"=>"%%",
            ":Tipo_M"=>"%%",
            ":MEN_Estado"=>"%%",
        ];
    }

    /**
     * Get the value of MEN_CodigoInterno
     */
    public function getMEN_CodigoInterno()
    {
        return $this->MEN_CodigoInterno;
    }

    /**
     * Set the value of MEN_CodigoInterno
     *
     * @return  self
     */
    public function setMEN_CodigoInterno($MEN_CodigoInterno)
    {
        $this->MEN_CodigoInterno = $MEN_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of MEN_Nombre
     */
    public function getMEN_Nombre()
    {
        return $this->MEN_Nombre;
    }

    /**
     * Set the value of MEN_Nombre
     *
     * @return  self
     */
    public function setMEN_Nombre($MEN_Nombre)
    {
        $this->MEN_Nombre = $MEN_Nombre;

        return $this;
    }

    /**
     * Get the value of MEN_Icono
     */
    public function getMEN_Icono()
    {
        return $this->MEN_Icono;
    }

    /**
     * Set the value of MEN_Icono
     *
     * @return  self
     */
    public function setMEN_Icono($MEN_Icono)
    {
        $this->MEN_Icono = $MEN_Icono;

        return $this;
    }

    /**
     * Get the value of MEN_Ruta
     */
    public function getMEN_Ruta()
    {
        return $this->MEN_Ruta;
    }

    /**
     * Set the value of MEN_Ruta
     *
     * @return  self
     */
    public function setMEN_Ruta($MEN_Ruta)
    {
        $this->MEN_Ruta = $MEN_Ruta;

        return $this;
    }

    /**
     * Get the value of MEN_Estado
     */
    public function getMEN_Estado()
    {
        return $this->MEN_Estado;
    }

    /**
     * Set the value of MEN_Estado
     *
     * @return  self
     */
    public function setMEN_Estado($MEN_Estado)
    {
        $this->MEN_Estado = $MEN_Estado;

        return $this;
    }

    /**
     * Get the value of MEN_Tipo
     */
    public function getMEN_Tipo()
    {
        return $this->MEN_Tipo;
    }

    /**
     * Set the value of MEN_Tipo
     *
     * @return  self
     */
    public function setMEN_Tipo($MEN_Tipo)
    {
        $this->MEN_Tipo = $MEN_Tipo;

        return $this;
    }

    /**
     * Get the value of MEN_Padre
     */
    public function getMEN_Padre()
    {
        return $this->MEN_Padre;
    }

    /**
     * Set the value of MEN_Padre
     *
     * @return  self
     */
    public function setMEN_Padre($MEN_Padre)
    {
        $this->MEN_Padre = $MEN_Padre;

        return $this;
    }
}
