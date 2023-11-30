<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_paquete extends Model
{
    use HasFactory;

    private $PAQ_CodigoInterno;
    private $PAQ_Nombre;
    private $PAQ_FechaRegistro;
    private $PAQ_Estado;

    public function getArray():array{
        return [
            ":PAQ_CodigoInterno"=>$this->getPAQ_CodigoInterno(),
            ":PAQ_Nombre"=>$this->getPAQ_Nombre(),
            ":PAQ_FechaRegistro"=>$this->getPAQ_FechaRegistro(),
            ":PAQ_Estado"=>$this->getPAQ_Estado(),

        ];
    }

    public function getArrayAll():array{
        return [
            ":PAQ_CodigoInterno"=>"%%",
            ":PAQ_Nombre"=>"%%",
            ":PAQ_FechaRegistro"=>"%%",
            ":PAQ_Estado"=>"%%",
        ];
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
     * Get the value of PAQ_Nombre
     */
    public function getPAQ_Nombre()
    {
        return $this->PAQ_Nombre;
    }

    /**
     * Set the value of PAQ_Nombre
     *
     * @return  self
     */
    public function setPAQ_Nombre($PAQ_Nombre)
    {
        $this->PAQ_Nombre = $PAQ_Nombre;

        return $this;
    }

    /**
     * Get the value of PAQ_FechaRegistro
     */
    public function getPAQ_FechaRegistro()
    {
        return $this->PAQ_FechaRegistro;
    }

    /**
     * Set the value of PAQ_FechaRegistro
     *
     * @return  self
     */
    public function setPAQ_FechaRegistro($PAQ_FechaRegistro)
    {
        $this->PAQ_FechaRegistro = $PAQ_FechaRegistro;

        return $this;
    }

    /**
     * Get the value of PAQ_Estado
     */
    public function getPAQ_Estado()
    {
        return $this->PAQ_Estado;
    }

    /**
     * Set the value of PAQ_Estado
     *
     * @return  self
     */
    public function setPAQ_Estado($PAQ_Estado)
    {
        $this->PAQ_Estado = $PAQ_Estado;

        return $this;
    }
}
