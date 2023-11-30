<?php
namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tb_usuario extends Authenticatable
{
    use HasFactory;
    protected $table="tb_usuario";
    protected $primaryKey = "USU_CodigoInterno";
    protected $remember_token="USU_Token";
    private $USU_CodigoInterno;
    private $USU_DNI;
    private $USU_PriNombre;
    private $USU_SegNombre;
    private $USU_ApePaterno;
    private $USU_ApeMaterno;
    private $USU_Usuario;
    private $USU_Clave;
    private $USU_Token;
    private $USU_Telefono;
    private $USU_Correo;
    private $USU_FechaNacimiento;
    private $USU_FechaRegistro;
    private $USU_Estado;
    private $SEXO;


    /**
     * Get the value of USU_CodigoInterno
     */
    public function getUSU_CodigoInterno()
    {
        return $this->USU_CodigoInterno;
    }

    /**
     * Set the value of USU_CodigoInterno
     *
     * @return  self
     */
    public function setUSU_CodigoInterno($USU_CodigoInterno)
    {
        $this->USU_CodigoInterno = $USU_CodigoInterno;

        return $this;
    }

    /**
     * Get the value of USU_DNI
     */
    public function getUSU_DNI()
    {
        return $this->USU_DNI;
    }

    /**
     * Set the value of USU_DNI
     *
     * @return  self
     */
    public function setUSU_DNI($USU_DNI)
    {
        $this->USU_DNI = $USU_DNI;

        return $this;
    }

    /**
     * Get the value of USU_PriNombre
     */
    public function getUSU_PriNombre()
    {
        return $this->USU_PriNombre;
    }

    /**
     * Set the value of USU_PriNombre
     *
     * @return  self
     */
    public function setUSU_PriNombre($USU_PriNombre)
    {
        $this->USU_PriNombre = $USU_PriNombre;

        return $this;
    }

    /**
     * Get the value of USU_SegNombre
     */
    public function getUSU_SegNombre()
    {
        return $this->USU_SegNombre;
    }

    /**
     * Set the value of USU_SegNombre
     *
     * @return  self
     */
    public function setUSU_SegNombre($USU_SegNombre)
    {
        $this->USU_SegNombre = $USU_SegNombre;

        return $this;
    }

    /**
     * Get the value of USU_ApePaterno
     */
    public function getUSU_ApePaterno()
    {
        return $this->USU_ApePaterno;
    }

    /**
     * Set the value of USU_ApePaterno
     *
     * @return  self
     */
    public function setUSU_ApePaterno($USU_ApePaterno)
    {
        $this->USU_ApePaterno = $USU_ApePaterno;

        return $this;
    }

    /**
     * Get the value of USU_ApeMaterno
     */
    public function getUSU_ApeMaterno()
    {
        return $this->USU_ApeMaterno;
    }

    /**
     * Set the value of USU_ApeMaterno
     *
     * @return  self
     */
    public function setUSU_ApeMaterno($USU_ApeMaterno)
    {
        $this->USU_ApeMaterno = $USU_ApeMaterno;

        return $this;
    }

    /**
     * Get the value of USU_Usuario
     */
    public function getUSU_Usuario()
    {
        return $this->USU_Usuario;
    }

    /**
     * Set the value of USU_Usuario
     *
     * @return  self
     */
    public function setUSU_Usuario($USU_Usuario)
    {
        $this->USU_Usuario = $USU_Usuario;

        return $this;
    }

    /**
     * Get the value of USU_Clave
     */
    public function getUSU_Clave()
    {
        return $this->USU_Clave;
    }

    /**
     * Set the value of USU_Clave
     *
     * @return  self
     */
    public function setUSU_Clave($USU_Clave)
    {
        $this->USU_Clave = $USU_Clave;

        return $this;
    }

    /**
     * Get the value of USU_Token
     */
    public function getUSU_Token()
    {
        return $this->USU_Token;
    }

    /**
     * Set the value of USU_Token
     *
     * @return  self
     */
    public function setUSU_Token($USU_Token)
    {
        $this->USU_Token = $USU_Token;

        return $this;
    }

    /**
     * Get the value of USU_Telefono
     */
    public function getUSU_Telefono()
    {
        return $this->USU_Telefono;
    }

    /**
     * Set the value of USU_Telefono
     *
     * @return  self
     */
    public function setUSU_Telefono($USU_Telefono)
    {
        $this->USU_Telefono = $USU_Telefono;

        return $this;
    }

    /**
     * Get the value of USU_Correo
     */
    public function getUSU_Correo()
    {
        return $this->USU_Correo;
    }

    /**
     * Set the value of USU_Correo
     *
     * @return  self
     */
    public function setUSU_Correo($USU_Correo)
    {
        $this->USU_Correo = $USU_Correo;

        return $this;
    }

    /**
     * Get the value of USU_FechaNacimiento
     */
    public function getUSU_FechaNacimiento()
    {
        return $this->USU_FechaNacimiento;
    }

    /**
     * Set the value of USU_FechaNacimiento
     *
     * @return  self
     */
    public function setUSU_FechaNacimiento($USU_FechaNacimiento)
    {
        $this->USU_FechaNacimiento = $USU_FechaNacimiento;

        return $this;
    }

    /**
     * Get the value of USU_FechaRegistro
     */
    public function getUSU_FechaRegistro()
    {
        return $this->USU_FechaRegistro;
    }

    /**
     * Set the value of USU_FechaRegistro
     *
     * @return  self
     */
    public function setUSU_FechaRegistro($USU_FechaRegistro)
    {
        $this->USU_FechaRegistro = $USU_FechaRegistro;

        return $this;
    }

    /**
     * Get the value of USU_Estado
     */
    public function getUSU_Estado()
    {
        return $this->USU_Estado;
    }

    /**
     * Set the value of USU_Estado
     *
     * @return  self
     */
    public function setUSU_Estado($USU_Estado)
    {
        $this->USU_Estado = $USU_Estado;

        return $this;
    }

    /**
     * Get the value of SEXO
     */
    public function getSEXO()
    {
        return $this->SEXO;
    }

    /**
     * Set the value of SEXO
     *
     * @return  self
     */
    public function setSEXO($SEXO)
    {
        $this->SEXO = $SEXO;

        return $this;
    }


    public function getArray(){
        return array(
            ':USU_CodigoInterno' => $this->USU_CodigoInterno,
            ':USU_DNI' => $this->USU_DNI,
            ':USU_PriNombre' => $this->USU_PriNombre,
            ':USU_SegNombre' => $this->USU_SegNombre,
            ':USU_ApePaterno' => $this->USU_ApePaterno,
            ':USU_ApeMaterno' => $this->USU_ApeMaterno,
            ':USU_Usuario' => $this->USU_Usuario,
            ':USU_Clave' => $this->USU_Clave,
            ':USU_Token' => $this->USU_Token,
            ':USU_Telefono' => $this->USU_Telefono,
            ':USU_Correo' => $this->USU_Correo,
            ':USU_FechaNacimiento' => $this->USU_FechaNacimiento,
            ':USU_FechaRegistro' => $this->USU_FechaRegistro,
            ':USU_Estado' => $this->USU_Estado,
            ':SEXO' => $this->SEXO,
        );
    }

    /**
     * Summary of getArrayAll
     * @return array
     */
    public function getArrayAll(){
        return array(
            ':USU_CodigoInterno' => "%%",
            ':USU_DNI' => "%%",
            ':USU_PriNombre' => "%%",
            ':USU_SegNombre' => "%%",
            ':USU_ApePaterno' => "%%",
            ':USU_ApeMaterno' => "%%",
            ':USU_FechaNacimiento' => "%%",
            ':USU_FechaRegistro' =>"%%",
            ':USU_Estado' => "1",
            ':SEXO' => "%%",
        );
    }
}
?>
