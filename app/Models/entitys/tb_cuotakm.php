<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_cuotakm extends Model
{
    use HasFactory;

    protected $CKM_CodigoInterno;
    protected $CKM_Precio;
    protected $CKM_Metros;
    protected $CKM_estado;


    public function getArray():array{
        return [
            ":CKM_CodigoInterno"=>$this->getCKM_CodigoInterno(),
            ":CKM_Precio"=>$this->getCKM_Precio(),
            ":CKM_Metros"=>$this->getCKM_Metros(),
            ":CKM_estado"=>$this->getCKM_estado()
    ];
    }

    public function getArrayAll():array{
        return [
            ":CKM_CodigoInterno"=>"%%",
            ":CKM_Precio"=>"%%",
            ":CKM_Metros"=>"%%",
            ":CKM_estado"=>"1",
        ];
    }
    public function getCKM_CodigoInterno()
    {
        return $this->CKM_CodigoInterno;
    }

    public function setCKM_CodigoInterno($CKM_CodigoInterno)
    {
        $this->CKM_CodigoInterno = $CKM_CodigoInterno;

        return $this;
    }

    public function getCKM_Precio()
    {
        return $this->CKM_Precio;
    }
    public function setCKM_Precio($CKM_Precio)
    {
        $this->CKM_Precio = $CKM_Precio;

        return $this;
    }

    public function getCKM_Metros()
    {
        return $this->CKM_Metros;
    }


    public function setCKM_Metros($CKM_Metros)
    {
        $this->CKM_Metros = $CKM_Metros;

        return $this;
    }

    public function getCKM_estado()
    {
        return $this->CKM_estado;
    }

    public function setCKM_estado($CKM_estado)
    {
        $this->CKM_estado = $CKM_estado;

        return $this;
    }
}
