<?php
 namespace App\Http\Controllers;

 use App\Models\entitys\tb_articulo;

 use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
 use Illuminate\Foundation\Bus\DispatchesJobs;
 use Illuminate\Foundation\Validation\ValidatesRequests;
 use Illuminate\Http\Request;
 use App\Models\Procedure\Buscar\search;
 use App\Models\Procedure\Procedure;
 use Carbon\Carbon;

 class dashboardController extends Controller
 {
     use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     private $search;

     public function __construct(){
        $this->search=new search();
     }

     public function index(){
        $data["tiempo"]=$this->tiempo()["time"];
        $data["comentar"]=$this->tiempo()["comentario"];
        $data["pedido"]=$this->table_pedido();
        $data["usuario"]=$this->table_usuario();
        $data["nombre"]=$this->usuario();
        $data["totales"]=$this->totales();
        $data["entidad"]="null";
        return view("AdminCRUD.Inicio.dashboard",$data);
     }

     public function tiempo(){
        $date=date("H");
        $tiempo=array("time"=>"Buenas Noches","comentario"=>"la noche");
        if($date>=6 and $date<12){
            $tiempo["time"]="Buenos Dias";
            $tiempo["comentario"]="el día";
        }else if($date>=12 and $date<18){
            $tiempo["time"]="Buenas Tardes";
            $tiempo["comentario"]="la tarde";
        }
        return $tiempo;
     }

     public function usuario(){
        $nombre="";
        if(session()->get("userId")!=null){
            $usuario=$this->search->search_Usuario("USU_CodigoInterno",session()->get("userId"));
            foreach($usuario as $key=>$valor){
                $nombre=$valor->USU_PriNombre;
            }
        }
        return $nombre;
     }


     public function totales(){
        $value=array();
        $value["usuario"]=$this->search->cantidad_Usuario();
        $value["articulo"]=$this->search->cantidad_Articulo();
        $value["administrador"]=$this->search->cantidad_Administrador();
        $value["pedidos"]=$this->search->cantidad_Pedido();
        $value["proveedor"]=$this->search->cantidad_proveedor();
        return $value;
     }

     public function table_usuario(){
       $html="";
       $usuario=$this->search->search_Usuario("","",5);
       foreach($usuario as $key=>$value){
        $html.='<section class="table-user">
            <div class="row-user"><i class="icon-user"></i></div>
            <div class="row-user">
                <div class="txt-user-pri">'.$value->USU_PriNombre.'</div>
                <div class="txt-user-sec">'.$value->USU_Correo.'</div>
            </div>
            <div class="row-user">'.$value->USU_FechaRegistro.'</div>
        </section>
        ';
       }
        return $html;
     }

     public function table_pedido(){
        $html="";
        $pedido=$this->search->search_pedido("","",5);
        foreach($pedido as $key=>$value){
            if($value->PED_Estado=="2"){
            $html.='<tr class="row-body">
                    <td>'.($key+1).'</td>
                    <td>'.$value->PED_Numero.'</td>
                    <td>'.$value->USU_CodigoInterno.'</td>
                    <td>'.$value->PED_FechaRegistro.'</td>
                </tr>';
            }
        }
         return $html;
     }
 }
?>
