<?php
    use App\Models\Procedure\Buscar\search;
    use App\Http\Controllers\Configuracion;
    $search=new search();
    $config=new Configuracion();
    $base_root=Request::root();
    $base_url=Request::url();
    $cantidad=$config->total_pedidos()["cantidad"];
    $valor=$config->total_pedidos()["total"];
    $telefono="555 555 555";
    $distrito="SIN DISTRITO";

    $USER_AUTH=Auth::user();

    $SUC=session()->get("sucursalid");

    $sucursal=$search->search_Sucursal("SUC_CodigoInterno",$SUC);

    foreach($sucursal as $k => $v){
        $telefono=$v->SUC_Telefono;
        $distr=$search->search_Distrito("DIS_CodigoInterno",$v->DIS_CodigoInterno);
        foreach ($distr as $key => $value) {
            $distrito=$value->DIS_Nombre;
        }
    }
?>
<!DOCTYPE html>
<html lang="es" data-teme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="dis-session" id="dis-session" content="<?=$SUC?>">
    <meta name="base_root" id="base_root" content="<?=$base_root?>">
    <meta name="base_url" id="base_url" content="<?=$base_url?>">
    <link rel="stylesheet" href="{{ asset("/css/css.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("/css/primary/menu.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("/css/primary/index.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("/css/primary/modal.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("/fonts/font-pizza_style.css")  }}">

    @yield("css")
    <link rel="shortcut icon" href="{{ asset("/resource/LOGO OFICIAL.png") }}" >
    <title>@yield("title") La Delicia</title>
</head>
<body>
    <section class="modal"></section>

<!--Menu-->
<header class="cnt--menu">
    <div class="cnt-image">
        <a href="{{ url("/") }}"><img src="{{ asset("/resource/LOGO OFICIAL.png") }}" alt="" class="w-8rm"></a>
        <div class="ctn-close-menu"><button class="btn btn-close-menu"><i class="icon-cross"></i></button></div>
    </div>
    <div class="cnt-menu">
        <div class="w-20 df-ac-jc"><a href="{{ url("/") }}" class="item-menu <?=$base_url==url("/")?"select-item-menu":""?>">Inicio</a></div>
        <div class="w-20 df-ac-jc"><a href="{{ url("/categorias") }}" class="item-menu <?=$base_url == url("/categorias") ?"select-item-menu":""?>">Comidas</a></div>
        <div class="w-20 df-ac-jc"><a href="{{ url("/locales") }}" class="item-menu <?=$base_url==url("/locales")?"select-item-menu":""?>">Locales</a></div>
        <div class="cnt-menu-info">
            <!--Inicio de informacion-->
            <div class="row-menu-info">
                <div class=" df-ac-jc">
                    <div class="txt-info-1">telefono:</div>
                    <div class=""><button class="btn btn-distrito"><i class="icon-location"></i><span class="name_dis"><?=$distrito?> </span><i class="icon-bottom-arrow"></i></button></div>
                </div>

                <div class="txt-info-2 tel"><?=$telefono?></div>
            </div>
             <!--fin de informacion-->
        </div>
        <div class="w-30">
            <a href="{{url("/carrito")}}" class="w-100 df-ac-jc">
                <div class="cnt-carrito">
                    <button class="btn btn-carrito"><i class="icon-cart"></i></button>
                    <div class="gray-82_gray-224  car"><?=$cantidad?></div>
                </div>
                <div class="w-50">
                    <div class="gray-82_gray-224 ">Mi Carrito</div>
                    <div class="yelow-247  precio">S/.<?=$valor?></div>
                </div>
            </a>
        </div>
        <div class="w-50 df-ac-jc">
            @if (!Auth::check())
                <a href="{{url("/iniciarsesion")}}" class="btn btn-login">
                    <div><i class="icon-user"></i></div>
                    <div>Iniciar Sesión</div>
                </a>
            @else
                <a href="{{url("/usuario/$USER_AUTH->USU_CodigoInterno")}}" class=" btn-login">
                    <div><i class="icon-user"></i></div>
                    <div><?=$USER_AUTH->USU_PriNombre." ".$USER_AUTH->USU_ApePaterno?></div>
                </a>
            @endif
        </div>

    </div>
</header>
<!--End Menu-->
<div  class="ctn-btn-hamburger"><button class="btn btn-hamburger"><i class="icon-menu"></i></button></div>

@yield("section")

    <!--footer-->
    <footer class="ctn-footer">
        <div class="row-footer-1">
            <div class="column-footer">
                <div><img src="{{ asset("./resource/LOGO OFICIAL.png") }}" alt="" class="w-8rm"></div>
                <div class="white-255">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat
                    Lorem ipsum dolor sit amet,  </div>
            </div>
            <div class="column-footer">
                <div class="txt-title">Contactos</div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="">Preguntas y ayudas</a></div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="">Contactos</a></div>
                <div class="df">
                    <a href="https://www.facebook.com/pizzaladelicia" class="cnt-img-footer"><img src="{{ asset("./resource/facebook.png") }}" alt="" width="100%"></a>
                    <a href="https://www.tiktok.com/@pizza.ladelicia?_t=8bPP9X2U097&_r=1" class="cnt-img-footer"><img src="{{ asset("./resource/tik_tok.png") }}" alt="" width="100%"></a>
                    <a href="https://www.instagram.com/pizza.ladelicia/?hl=es" class="cnt-img-footer"><img src="{{ asset("./resource/instagram.png") }}" alt="" width="100%"></a>
                </div>
            </div>
            <div class="column-footer">
                <div class="txt-title">Sobre Nosotros</div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="{{ url("/locales")}}">Locales</a></div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="{{ url("/TrabajaN")}}">Trabaja con nosotros</a></div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="{{url("./informacion")}}">Informacion</a></div>
            </div>
            <div class="column-footer">
                <div class="txt-title">Politicas</div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="">Condiciones de uso</a></div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="">Terminos y condiciones</a></div>
                <div class="txt-subtitle"><a class="txt-subtitle" href="">Politicas y privacidad</a></div>
                <div class="w-50"><a  href="#" class="cnt-img-footer"><img src="{{ asset("./resource/libro-reclamacaiones.png") }}" alt="" width="100%"></a></div>
            </div>
            <div class="column-footer">
                <div class="white-255">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation </div>
            </div>
        </div>
        <div class="row-footer-2">

        </div>
    </footer>
    <!--end footer-->
    <!--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>-->
    <script src="{{ asset("/js/src/axios/axios/dist/axios.min.js") }}"></script>
    <script type="module" src="{{ asset("/js/src/index.js") }}"></script>
    @yield("script")
</body>
</html>
