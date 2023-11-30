<?php
namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_proveedor extends Model
{
    use HasFactory;
    private $PROV_Codigo;
	private $PROV_Nombre;
    private $PROV_Identificador;
	private $PROV_FechaRegistro;
	private $PROV_Estado;

    public function getPROV_Codigo()
    {
        return $this->PROV_Codigo;
    }

    public function setPROV_Codigo($PROV_Codigo)
    {
        $this->PROV_Codigo = $PROV_Codigo;

        return $this;
    }

	public function getPROV_Nombre()
	{
		return $this->PROV_Nombre;
	}

	public function setPROV_Nombre($PROV_Nombre)
	{
		$this->PROV_Nombre = $PROV_Nombre;

		return $this;
	}


    public function getPROV_Identificador()
    {
        return $this->PROV_Identificador;
    }

    public function setPROV_Identificador($PROV_Identificador)
    {
        $this->PROV_Identificador = $PROV_Identificador;

        return $this;
    }

	public function getPROV_FechaRegistro()
	{
		return $this->PROV_FechaRegistro;
	}

	public function setPROV_FechaRegistro($PROV_FechaRegistro)
	{
		$this->PROV_FechaRegistro = $PROV_FechaRegistro;

		return $this;
	}

	public function getPROV_Estado()
	{
		return $this->PROV_Estado;
	}

	public function setPROV_Estado($PROV_Estado)
	{
		$this->PROV_Estado = $PROV_Estado;

		return $this;
	}

    public function getArray(){
        return [
            ':PROV_Codigo' => $this->PROV_Codigo,
            ':PROV_Nombre' => $this->PROV_Nombre,
            ':PROV_Identificador' => $this->PROV_Identificador,
            ':PROV_FechaRegistro' => $this->PROV_FechaRegistro,
            ':PROV_Estado' => $this->PROV_Estado
        ];
    }

    public function getArrayAll(){
        return [
            ':PROV_Codigo' => "%%",
            ':PROV_Nombre' => "%%",
            ':PROV_Identificador' => "%%",
            ':PROV_FechaRegistro' => "%%",
            ':PROV_Estado' => "1"
        ];
    }


}
?>
