@extends("Login.login")
@section("login")
<div class="txt-title-login">Registrarse</div>
                <div class="gray-109 w-40 txt-center fs-10">Registrate para tener una cuenta donde podras ver los diferentes
                    beneficios que te trae el sitio web </div>
                    <div class="w-70">
                        @csrf
                        <div class="w-100 mr-tb-20 df">
                           <div  class="w-100 ">
                                <p class="gray-74">Primer Nombre:<span class="important-text">*</span></p>
                                <div class="w-100 df pr">
                                    <input type="text" class="input input-login w-80" id="USU_PriNombre" name="USU_PriNombre" maxlength="300">
                                    <div class="w-100 df-ac-jc icon-info-p"></div>
                                </div>
                            </div>
                           <div class="w-100 mr-lr-10">
                                <p class="gray-74">Segundo Nombre:<span class="important-text">*</span></p>
                                <div class="w-100 df pr">
                                    <input type="text" class="input input-login w-100" id="USU_SegNombre" name="USU_SegNombre" maxlength="300">
                                    <div class="w-100 df-ac-jc icon-info-p"></div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mr-tb-20 df">
                            <div  class="w-50">
                                 <p class="gray-74">Apellido Paterno:<span class="important-text">*</span></p>
                                 <div class="w-100 df pr">
                                    <input type="text" class="input input-login w-80" id="USU_ApePaterno" name="USU_ApePaterno" maxlength="300">
                                    <div class="w-100 df-ac-jc icon-info-p"></div>
                                </div>
                            </div>
                            <div class="w-50 mr-lr-10">
                                 <p class="gray-74">Apellido Materno:<span class="important-text">*</span></p>
                                <div class="w-100 df pr">
                                    <input type="text" class="input input-login w-100" id="USU_ApeMaterno" name="USU_ApeMaterno" maxlength="300">
                                    <div class="w-100 df-ac-jc icon-info-p"></div>
                                </div>
                            </div>
                         </div>
                        <div class="w-100 mr-tb-20">
                            <p class="gray-74">DNI:<span class="important-text">*</span></p>
                            <div class="w-100 df pr">
                                <input type="text" class="input input-login w-100" id="USU_DNI" name="USU_DNI" maxlength="300">
                                <div class="w-100 df-ac-jc icon-info-p"></div>
                            </div>
                        </div>
                        <div class="w-100 mr-tb-20">
                            <p class="gray-74">Telefono:<span class="important-text">*</span></p>
                            <div class="w-100 df pr">
                                <input type="text" class="input input-login w-100" id="USU_Telefono" name="USU_Telefono" maxlength="300">
                                <div class="w-100 df-ac-jc icon-info-p"></div>
                            </div>
                        </div>
                        <div class="w-100 mr-tb-20">
                            <p class="gray-74">Correo:<span class="important-text">*</span></p>
                            <div class="w-100 df pr">
                                <input type="text" class="input input-login w-100" id="USU_Correo" name="USU_Correo" maxlength="300">
                                <div class="w-100 df-ac-jc icon-info-p"></div>
                            </div>
                        </div>
                        <div class="w-100 mr-tb-20">
                            <p class="gray-74">Sexo:<span class="important-text">*</span></p>
                            <div class="w-100 df pr">
                                <select class="input input-login w-100" id="USU_Sexo" name="USU_Sexo">
                                    @foreach ($sexo as $key=>$value)
                                        <option value="<?=$key?>"><?=$value?></option>
                                    @endforeach
                                </select>
                                <div class="w-100 df-ac-jc icon-info-p"></div>
                            </div>
                        </div>
                        <div class="w-100 mr-tb-20">
                            <p class="gray-74">Usuario:<span class="important-text">*</span></p>
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

                        <div class="w-100 df-ac-jc mr-tb-20"><button class="btn btn-login-registrar">Registrar</button></div>
                        <div class="gray-191 df-ac-jc mr-tb-20">tengo cuenta? <a href="{{ url("/iniciarsesion")}}"  class="btn-entrar">INGRESAR</a></div>
                    </div>

@endsection
