<?php
 namespace App\Http\Controllers;

 use App\Models\entitys\tb_lugar;

 use App\Models\Procedure\Buscar\search;
 use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
 use Illuminate\Foundation\Bus\DispatchesJobs;
 use Illuminate\Foundation\Validation\ValidatesRequests;
 use Illuminate\Http\Request;
 use App\Models\Procedure\Procedure;

class localController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    private $search;

    public function __construct(){
        $this->search=new search();
    }
    public function index(){
        $data["sucursales"]=$this->sucursales();
        return  view("locales",$data);
    }

    public function actual_date(){
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $actual_date= $meses[date('n')-1]." ".date('d').",".date('Y') ;
        return $actual_date;
    }
    public function sucursales($column="",$value=""){
        $html="";
        $url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3349897343323!2d-76.89297532581176!3d-12.020443341409438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c3c376b5ca9b%3A0xa771956f7657e71b!2zUMOtenphIExhIERlbMOtY8OtYQ!5e0!3m2!1ses-419!2spe!4v1686871549982!5m2!1ses-419!2spe";
        $sucursal=$this->search->search_Sucursal($column,$value,$this->search->cantidad_Sucursal());
        foreach($sucursal as $key=>$values){
        $distrito=$this->search->search_Distrito("DIS_CodigoInterno",$values->DIS_CodigoInterno);
        $html.='  <section class="local-card">
        <section class="w-100">
            <div class="row-local-card">
                <div class="w-8em"><img src="'.asset("/resource/LOGO OFICIAL.png").'" alt="logo.png" class="w-100"></div>
                <div class="w-100">
                    <div class="txt-local-title">PIZZERIA LA DELICIA</div>
                    <div  class="txt-local-subtitle">'.$this->actual_date().'</div>
                </div>

            </div>
            <div class="w-100 mr-10 df">
                    <div class="df-ac-jc mr-lr-10"><i class="icon-home3"></i></div>
                    <div class="txt-local-descrip">Referencia:'.$values->SUC_Referencia.' - Distrito: ';
                    foreach($distrito as $k=>$v){
                        $html.=$v->DIS_Nombre;
                    }
                   $html.= ' - Direccion:'.$values->SUC_Direccion.'</div>
            </div>
            <div class="w-100">
                <article class="w-100 df">
                    <section class="w-10 df-ac-jc">
                        <div><i class="icon-paragraph-left"></i></div>
                    </section>
                    <section class="ctn-item ">
                        <div class="txt-sublocal-title">Hora de atencion</div>
                        <div>'.$values->SUC_HorasAtencion.'</div>
                    </section>
                    <section class="ctn-item">
                        <div class="txt-sublocal-title">Telefono</div>
                        <div>'.$values->SUC_Telefono.'</div>
                    </section>
                    <section class="ctn-item">
                        <div class="txt-sublocal-title">KM</div>
                        <div>20km</div>
                    </section>
                </article>
            </div>
        </section>
        <section class="cnt-mapa">
            <iframe src="'.$values->SUC_URL.'" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </section>';
            }
        return $html;
    }
}
?>
