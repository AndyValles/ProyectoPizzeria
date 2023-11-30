<?php
namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_administrador extends Model
{
    use HasFactory;

     private $ADM_Codigo;
     private $USUARIO;
     private $ADM_Write;
     private $ADM_READ;
     private $ADM_VIEW;
     private $ADM_CodigoConfirmacion;
     private $ADM_Ip;
     private $ADM_Estado;



     public function getADM_Codigo()
     {
          return $this->ADM_Codigo;
     }

     public function setADM_CodigoInterno($ADM_Codigo)
     {
          $this->ADM_Codigo = $ADM_Codigo;

          return $this;
     }

     /**
      * Get the value of USUARIO
      */
     public function getUSUARIO()
     {
          return $this->USUARIO;
     }

     /**
      * Set the value of USUARIO
      *
      * @return  self
      */
     public function setUSUARIO($USUARIO)
     {
          $this->USUARIO = $USUARIO;

          return $this;
     }

     /**
      * Get the value of ADM_Write
      */
     public function getADM_Write()
     {
          return $this->ADM_Write;
     }

     /**
      * Set the value of ADM_Write
      *
      * @return  self
      */
     public function setADM_Write($ADM_Write)
     {
          $this->ADM_Write = $ADM_Write;

          return $this;
     }

     /**
      * Get the value of ADM_READ
      */
     public function getADM_READ()
     {
          return $this->ADM_READ;
     }

     /**
      * Set the value of ADM_READ
      *
      * @return  self
      */
     public function setADM_READ($ADM_READ)
     {
          $this->ADM_READ = $ADM_READ;

          return $this;
     }

     /**
      * Get the value of ADM_VIEW
      */
     public function getADM_VIEW()
     {
          return $this->ADM_VIEW;
     }

     /**
      * Set the value of ADM_VIEW
      *
      * @return  self
      */
     public function setADM_VIEW($ADM_VIEW)
     {
          $this->ADM_VIEW = $ADM_VIEW;

          return $this;
     }

     /**
      * Get the value of ADM_CodigoConfirmacion
      */
     public function getADM_CodigoConfirmacion()
     {
          return $this->ADM_CodigoConfirmacion;
     }

     /**
      * Set the value of ADM_CodigoConfirmacion
      *
      * @return  self
      */
     public function setADM_CodigoConfirmacion($ADM_CodigoConfirmacion)
     {
          $this->ADM_CodigoConfirmacion = $ADM_CodigoConfirmacion;

          return $this;
     }

     /**
      * Get the value of ADM_Ip
      */
     public function getADM_Ip()
     {
          return $this->ADM_Ip;
     }

     /**
      * Set the value of ADM_Ip
      *
      * @return  self
      */
     public function setADM_Ip($ADM_Ip)
     {
          $this->ADM_Ip = $ADM_Ip;

          return $this;
     }

     /**
      * Get the value of ADM_Estado
      */
     public function getADM_Estado()
     {
          return $this->ADM_Estado;
     }

     /**
      * Set the value of ADM_Estado
      *
      * @return  self
      */
     public function setADM_Estado($ADM_Estado)
     {
          $this->ADM_Estado = $ADM_Estado;

          return $this;
     }
     public function getArray(){
        return [
            ':ADM_Codigo' => $this->ADM_Codigo,
            ':USUARIO' => $this->USUARIO,
            ':ADM_Write' => $this->ADM_Write,
            ':ADM_READ' => $this->ADM_READ,
            ':ADM_VIEW' => $this->ADM_VIEW,
            ':ADM_CodigoConfirmacion' => $this->ADM_CodigoConfirmacion,
            ':ADM_Ip' => $this->ADM_Ip,
            ':ADM_Estado' => $this->ADM_Estado
        ];
     }

     public function getArrayAll(){
        return [
            ':ADM_Codigo' =>"%%",
            ':USUARIO' => "%%",
            ':ADM_Write' => "%%",
            ':ADM_READ' => "%%",
            ':ADM_VIEW' => "%%",
            ':ADM_Estado' => "1"
        ];
     }
}
?>
