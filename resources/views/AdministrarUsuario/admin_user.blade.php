
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="base_root" id="base_root" content="<?=  Request::root()?>">
    <meta name="base_url" id="base_url" content="<?=  Request::url()?>">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="{{ asset("/css/css.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("/css/primary/user.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("/fonts/font-pizza_style.css")  }}">

    <link rel="shortcut icon" href="{{ asset("/resource/LOGO OFICIAL.png") }}" >
    <title>Administrar  Usuario</title>
</head>
    <body>
        <div class="cnt-header">
            <div class="w-100 mr-10"><a href="{{ url()->previous() }}" class="btn-salir"><i class="icon-arrow-left2 mr-10"></i>Salir</a></div>
            <div class="w-40 df-ac-jc"><img src="{{ asset("/resource/LOGO OFICIAL.png") }}" alt="" class="w-8em mr-10"></div>
        </div>
            <section class="content-menu">
                <div class="cnt-total">
                        <section class="cnt-menu">
                            <article class="row-menu">
                                <div class="user-icon"><i class="icon-user"></i></div>
                            </article>
                            <article class="row-menu">
                                <div class="">
                                    <div class="txt-sub-name"><?=$nombres?></div>
                                    <div class="item-menu"><a href="<?=$correo?>" class="sub-font"><?=$correo?></a></div>
                                </div>
                            </article>
                            <article class="row-menu">
                                <div class="w-50">

                                    <div class="item-menu"><i class="icon-phone"></i><span><?=$telefono?></span></div>
                                    <div class="item-menu"><i class="icon-calendar"></i><span><?=$fechanacimiento?></span></div>
                                    <div class="item-menu"><i class="icon-users"></i><span><?=$sexo?></span></div>
                                </div>
                            </article>
                            <article class="row-menu">
                                <div><button class="btn bt-cerrar"><i class="icon-open"></i>Cerrar sesión</button></div>
                            </article>
                        </section>
                        @if($admin)
                            <section class="cnt-Admin">
                                <div class="w-100"><a href="{{url("/Admin/Inicio")}}" class="btn-admin"><span>Administrador</span>  <i class="icon-rigth-arrow"></i></a></div>
                            </section>
                        @endif
                </div>
                <section class="cnt-user">
                    <section class="cnt-btn-option">
                        <div class="row-btn-option"><button class="btn btn-option btn-profile btn-option-active"><i class="icon-profile "></i><span>Perfil</span></button></div>
                        <div class="row-btn-option"><button class="btn btn-option btn-location"><i class="icon-location"></i><span>Ubicacion</span></button></div>
                    </section>

                    <div class="cnt-user-add">
                        <?=$user_modal?>
                    </section>
                </div>
            </section>
        </section>
        <script src="{{ asset("/js/src/axios/axios/dist/axios.min.js") }}"></script>
        <script type="module" src="{{ asset("/js/src/axios/adminUser.min.js")}}"></script>
    </body>
</html>
