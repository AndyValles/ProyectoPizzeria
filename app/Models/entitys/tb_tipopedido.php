<?php
    namespace App\Models\entitys;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class tb_tipopedido extends Model
{
    use HasFactory;

    private $TIPPED_Codigo;
    private $TIPPED_Nombre;
    private $TIPPED_Estado;


    public function getTIPPED_Codigo()
    {
        return $this->TIPPED_Codigo;
    }

    public function setTIPPED_Codigo($TIPPED_Codigo)
    {
        $this->TIPPED_Codigo = $TIPPED_Codigo;

        return $this;
    }

    public function getTIPPED_Nombre()
    {
        return $this->TIPPED_Nombre;
    }

    public function setTIPPED_Nombre($TIPPED_Nombre)
    {
        $this->TIPPED_Nombre = $TIPPED_Nombre;

        return $this;
    }

    public function getTIPPED_Estado()
    {
        return $this->TIPPED_Estado;
    }

    public function setTIPPED_Estado($TIPPED_Estado)
    {
        $this->TIPPED_Estado = $TIPPED_Estado;

        return $this;
    }

    public function getArray(){
        return [
                    ':TIPPED_Codigo' => $this->TIPPED_Codigo,
                    ':TIPPED_Nombre' => $this->TIPPED_Nombre,
                    ':TIPPED_Estado' => $this->TIPPED_Estado
                ];
    }

    public function getArrayAll(){
        return [
                    ':TIPPED_Codigo' => "%%",
                    ':TIPPED_Nombre' => "%%",
                    ':TIPPED_Estado' => "1"
                ];
    }
}
?>
