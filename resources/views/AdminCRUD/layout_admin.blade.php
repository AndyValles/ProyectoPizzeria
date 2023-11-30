<?php
    use App\Http\Controllers\Configuracion;
    $config=new Configuracion();
    $menu=$config->menu_Admin();
    $user=$config->user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="entidad" id="entidad" content="<?=$entidad?>">
    <meta name="base_root" id="base_root" content="<?=Request::root()?>">
    <meta name="base_url" id="base_url" content="<?= Request::url()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield("css")
    <link rel="stylesheet" href="{{ asset("/fonts/font-pizza_style.css") }}">
    <link rel="stylesheet" href="{{ asset("/css/menu/menu_admin.css") }}">
    <link rel="stylesheet" href="{{ asset("/css/css.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/css/modal/modal.css") }}">
    <link rel="stylesheet" href="{{ asset("/css/primary/modal_pedido.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/css/primary/component.min.css") }}">
    <link rel="shortcut icon" href="{{ asset("/resource/LOGO OFICIAL.png") }}">
    <script type="module" src="{{asset("/js/src/axios/axios.min.js")}}"></script>
    <title>@yield("title") - PIZZALADELICIA</title>
</head>
<body>
    @if($user==null)
    <div class="ctn-screen-expired">
        <div class="row-screen-expired">La Cuenta se encuentra expirada , Por favor ingrese para ver esta pantalla</div>
    </div>
    @endif
<section class="modal">

</section>
<div class="w-100 df">
    <!--menu-->
        <section class="cctn-admin">
        <article class="ctn-adminmenu">
                <section class="w-100 adminmenu-row">
                    <div class="adminmenu-cc"></div>
                    <div class="content-image-menu">
                        <img src="{{asset("/resource/LOGO OFICIAL.png") }}" alt="logo.png" class="adminmenu-img">
                        <div  class="ctn-close-menu"><button  class="btn btn-close-menu"><i class="icon-cross"></i></button></div>
                    </div>
                    @if($user!=null)
                    <?=$menu?>
                    @endif
                </section>
                    <div class="w-100">
                        <a class="btn adminmenu-a" href="{{ url("/") }}"><i class="icon-exit"></i> Salir</a>
                    </div>
        </article>
    </section>
      <!--fin menu-->
      @if($user!=null)
    <div class="ctn-content">
        <section class="cnt-admintopmenu">
            <div class="ctn-btn-hamburger"><button  class="btn bg-transparent w-100 btn-hamburger-menu"><i class="icon-menu "></i></button></div>
            <div class="w-100 df-ac-jc">
                <section class="ctn-admintopmenu-input">
                        <button class="btn btn-search-menu" >
                            <i class="icon-search"></i>
                            <div class="gray-155">Buscar por...</div>
                        </button>
                </section>
            </div>
            <div class="w-50 df-ac-jc">

                <a href="{{ url("/usuario/$user->USU_CodigoInterno")}}" class="ctn-btn-admin">
                    <div class="w-20"><article class="row-image-user"><i class="icon-user"></i></article></div>
                    <div class="w-50">
                        <div class="blue-147"><?=$user->USU_PriNombre." ".$user->USU_ApePaterno?></div>
                        <div class="blue-147 fs-12"><?=$user->USU_Correo?></div>
                    </div>
                    <div class="w-50  df-ac-jc">
                        <i class="icon-bottom"></i>
                    </div>
                </a>

            </div>
        </section>
        <section class="cnt-adminruta">
            <article class="row-ruta" style="z-index: 100;"><button class="btn admin-ruta " >Inicio</button></article>
            <article class="row-ruta" style="z-index: 90;"><button class="btn admin-ruta" >@yield("title")</button></article>
            <article class="row-ruta"><button class="btn admin-ruta">Index</button></article>
        </section>
        <section>
            @yield("admin-section")
        </section>
    </div>
    <div class="modal-pedido">

    </div>
</div>
@endif
    <script src="{{ asset("/js/src/axios/axios/dist/axios.min.js") }}"></script>
    <script type="module" src="{{ asset("/js/src/axios/admin.min.js") }}"></script>
    @yield("scripts")
</body>
</html>
