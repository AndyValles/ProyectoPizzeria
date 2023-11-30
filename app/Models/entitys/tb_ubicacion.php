<?php
    namespace App\Models\entitys;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class tb_ubicacion extends Model
{
    use HasFactory;

    private $UBI_CodigoInterno;
    private $USU_CodigoInterno;
    private $LUGAR;
    private $PROVINCIA;
    private $DISTRITO;
    private $UBI_Direccion;
    private $UBI_Calle;
    private $UBI_Numero;
    private $UBI_Referencia;
    private $UBI_Estado;

    public function getUBI_CodigoInterno()
    {
        return $this->UBI_CodigoInterno;
    }

    public function setUBI_CodigoInterno($UBI_CodigoInterno)
    {
        $this->UBI_CodigoInterno = $UBI_CodigoInterno;

        return $this;
    }

    public function getUSU_CodigoInterno()
    {
        return $this->USU_CodigoInterno;
    }

    public function setUSU_CodigoInterno($USU_CodigoInterno)
    {
        $this->USU_CodigoInterno = $USU_CodigoInterno;

        return $this;
    }

    public function getLUGAR()
    {
        return $this->LUGAR;
    }

    public function setLUGAR($LUGAR)
    {
        $this->LUGAR = $LUGAR;

        return $this;
    }

    public function getPROVINCIA()
    {
        return $this->PROVINCIA;
    }

    public function setPROVINCIA($PROVINCIA)
    {
        $this->PROVINCIA = $PROVINCIA;

        return $this;
    }

    public function getDISTRITO()
    {
        return $this->DISTRITO;
    }

    public function setDISTRITO($DISTRITO)
    {
        $this->DISTRITO = $DISTRITO;

        return $this;
    }

    public function getUBI_Direccion()
    {
        return $this->UBI_Direccion;
    }

    public function setUBI_Direccion($UBI_Direccion)
    {
        $this->UBI_Direccion = $UBI_Direccion;

        return $this;
    }

    public function getUBI_Calle()
    {
        return $this->UBI_Calle;
    }

    public function setUBI_Calle($UBI_Calle)
    {
        $this->UBI_Calle = $UBI_Calle;

        return $this;
    }

    public function getUBI_Numero()
    {
        return $this->UBI_Numero;
    }

    public function setUBI_Numero($UBI_Numero)
    {
        $this->UBI_Numero = $UBI_Numero;

        return $this;
    }

    public function getUBI_Referencia()
    {
        return $this->UBI_Referencia;
    }

    public function setUBI_Referencia($UBI_Referencia)
    {
        $this->UBI_Referencia = $UBI_Referencia;

        return $this;
    }

    public function getUBI_Estado()
    {
        return $this->UBI_Estado;
    }

    public function setUBI_Estado($UBI_Estado)
    {
        $this->UBI_Estado = $UBI_Estado;

        return $this;
    }

    public function getArray(){
        return [
                    ':UBI_CodigoInterno' => $this->UBI_CodigoInterno,
                    ':USU_CodigoInterno' => $this->USU_CodigoInterno,
                    ':LUGAR' => $this->LUGAR,
                    ':DISTRITO' => $this->DISTRITO,
                    ':PROVINCIA' => $this->PROVINCIA,
                    ':UBI_Direccion' => $this->UBI_Direccion,
                    ':UBI_Calle' => $this->UBI_Calle,
                    ':UBI_Estado' => $this->UBI_Estado
                ];
    }

    public function getArrayAll(){
        return [
                    ':UBI_CodigoInterno' => "%%",
                    ':USU_CodigoInterno' => "%%",
                    ':LUGAR' =>"%%",
                    ':DISTRITO' => "%%",
                    ':PROVINCIA' => "%%",
                    ':UBI_Direccion' =>"%%",
                    ':UBI_Calle' => "%%",
                    ':UBI_Estado' => "1"
                ];
    }

}
?>
