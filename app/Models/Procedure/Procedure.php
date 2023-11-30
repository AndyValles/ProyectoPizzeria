<?php
namespace APP\Models\Procedure;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

    class Procedure
    {
        private $nameProcedurecrud="";
        private $nameProcedureselect="";
        public function __construct($nameCRUD="",$nameSelect=""){
            $this->nameProcedurecrud=$nameCRUD;
            $this->nameProcedureselect=$nameSelect;
        }


        public  function create($params,$nameprocedure=""){
            $name=$nameprocedure==""?$this->nameProcedurecrud:$nameprocedure;
            return $this->CRUD($name,"C", $params);
        }

        public  function update($params,$nameprocedure=""){
            $name=$nameprocedure==""?$this->nameProcedurecrud:$nameprocedure;
            return $this->CRUD($name,"U", $params);
        }

        public  function delete($params){
            return $this->CRUD($this->nameProcedurecrud,"D", $params);
        }


        public function search($params,$limit,$offset){
            return $this->select($this->nameProcedureselect,"T", $params ,$limit,$offset);
        }

        public function pagination($params):int{
            $count=count($this->select($this->nameProcedureselect,"P", $params ,0,0));

            if($count==0){return 0;}

            return $this->select($this->nameProcedureselect,"P", $params ,0,0)[0]->COUNT;
        }

        public function validate($val,$dataType="string"){
            $dataType=$dataType==""?"string":strtolower($dataType);
            $data=array("string","int","double","float","boolean","char","array");
            $data_null=array($data[0]=>"",$data[1]=>0,$data[2]=>0,$data[3]=>0,$data[4]=>false,$data[5]=>'',$data[6]=>array());
            $valor="";
            //is_number(12);
            if($val=="" || $val==null){
                return $data_null[$dataType];
            }

            foreach($data as $key=>$value){
                if($dataType==$data){

                }
            }
        }

        public function load_img(Request $request,$name=""){
            $ruta_total="";
            //$this->validate($request, ['imagen' => 'required|image']);
                if($request->hasFile("imagen")){
                    $imagen=$request->file("imagen");
                    $nombreimagen=$name==""?$request->input("name"):$name.".".$imagen->guessExtension();
                    $ruta=public_path("img/request/post/");
                    $ruta_total="/img/request/post/".$nombreimagen;

                    copy($imagen->getRealPath(),$ruta.$nombreimagen);
                }
         return $ruta_total;
        }


        public function Paginate($total,$inicio,$cantidad)
        {
            $html = "";
            $key = $total;
            $numcant=$cantidad;
            $calculo=0;


            while (true)
            {
                if ($key > $numcant){
                    $numcant += $cantidad;
                }else{
                    if ($key == $numcant){
                        $calculo = $key / $cantidad;
                        break;
                    }else{
                        $key += 1;
                    }
                }
            }
            $inicio= $inicio==0? $calculo: $inicio;

            if($inicio>1){ $html.="<div><button class='btn btn-paginate' data-id='1'><i class='icon-left-arrow'></i></button></div>";}

            for ($i = 1; $i <= $calculo; $i++)
            {
                if ($i < 20){
                    $html .= "<div><button id='paginate-id" . $i . "' class='btn btn-paginate ".($i==$inicio?"btn-paginate-select":"")."' data-id='".$i."'>" . $i ."</button></div>";
                }else{
                    $html .= "<div>...</div>";
                }
            }

            if($inicio<$calculo){ $html.="<div><button class='btn btn-paginate' data-id='".$calculo."'><i class='icon-rigth-arrow'></i></button></div>";}

            return $html;
        }


        public function CRUD1($nameProcedurecrud, $params = array()){
            $Param="";
            $param=array();
            $numParam=count($params);

            foreach($params as $key => $clave){
                $Param.=(($numParam=$numParam-1)!=0 ? $key.",": $key);
                $param[$key]= $clave;
            }

            return DB::select('call '.$nameProcedurecrud.'('.$Param.')', $param);
        }


        public function CRUD($nameProcedure,$tipoCrud, $params = array()){
            $Param="";
            $param=array("TipoCrud"=>$tipoCrud);
            $numParam=count($params);
            foreach($params as $key => $clave){
                $Param.=(($numParam=$numParam-1)!=0 ? $key.",": $key);
                $param[$key]= $clave;
            }

            return DB::select(DB::raw('call '.$nameProcedure.'(:TipoCrud,'.$Param.')'), $param);
        }

        public function select($nameProcedure,$tipo, $params = array(),$limit=0,$offset=0){
            $Param="";
            $param=array("tipo"=>$tipo,"limit"=>$limit,"offset"=>$offset);
            $numParam=count($params);
            foreach($params as $key => $clave){
                $key=str_split($key)[0]!=":"?":".$key:$key;
                $Param.=(($numParam=$numParam-1)!=0 ? $key.",": $key);
                $param[$key]= $clave;
            }

           return DB::select(DB::raw('call '.$nameProcedure.'(:tipo,'.$Param.',:limit,:offset)'), $param);
        }

        public function login($nameProcedure,$usuario,$contra){
             $procedure=DB::select(DB::raw('call '.$nameProcedure.'(:usuario,:contra)'), array($usuario,$contra));
             $usuario=0;
             foreach($procedure as $key =>$value){
                $usuario=$value->USU_CodigoInterno;
             }
             return $usuario;
        }


        public function ObtenerEstado($nEstado)
        {
            $estado = "";
            switch ($nEstado)
            {
                case "Todos":
                    $estado = "%%";
                    break;
                case "Activo":
                    $estado = "1";
                    break;
                case "Desactivo":
                    $estado = "0";
                    break;
            }
            return $estado;
        }

        public function SelectPaginate($number)
        {
            $html = "";
            $html .= "<select class='input-paginate mrl-10' id='PaginateId' data-id='1' >";
            $value = 5;
            for ($i = 0; $i < 20; $i++)
            {
                $html .= "<option value='". $value ."' ".($value == $number ? "selected" : "") .">".$value."</option>";
                $value += 5;
            }
            $html .= "</select>";

            return $html;
        }

        public function select_estado($class){
            $html="";
            $data=array("Todos","Activo","Desactivo");
            $html.="<select class='input input-search-filter' id='".$class."' name='".$class."'>";
            for($i=0;$i<count($data);$i++){
            $html.="<option  value='".$data[$i]."'>".$data[$i]."</option>";
            }

            $html.="</select>";
            return $html;
        }

        public function Select_table($entidad, $number)
        {
            $html = "";
            $html .= "<select class='input-paginate mrl-10' id='PaginateId'>";
            $value = 5;
            for ($i = 0; $i < 20; $i++)
            {
                $html .= "<option value='". $value ."' ".($value == $number ? "selected" : "") .">".$value."</option>";
                $value += 5;
            }
            $html .= "</select>";

            return $html;
        }




    }
?>
