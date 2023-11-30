@extends("layout")

@section("title","Iniciar Sesion")
@section("css")
<link rel="stylesheet" href="{{ asset("/css/primary/login.min.css")}}">
@endsection
@section("section")
    <section class="ctn-text-error"></section>
    <section class="content-login">
        <div class="login-image">
            <img src="{{asset("img/public/REF/logo1 (2).jpg")}}" alt="" sizes="" srcset="">
        </div>
        <div class="w-100 df">
            <div class="cnt-login">
                @yield("login")
                <!--<div class="w-100"><img src="{{ asset("/resource/LOGO OFICIAL.png") }}" alt="logo.png"  class="w-20"></div>-->
            </div>
        </div>
    </section>
    @endsection
    @section("script")
    <script type="module" src="{{ asset("./js/src/axios/login.min.js")}}"></script>
    @endsection
