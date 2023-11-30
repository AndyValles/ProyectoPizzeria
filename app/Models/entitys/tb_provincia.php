<?php
namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_provincia extends Model
{
    use HasFactory;

    private $PROV_Codigo;
    private $PROV_Nombre;
    private $PROV_Estado;

    public function getPROV_Codigo()
    {
        return $this->PROV_Codigo;
    }

    public function setPROV_Codigo($PROV_Codigo)
    {
        $this->PROV_Codigo = $PROV_Codigo;
    }

    public function getPROV_Nombre()
    {
        return $this->PROV_Nombre;
    }

    public function setPROV_Nombre($PROV_Nombre)
    {
        $this->PROV_Nombre = $PROV_Nombre;
    }

    public function getPROV_Estado()
    {
        return $this->PROV_Estado;
    }

    public function setPROV_Estado($PROV_Estado)
    {
        $this->PROV_Estado = $PROV_Estado;
    }

    public function getArray()
    {
        return array(':PROV_Codigo'=>$this->PROV_Codigo,':PROV_Nombre'=>$this->PROV_Nombre,':PROV_Estado'=>$this->PROV_Estado);
    }

    public function getArrayAll()
    {
        return array(':PROV_Codigo'=>"%%",':PROV_Nombre'=>"%%",':PROV_Estado'=>"1");
    }

}
?>
