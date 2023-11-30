<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_inventario;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;

class inicioController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private  $search;

    public function __construct()
    {
        $this->search=new search();
    }
    public function ObtenerItem($id){
        $html=' <div class="w-20 df-ac-jc">'.($id=="articulo"?'Articulo:':'Item:').'</div>
                <div class="w-100">';
                    if($id=="articulo"){
                        $html.=$this->search->select_Articulo();
                    }else{
                        $html.=$this->search->select_Item();
                    }
        $html.='</div></div>';
        return $html;
    }
}
?>
