<?php
 namespace App\Http\Controllers;

 use App\Models\entitys\tb_lugar;

 use App\Models\entitys\tb_usuario;
 use App\Models\Procedure\Buscar\search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
 use Illuminate\Foundation\Bus\DispatchesJobs;
 use Illuminate\Foundation\Validation\ValidatesRequests;
 use Illuminate\Http\Request;
 use App\Models\Procedure\Procedure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    private $procedure;
    private $usuario;
    private $logear;
    private $search;
    public function __construct(){
        $this->search=new search();
        $this->usuario=new tb_usuario();
    }

    public function entrar()
    {
        return view('Login.login');
    }


    public function login()
    {
        return view('Login.iniciarSesion');
    }

    public function Registrar()
    {
        $nombre=array();
        $sexo=$this->search->search_Sexo("","",$this->search->cantidad_Sexo());
        foreach($sexo as  $key=>$value){
            $nombre[$key]=$value->SEX_Nombre;
        }
        $data["sexo"]=$nombre;
        return view('Login.registrarse',$data);
    }

    public function Ingresar(Request $request)
    {
        request()->validate([
            "USU_Usuario"=>['required',"string"],
            "USU_Contra"=>["required","string"]
        ]);
        $this->procedure=new Procedure("","");
        $token = $request->session()->token();
        $token = csrf_token();
        $mensage="";
        $usuario=$request->input("USU_Usuario");
        $contra=$request->input("USU_Contra");
        $Remember=$request->input("Remember");
        $id=$this->procedure->login("PROCEDURE_LOGIN_Usuario",$usuario,$contra);
        $succes=false;

        if( $id!=0){
            $user=tb_usuario::Where("USU_CodigoInterno",$id)->first();
            if($user!=null){
                Auth::login($user);
                session(["userId"=>$id]);
                session()->regenerate();
            }
            $succes=true;
        }else{
            $mensage="El usuario o contraseña es  incorrecto, ingrese de nuevo";
        }
        return response()->json(["succes"=>$succes,"mensage"=>$mensage]);
    }


    public function Registro(Request $request)
    {
        $this->usuario->setUSU_CodigoInterno($request->input("USU_CodigoInterno"));
        $this->usuario->setUSU_DNI($request->input("USU_DNI"));
        $this->usuario->setUSU_PriNombre($request->input("USU_PriNombre"));
        $this->usuario->setUSU_SegNombre($request->input("USU_SegNombre"));
        $this->usuario->setUSU_ApePaterno($request->input("USU_ApePaterno"));
        $this->usuario->setUSU_ApeMaterno($request->input("USU_ApeMaterno"));
        $this->usuario->setUSU_Usuario($request->input("USU_Usuario"));
        $this->usuario->setUSU_Clave(Hash::make($request->input("USU_Clave")));
        $this->usuario->setUSU_Token($request->input("USU_Token"));
        $this->usuario->setUSU_Telefono($request->input("USU_Telefono"));
        $this->usuario->setUSU_Correo($request->input("USU_Correo"));
        $this->usuario->setUSU_FechaNacimiento($request->input("USU_FechaNacimiento"));
        $this->usuario->setUSU_FechaRegistro(date("Y-m-d H:i:s"));
        $this->usuario->setUSU_Estado("1");
        $this->usuario->setSEXO($request->input("SEX_CodigoInterno"));
            //encriptar bcrypt

        $this->procedure=new Procedure("PROCEDURE_CRUD_Usuario","");
        $this->procedure->create($this->usuario->getArray());
        $succes=true;
        return response()->json(["succes"=>$succes]);
    }

    public function Admin_User(Request $request)
    {
        $data["user"]=session()->get("userId");
        return view("admin_user",$data);
    }
}
?>
