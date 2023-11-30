<?php
namespace App\Http\Controllers;

use App\Models\entitys\tb_lugar;

use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class filtrocategoriaController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    private $search;
    private $limit=12;

    public function __construct(){
        $this->search=new search();
    }
    public function categoria(){
        $cantidad=$this->search->cantidad_Articulo();
        $data["paginate"]=$this->paginate(1);
        $data["filtros"]=$this->filtros();
        $data["cantidad"]=$cantidad;
        $data["productos"]=$this->product();
        return view('categorias',$data);
    }

    public function product(){
        $producto=$this->search->search_Articulo("","",$this->limit);
        $html="";
        foreach ($producto as $key=>$value){
        $html .="<div class='card-product'>
            <div class='cnt-card-image'><img src='".asset($value->ART_Imagen)."' alt='$value->ART_Imagen' width='100%' height='100%' class='ob-c'></div>
            <div class='cnt-card-info'>
                <div class='txt-card-name'>$value->ART_Nombre</div>
                <div class='txt-card-price'>$value->ART_Precio</div>
                <div class='txt-card-des'>$value->ART_Descripcion</div>
                <div class='w-100 df'>
                    <div class='w-100 mr-10'><a href='".url("/Producto/".$value->ART_CodigoInterno)."'  class='btn btn-card-agregar' data-id=$value->ART_CodigoInterno>Agregar al carrito</a></div>
                </div>
            </div>
        </div>";
    }
    return $html;
    }

    public function filtros(){
        $html="";
        $html .='<div class="pop-filter">
                    <div class="w-100 gray-112 txt-center">Precio:</div>
                    <div class="w-100 txt-center"><span>S/0</span>-<span>S/20</span></div>
                    <div class="w-30 txt-center"><button class="btn btn-pop"><i class="fa-solid fa-xmark"></i></button></div>
                </div>';
    return $html;
    }
    public function paginate($id){
        $articulo=$this->search->cantidad_Articulo();

        $key = $articulo;
        $numcant=$this->limit;
        $calculo=0;


        while (true)
        {
            if ($key > $numcant){
                $numcant += $this->limit;
            }else{
                if ($key == $numcant){
                    $calculo = $key / $this->limit;
                    break;
                }else{
                    $key += 1;
                }
            }
        }
        $html='<div class="cnt-pagination">';
        for($i=0;$i<$calculo;$i++){
            $html.='<div class="row-item-pagination '.($id==($i+1)?"row-item-pagination-select":"").'"><button class="btn bg-transparent w-100">'.($i+1).'</button></div>';
        }
        $html.='</div>';
        return $html;
    }
}
?>
