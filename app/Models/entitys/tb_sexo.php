<?php
    namespace App\Models\entitys;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class tb_sexo extends Model
{
    use HasFactory;

    private $SEX_Codigo;
    private $SEX_Nombre;
    private $SEX_Identificador;
    private $SEX_Estado;


    public function getSEX_Estado()
    {
        return $this->SEX_Estado;
    }


    public function setSEX_Estado($SEX_Estado)
    {
        $this->SEX_Estado = $SEX_Estado;

        return $this;
    }

    public function getSEX_Nombre()
    {
        return $this->SEX_Nombre;
    }


    public function setSEX_Nombre($SEX_Nombre)
    {
        $this->SEX_Nombre = $SEX_Nombre;

        return $this;
    }


    public function getSEX_Codigo()
    {
        return $this->SEX_Codigo;
    }


    public function setSEX_Codigo($SEX_Codigo)
    {
        $this->SEX_Codigo = $SEX_Codigo;

        return $this;
    }

    public function getArray(){
        return [
            ':SEX_Codigo' => $this->SEX_Codigo,
            ':SEX_Nombre' => $this->SEX_Nombre,
            ':SEX_Identificador' => $this->SEX_Identificador,
            ':SEX_Estado' => $this->SEX_Estado
        ];
    }

    public function getArrayAll(){
        return [
            ':SEX_Codigo' => "%%",
            ':SEX_Nombre' => "%%",
            ':SEX_Identificador' => "%%",
            ':SEX_Estado' => "1"
        ];
    }

    public function getSEX_Identificador()
    {
        return $this->SEX_Identificador;
    }

    public function setSEX_Identificador($SEX_Identificador)
    {
        $this->SEX_Identificador = $SEX_Identificador;

        return $this;
    }
}
?>
