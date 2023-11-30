<?php  //declare(strict_types=1);

namespace App\Models\entitys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_lugar extends Model
{
    use HasFactory;

    protected $table = 'tb_lugar';
    protected $codigo;
    protected $nombre;
    protected $estado;

    public function getTable(){ return $this->table;}
    public function setCodigo($codigo)  {   $this->codigo = $codigo; }
    public function setNombre($nombre)  {   $this->nombre = $nombre; }
    public function setEstado(String $estado)  {   $this->estado = $estado; }
    public function getCodigo():int  {   return $this->codigo; }
    public function getNombre():string  {   return $this->nombre; }
    public function getEstado():string  {   return $this->estado; }

    public function getArray():array{
        return [":LUG_Codigo"=>$this->getCodigo(), ":LUG_Nombre"=>$this->getNombre(), ":LUG_Estado"=>$this->getEstado()];
    }

    public function getArrayAll():array{
        return [":LUG_Codigo"=>"%%", ":LUG_Nombre"=>"%%", ":LUG_Estado"=>"1"];
    }
}
