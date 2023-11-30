<?php

namespace App\Http\Controllers;

use App\Models\entitys\tb_usuario;
use App\Models\Procedure\Buscar\Busqueda;
use App\Models\Procedure\Buscar\search;
use App\Models\Procedure\Buscar\Selects;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Procedure\Procedure;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private const ruta ="./AdminCRUD/Usuario/";
    private  $busqueda;
    private $search;
    private $usuario;
    private $procedure;
    private $entidad="usuario";

    /*GENERAR TOKEN
    private $fillable = ["token"];

    protected static function boot()
    {
        parent::boot();
        self::creating(function(Order $order) {
            do {
                $token = Str::uuid();
            } while (Order::where("token", $token)->first() instanceof Order);
            $order->token = $token;
        });
    }*/

    public function __construct(){
        $this->busqueda=new Selects();
        $this->search=new  search();
        $this->usuario=new tb_usuario();
        $this->procedure=new Procedure("PROCEDURE_CRUD_Usuario","PROCEDURE_SELECT_Usuario");
    }

    public function index(){
        $data=array();
        $data["entidad"] = $this->entidad;
        $data["data"] =  $this->table($this->usuario->getArrayAll());
        $data["url_modal"] = "modal_create";
        $data["url_filtro"] = "modal_filter";
        $data["select_estado"] = $this->procedure->select_estado("Bus_USU_Estado");
        $data["sexo"] = $this->busqueda->select_sexo("Index");
        $data["total"]=$this->procedure->pagination($this->usuario->getArrayAll());
        $data["paginate"]=$this->paginate($this->usuario->getArrayAll());
        $data["pgValue"]=$this->procedure->SelectPaginate(5);
        $data["Variable_prop"]="USU";
        $data["iniciA"]=5;
        return view(self::ruta.'usuarioIndex',$data);
    }

    public function Agregar($id=""){
        $valor=array("dni"=>"", "prinombre"=>"", "segnombre"=>"",
                    "apepaterno"=>"", "apematerno"=>"", "usuario"=>"",
                     "clave"=>"", "telefono"=>"", "correo"=>"", "fechanacimiento"=>"", "token"=>"",);
        if($id!=""){
            $marc_value=$this->search->search_Usuario("USU_CodigoInterno",$id);
            foreach($marc_value as $key=>$value){
                $valor["dni"]=$value->USU_DNI;
                $valor["prinombre"]=$value->USU_PriNombre;
                $valor["segnombre"]=$value->USU_SegNombre;
                $valor["apepaterno"]=$value->USU_ApePaterno;
                $valor["apematerno"]=$value->USU_ApeMaterno;
                $valor["usuario"]=$value->USU_Usuario;
                $valor["clave"]=$value->USU_Clave;
                $valor["telefono"]=$value->USU_Telefono;
                $valor["correo"]=$value->USU_Correo;
                $valor["fechanacimiento"]=$value->USU_FechaNacimiento;
                $valor["token"]=$value->USU_Token;
            }
        }

        foreach($valor as $key=>$value){
            $data[$key]=$value;
        }
        $data["sexo"] = $this->search->select_sexo();
        $data["codigo"]=$id;
        $data["tipoEvent"]=$id==""?"Agregar":"Editar";
        $data["entidad"]=$this->entidad;
        return view(self::ruta."usuarioAgregar",$data);
    }

    public function modal_delete($id){
        $datable=$this->procedure->search(array($id,"%%","%%"),1,0);
        $name="";

        foreach ($datable as $key => $d) {
            $name=$d->USU_Nombre;
        }
        $data["entidad"]="usuario";
        $data["name"]=$name;
        $data["id"]=$id;
        return view("./modal/modal_delete", $data);
    }


    public function create(Request $request){
        $data=$this->procedure->create($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->usuario->getArrayAll())]);
    }

    public function update(Request $request){
        $data=$this->procedure->update($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->usuario->getArrayAll())]);
    }

    public function delete(Request $request){
        $data=$this->procedure->delete($this->valuesStore($request));
        return response()->json(['table'=> $this->table($this->usuario->getArrayAll())]);
    }

    public function paginate($busqueda=array("%%","%%","1"),$limit=1,$offset=5){
        $pag=$this->procedure->pagination($busqueda);
        $htm=$this->procedure->Paginate($pag,$limit,$offset);
        return $htm;
    }

    public function valuesStore(Request $request):array{
        $usuarioV=new tb_usuario();
        $usuarioV->setUSU_CodigoInterno($request->input("USU_CodigoInterno")==null?0:$request->input("USU_CodigoInterno"));
        $usuarioV->setUSU_DNI($request->input("USU_DNI")==null?0:$request->input("USU_DNI"));
        $usuarioV->setUSU_PriNombre($request->input("USU_PriNombre")==null?0:$request->input("USU_PriNombre"));
        $usuarioV->setUSU_SegNombre($request->input("USU_SegNombre")==null?0:$request->input("USU_SegNombre"));
        $usuarioV->setUSU_ApePaterno($request->input("USU_ApePaterno")==null?0:$request->input("USU_ApePaterno"));
        $usuarioV->setUSU_ApeMaterno($request->input("USU_ApeMaterno")==null?0:$request->input("USU_ApeMaterno"));
        $usuarioV->setUSU_Usuario($request->input("USU_Usuario")==null?0:$request->input("USU_Usuario"));
        $usuarioV->setUSU_Clave(Hash::make($request->input("USU_Clave")==null?0:$request->input("USU_Clave")));
        $usuarioV->setUSU_Token($request->input("USU_Token")==null?0:$request->input("USU_Token"));
        $usuarioV->setUSU_Telefono($request->input("USU_Telefono")==null?0:$request->input("USU_Telefono"));
        $usuarioV->setUSU_Correo($request->input("USU_Correo")==null?0:$request->input("USU_Correo"));
        $usuarioV->setUSU_FechaNacimiento($request->input("USU_FechaNacimiento")==null?0:$request->input("USU_FechaNacimiento"));
        $usuarioV->setUSU_FechaRegistro(date("Y-m-d H:i:s"));
        $usuarioV->setUSU_Estado($request->input("USU_Estado")==null?0:$request->input("USU_Estado"));
        $usuarioV->setSEXO($request->input("SEX_CodigoInterno")==null?0:$request->input("SEX_CodigoInterno"));
        return  $usuarioV->getArray();
    }

    public function loadData(Request $request){
        $USU_CodigoInterno=$request->input("USU_CodigoInterno")==null?"%%":$request->input("USU_CodigoInterno");
        $USU_DNI=$request->input("USU_DNI")==null?"%%":$request->input("USU_DNI");
        $USU_PriNombre=$request->input("USU_PriNombre")==null?"%%":$request->input("USU_PriNombre");
        $USU_SegNombre=$request->input("USU_SegNombre")==null?"%%":$request->input("USU_SegNombre");
        $USU_ApePaterno=$request->input("USU_ApePaterno")==null?"%%":$request->input("USU_ApePaterno");
        $USU_ApeMaterno=$request->input("USU_ApeMaterno")==null?"%%":$request->input("USU_ApeMaterno");
        $USU_FechaNacimiento=$request->input("USU_FechaNacimiento")==null?"%%":$request->input("USU_FechaNacimiento");
        $USU_FechaRegistro=$request->input("USU_FechaRegistro")==null?"%%":$request->input("USU_FechaRegistro");
        $USU_Estado=$request->input("USU_Estado")==null?"%%":$this->procedure->ObtenerEstado($request->input("USU_Estado"));
        $SEX_CodigoInterno=$request->input("SEX_CodigoInterno")==null?"%%":$request->input("SEX_CodigoInterno");

        $values=array(
            ":USU_CodigoInterno"=>$USU_CodigoInterno,
            ":USU_DNI"=>$USU_DNI,
            ":USU_PriNombre"=>$USU_PriNombre,
            ":USU_SegNombre"=>$USU_SegNombre,
            ":USU_ApePaterno"=>$USU_ApePaterno,
            ":USU_ApeMaterno"=>$USU_ApeMaterno,
            ":USU_FechaNacimiento"=>$USU_FechaNacimiento,
            ":USU_FechaRegistro"=>$USU_FechaRegistro,
            ":USU_Estado"=>$USU_Estado,
            ":SEX_CodigoInterno"=>$SEX_CodigoInterno
        );
        return response()->json(['values'=>$values,'entidad'=>"usuario"]);
    }

    public function search(Request $request){
        $data=$request->input("values")==null?$this->usuario->getArrayAll():$request->input("values");
        $limit=$request->input("limit");
        $offset=$request->input("offset");

        $calculo= ($offset-1)*$limit;
        $html=$this->table($data,$limit,$calculo);
        $paginate=$this-> paginate($data,$offset,$limit);
        return response()->json(['table'=>$html,'paginate'=>$paginate,'Ver'=>$calculo,'prueba'=>$request->input("values")]);
    }

    public function table($busqueda=array("%%","%%","1"),$limit=5,$offset=0){
        $data=$this->procedure->search($busqueda,$limit,$offset);
        $html="";
            foreach ($data as $key => $d) {
                $html.='<div class="table-body">
                    <div class="table-row">
                            <div class="table-cell">'.(($key+1)+$offset).'</div>
                            <div class="table-cell tb_Codigo">'.$d->USU_CodigoInterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->USU_DNI.'</div>
                            <div class="table-cell tb_Codigo">'.$d->USU_PriNombre." ".$d->USU_SegNombre.'</div>
                            <div class="table-cell tb_Codigo">'.$d->USU_ApePaterno." ".$d->USU_ApeMaterno.'</div>
                            <div class="table-cell tb_Codigo">'.$d->USU_Telefono.'</div>
                            <div class="table-cell tb_Codigo">'.$d->SEX_Nombre.'</div>
                            <div class="table-cell tb_Estado"><i class="icon-radio-checked status-active"></i>'. ($d->USU_Estado=="1"?"Activo":"Desactivado").'</div>
                            <div class="table-cell">
                                <section class="cnt-btn-option">
                                    <button  class="btn btn-option" onclick=""><i class="icon-eye"></i></button>
                                    <button  class="btn btn-option btn-editar-modal" data-id='.$d->USU_CodigoInterno.' ><i class="icon-pencil" ></i></button>
                                    <button  class="btn btn-option btn-close-modal" data-id='.$d->USU_CodigoInterno.' ><i class="icon-bin"></i></button>
                                </section>
                            </div>
                        </div>
                    </div>';
            }
        return $html;
    }
}

?>
