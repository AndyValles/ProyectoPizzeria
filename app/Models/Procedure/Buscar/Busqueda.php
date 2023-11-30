<?php
    namespace App\Models\Procedure\Buscar;
		use App\Models\Procedure\Procedure;
    use Exception;

    class Busqueda{

        private $procedure;
        public function __construct($nameProcedure) {
            $this->procedure=new Procedure("",$nameProcedure);
        }

        public function param(){
            $state=true;
            $parm=array();
            $count=0;
            while($state){
                try{
                $pro=$this->procedure->search($parm,1,0);
                $state=false;
                }catch(Exception $e){
                    $parm[$count]="%%";
                    $count+=1;
                }
            }
            return $parm;
        }
        public function parameter(){
            $parametro=array();
            $pro=$this->procedure->search($this->param(),count($this->param()),0);
            $a=0;
            foreach($pro as $key=>$x){
                foreach($x as $m=>$s){
                    $parametro[$a]=$m;
                    $a=$a+1;
                }
                break;
            }
            return $parametro;
        }

        public function BusquedaAll(){
            $values=array();
            for($i=0;$i<count($this->param());$i++){
                $values[$i]="%%";
            }
            return $this->procedure->search($values,$this->CantidaTotales($values),0);
        }

        public function BusquedaParametro($value,$numberValue){
           $values=array();
           $data=$this->param();

           for($i=0;$i<count($data);$i++){
                if($data[$i]!=$numberValue){
                    $values[$i]="%%";
                }else{
                    $values[$i]=$value;
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

        public function select_table($class,$value,$name){
            $val=array();$nam=array();$a=0;
            $data=$this->BusquedaParametro("%%",0);
            $html="<select class='input input-search-filter' id='".$class."' name='".$class."'>";
            $html.="<option  value='%%'>Seleccione...</option>";
                foreach($data as $key=>$val1){
                    foreach($val1 as $key1=>$d){
                        if($key1==$value){$val[$a]=$d;}
                        if($key1==$name){$nam[$a]=$d;}
                    }
                    $a=$a+1;
                }
                for($i=0;$i<count($val);$i++){

                    if(count($val)==count($nam)){
                        $html.="<option  value='".$val[$i]."'>". $nam[$i]."</option>";
                    }
                }

            $html.="</select>";
            return $html;
        }
    }
?>
