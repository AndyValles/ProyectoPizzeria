<?php

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_distrito extends Model
{
    use HasFactory;

    private $DIS_Codigo;
    private $DIS_Nombre;
    private $DIS_Estado;

    public function getDIS_Codigo(){
        return $this->DIS_Codigo;
    }

    public function setDIS_Codigo($DIS_Codigo)
    {
        $this->DIS_Codigo = $DIS_Codigo;

        return $this;
    }

    public function getDIS_Nombre()
    {
        return $this->DIS_Nombre;
    }

    public function setDIS_Nombre($DIS_Nombre)
    {
        $this->DIS_Nombre = $DIS_Nombre;

        return $this;
    }


    public function getDIS_Estado()
    {
        return $this->DIS_Estado;
    }


    public function setDIS_Estado($DIS_Estado)
    {
        $this->DIS_Estado = $DIS_Estado;

        return $this;
    }

    public function getArray(){
        return [
                    ':DIS_Codigo' => $this->getDIS_Codigo(),
                    ':DIS_Nombre' => $this->getDIS_Nombre(),
                    ':DIS_Estado' => $this->getDIS_Estado()
                ];
    }

    public function getArrayAll(){
        return [
                    ':DIS_Codigo' => "%%",
                    ':DIS_Nombre' => "%%",
                    ':DIS_Estado' => "1"
                ];
    }
}
?>
