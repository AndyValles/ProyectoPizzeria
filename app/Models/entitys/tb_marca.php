<?php
    namespace App\Models\entitys;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class tb_marca extends Model
{
    use HasFactory;

    private $MAR_Codigo;
    private $MAR_Nombre;
    private $MAR_Estado;


    public function getMAR_Estado()
    {
        return $this->MAR_Estado;
    }

    public function setMAR_Estado($MAR_Estado)
    {
        $this->MAR_Estado = $MAR_Estado;

        return $this;
    }

    public function getMAR_Nombre()
    {
        return $this->MAR_Nombre;
    }

    public function setMAR_Nombre($MAR_Nombre)
    {
        $this->MAR_Nombre = $MAR_Nombre;

        return $this;
    }

    public function getMAR_Codigo()
    {
        return $this->MAR_Codigo;
    }

    public function setMAR_Codigo($MAR_Codigo)
    {
        $this->MAR_Codigo = $MAR_Codigo;

        return $this;
    }

    public function getArray(){
        return [
            ':MAR_Codigo' => $this->MAR_Codigo,
            ':MAR_Nombre' => $this->MAR_Nombre,
            ':MAR_Estado' => $this->MAR_Estado
        ];
    }

    public function getArrayAll(){
        return [
            ':MAR_Codigo' => "%%",
            ':MAR_Nombre' => "%%",
            ':MAR_Estado' => "1"
        ];
    }
}
?>
