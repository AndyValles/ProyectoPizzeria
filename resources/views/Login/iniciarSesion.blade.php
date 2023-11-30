@extends("Login.login")
@section("login")
<div class="txt-title-login">Iniciar sesión</div>
<div class="gray-109 w-50 txt-center mr-10">Inicia sesion para que disfrute de mas beneficios
    y conocer mucho mas de nuestras pizzerias</div>
<div class="w-50 df-ac-jc">
    <button class="btn btn-login-gmail">
        <img src="{{ asset("/resource/googlr.png") }}" alt="google.png" class="img-login">Iniciar Sesion  con Gmail</button>
    </div>
<div class="pr w-50 cnt-row-login"><span class="gray-181 txt-medio">O</span></div>
<div class="w-50">

        @csrf
        <div  class="w-100 pr">
            <p for="" class="gray-74">Usuario<span class="important-text">*</span></p>
            <div class="w-100 df pr">
                <input type="text" class="input input-login w-100" id="USU_Usuario" name="USU_Usuario" maxlength="300">
                <div class="w-100 df-ac-jc icon-info-p"></div>
            </div>
        </div>
        <div class="w-100">
            <div class="ctn-ejes">
                <p  class="gray-74">Contraseña<span class="important-text">*</span></p>
                <button  class="btn btn-eye-contra" data-value="password"><i class="icon-eye"></i></button>
            </div>
            <div class="w-100 df pr">
                <input type="password" class="input input-login w-100" id="USU_Contra" name="USU_Contra" maxlength="300" data-value="password">
                <div class="w-100 df-ac-jc icon-info-p"></div>
            </div>
        </div>
        <div class="w-100 df mr-10">
            <input type="checkbox" name="cbk_user" id="cbk_user" class="mr-lr-10">
            <label for="cbk_user" class="gray-191">Mantener activo</label>
        </div>
        <div class="w-100 df-ac-jc mr-tb-20"><button class="btn btn-login-enviar">Ingresar</button></div>

    <div class="gray-191 df-ac-jc mr-tb-20">Olvidaste tu clave?<a href="{{url("/Restablecer")}}" class="red-223"> RESTABLECER</a></div>
    <div class="gray-191 df-ac-jc mr-tb-20">No tengo cuenta?<a href="{{ url("/Registrar")}}"  class=" btn-registrarse "> REGISTRARSE</a></div>
</div>

@endsection
