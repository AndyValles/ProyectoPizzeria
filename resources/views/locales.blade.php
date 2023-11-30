

@extends("layout")

@section("title","Locales")

@section("css")
<link rel="stylesheet" href="{{ asset("/css/primary/local.min.css")  }}">
@endsection

@section("section")
<section class="cnt-local">
    <article class="row-local">
        <div class="cnt-local-search">
            <input type="text" class="input input-local-search">
            <button class="btn btn-search-local"><i class="icon-search"></i></button>
        </div>
        <div class="cnt-local-search">
            <input type="text" class="input input-local-search">
            <div class="info-local-search">KM</div>
        </div>
    </article>
     <!--local-->
    <article class="cnt-local-card">
        <?=$sucursales?>
    </article>

     <!--endlocal-->
</section>

@endsection
