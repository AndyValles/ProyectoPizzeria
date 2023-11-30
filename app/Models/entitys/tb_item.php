<?php
    namespace App\Models\entitys;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class tb_item extends Model
{
    use HasFactory;
    private $ITEM_CodigoInterno;
    private $ITEM_descripcion;
    private $ITEM_precio;
    private $ITEM_Estado;
    private $TIPIT_CodigoInterno;



    public function getArray(){
        return array(
            ':ITEM_CodigoInterno' => $this->ITEM_CodigoInterno,
            ':ITEM_Descripcion' => $this->ITEM_descripcion,
            ':ITEM_precio' => $this->ITEM_precio,
            ':TIPIT_CodigoInterno' => $this->TIPIT_CodigoInterno,
            ':ITEM_Estado' => $this->ITEM_Estado,
        );
    }

    public function getArrayAll(){
        return array(
            ':ITEM_CodigoInterno' => "%%",
            //':ITEM_Descripcion' => "%%",
            ':ITEM_precio' => "%%",
            ':TIPIT_CodigoInterno' => "%%",
            ':ITEM_Estado' => "1",
        );
    }

    public function getITEM_CodigoInterno()
    {
        return $this->ITEM_CodigoInterno;
    }


    public function setITEM_CodigoInterno($ITEM_CodigoInterno)
    {
        $this->ITEM_CodigoInterno = $ITEM_CodigoInterno;

        return $this;
    }


    public function getITEM_descripcion()
    {
        return $this->ITEM_descripcion;
    }


    public function setITEM_descripcion($ITEM_descripcion)
    {
        $this->ITEM_descripcion = $ITEM_descripcion;

        return $this;
    }

    public function getITEM_precio()
    {
        return $this->ITEM_precio;
    }

    public function setITEM_precio($ITEM_precio)
    {
        $this->ITEM_precio = $ITEM_precio;

        return $this;
    }


    public function getITEM_Estado()
    {
        return $this->ITEM_Estado;
    }


    public function setITEM_Estado($ITEM_Estado)
    {
        $this->ITEM_Estado = $ITEM_Estado;

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
}
?>
