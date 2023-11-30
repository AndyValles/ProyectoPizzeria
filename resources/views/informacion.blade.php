<!DOCTYPE html>
<html lang="sp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/css.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/primary/menu_info.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/primary/body.min.css") }}">
    <link rel="shortcut icon" href="{{ asset("/resource/LOGO OFICIAL.png") }}">
    <link rel="stylesheet" href="{{ asset("/fonts/font-pizza_style.css")  }}">
    <title>PIZZERIA DELICIA</title>
</head>

<body>
    <header class="content-Menu">
        <div class="icon-image-menu">
            <a class="w-20 text-menu" href="#"><img src="{{ asset("/resource/LOGO OFICIAL.png") }}" alt="logo.png" width="100"></a>
        </div>
        <div class="menu-item"><a class="w-100 text-menu select-item-menu" href="{{url("/informacion")}}">Inicio</a></div>
        @if($id==null)
            <div class="menu-item"><a class="w-100 text-menu" href="{{ url("/iniciarsesion")}}">Iniciar sesión</a></div>
        @else
            <div class="menu-item"><a class="w-100 text-menu" href="{{ url("/usuario/$id")}}"><?=$user?></a></div>
        @endif
        <div class="menu-item"><a class="w-100 text-menu" href="{{ url("/categorias")}}">Menu</a></div>
        <div class="menu-item"><a class="w-100 text-menu" href="{{ url("/")}}">Visitanos</a></div>
    </header>
    <section class="w-100 ">
        <div class="w-100 content-fondo"><img class="ob-c" src="{{ asset("/img/public/FONDO/FONDO_img_1.jpg") }}" alt="fondo.png" width="100%" height="100%"></div>
        <div class="content-banner">
            <div class="content-txt-banner ">
                <div class="line bg-gray-50"></div>
                <span class="txt-banner w-100">BIENVENIDO A</span>
                <div class="line bg-gray-50"></div>
            </div>
            <div class="w-40"><img src="{{ asset("/resource/LOGO OFICIAL.png") }}" alt="logo.png" width="100%"></div>
            <div class="w-100 displayC-f-ACJC"><a href="{{  url("/")}}" class="df-ac-jc btn-banner">Visitanos</a></div>
        </div>
    </section>
    <section class="m-50">
        <div class="containt-menu">
            <div class="content-txt-menu">
                <div class="line bg-gray-202"></div>
                <span class="txt-banner w-50">Menu</span>
                <div class="line bg-gray-202"></div>
            </div>
            <div class="w-50px "><i class="icon-spoon-knife txt-3"></i></div>
            <div class="txt-descripcion-menu">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel tristique mauris, sed sollicitudin ex. </div>
            <div class="w-90 cc-menu">
                <div class="row-menu-item">
                    <?=$tipoArt?>
                </div>
                <div class="content-plato">
                        <?=$producto?>
                </div>
            </div>
        </div>
    </section>
    <section class="dp-flex mtp-50">
        <div class="content-history">
            <div class=""><div class="title-history">Nuestra Historia</div></div>
            <div class="w-50px "><i class="icon-spoon-knife txt-3"></i></div>
            <div class="descrip-history">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel tristique mauris, sed sollicitudin ex. Aenean massa orci, commodo vel tellus quis, efficitur semper eros. Pellentesque at velit lectus. Aliquam pellentesque maximus nunc,
                eu suscipit lorem pulvinar eu.</div>
        </div>
        <div class="content-history-img">
            <div class="w-100"><img src="{{ asset("/img/public/PASTAS/FETUCCINE A LA BOLOGNESA.jpg") }}" alt="img.png" width="100%"></div>
            <div class="w-100"><img src="{{ asset("/img/public/PASTAS/Canelones de carne.jpg") }}" alt="img.png" width="100%"></div>
            <div class="w-100"><img src="{{ asset("/img/public/PASTAS/ravioles a lo alfredo.jpg") }}" alt="img.png" width="100%"></div>
            <div class="w-100"><img src="{{ asset("/img/public/PASTAS/lassagna Especial.jpg") }}" alt="img.png" width="100%"></div>
        </div>
    </section>
    <section class="content-info">
        <div class="content-info-img"><img class="img-info-content" src="{{asset("/img/public/REF/repartir.jpg")}}" alt=""></div>
        <div class="content-info-descrip">
            <div class="info-title">INCREÍBLE PIZZERIA VEN Y EXPERIMENTA LAS DELICIAS QUE OFRECEMOS PARA A TI</div>
            <div class="info-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel tristique mauris, sed sollicitudin ex. Aenean massa orci, commodo vel tellus quis, efficitur semper eros. Pellentesque at velit lectus. Aliquam pellentesque maximus nunc,
                eu suscipit lorem pulvinar eu.</div>
            <div class="info-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel tristique mauris, sed sollicitudin ex. Aenean massa orci, commodo vel tellus quis, efficitur semper eros. Pellentesque at velit lectus. Aliquam pellentesque maximus nunc,
                eu suscipit lorem pulvinar eu.</div>
            <div class="w-100"><a href="{{ url("/categorias")}}" class=" df-ac-jc btn-info">CONOCE NUESTRO MENU</a></div>
        </div>
    </section>
    <section class="content-local">
        <div class="local-mapa"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3349897343323!2d-76.89297532581176!3d-12.020443341409438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c3c376b5ca9b%3A0xa771956f7657e71b!2zUMOtenphIExhIERlbMOtY8OtYQ!5e0!3m2!1ses-419!2spe!4v1686871549982!5m2!1ses-419!2spe" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        <div class="w-50">
            <div class="local-descrip">
                <div class="mtp-10">
                    <div class="row-local w-100 mtp-10">
                        <div class="title-history">UBICACION</div>
                        <div class="title-delivery">DELIVERY</div>
                    </div>
                    <?=$sucursal?>
                </div>
            </div>
            <div class="w-50 mtp-10">
                <a href="{{ url("/locales")}}" class="df-ac-jc btn-local">Ver mas</a>
            </div>
        </div>

    </section>
    <footer class="content-footer">
        <div class="row-footer">
            <div class="w-30">
                <div><img src="{{ asset("/resource/LOGO OFICIAL.png") }}" alt="logo.png" width="100"></div>
                <div class="gray-161">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel tristique mauris, sed sollicitudin ex</div>
            </div>
            <div class="w-50 displayC-f-ACJC">
                <div class="title-footer">HORAS DE TRABAJO</div>
                <div class="gray-161">LUN - VIER 08:00 AM - 10:00 PM</div>
                <div class="gray-161">LUN - VIER 08:00 AM - 10:00 PM</div>
                <div class="w-50 df-ac-jc">
                    <div class="footer-img-row"><a href="https://www.facebook.com/pizzaladelicia"><img src="{{ asset("./resource/facebook.png") }}"alt="icon.png" width="100%"></a></div>
                    <div class="footer-img-row"><a href="https://www.tiktok.com/@pizza.ladelicia?_t=8bPP9X2U097&_r=1"><img src="{{ asset("./resource/tik_tok.png") }}" alt="icon.png" width="100%"></a></div>
                    <div class="footer-img-row"><a href="https://www.instagram.com/pizza.ladelicia/?hl=es"><img src="{{ asset("./resource/instagram.png") }}" alt="icon.png" width="100%"></a></div>
                </div>
            </div>
            <div class="w-30 displayC-f-ACJC">
                <div class="title-footer">EMAIL</div>
                <div class="gray-161">ejempli@gmail.com</div>
                <div class="w-100 displayC-f-ACJC"><button class="btn btn-local">Conocenos mas</button></div>
            </div>
        </div>
        <div class="content-Pri">@2023 TODAS DERECHOS RESERVADOS | POLITICAS DE PRIVACIDAD </div>
    </footer>
</body>

</html>

</html>
