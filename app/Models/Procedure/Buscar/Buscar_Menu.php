<?php
    namespace App\Models\Procedure\Buscar;
    use App\Models\Procedure\Procedure;
    class Buscar_Menu{
        private $parameter=array("MEN_CodigoInterno","MEN_CodigoPadre","MEN_Nombre","MEN_Tipo","MEN_Estado");
        private $procedure;
        public function __construct() {
            $this->procedure=new Procedure("","PROCEDURE_SELECT_Menu");
        }

        public function BusquedaAll(){
            $values=array();
            for($i=0;$i<count($this->parameter);$i++){
                $values[$i]="%%";
            }
            return $this->procedure->search($values,$this->CantidaTotales($values),0);
        }

        public function BusquedaParametro($value,$nameValue){
            $values=array();
            for($i=0;$i<count($this->parameter);$i++){
                if($this->parameter[$i]!=$nameValue){
                    $values[$this->parameter[$i]]="%%";
                }else{
                    $values[$this->parameter[$i]]=$value;
                }
            }
            return $this->procedure->search($values,$this->CantidaTotales($values),0);
        }

        public function Busqueda($parameter,$limit,$offset){
            return $this->procedure->search($parameter,$limit,$offset);
        }

        public function CantidaTotales($parameter){
            $total=$this->procedure->pagination($parameter);
            return $total;
        }
    }
?>
