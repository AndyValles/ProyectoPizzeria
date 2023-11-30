@extends("./AdminCRUD/layout_admin")

@section("css")
    <link rel="stylesheet" href="{{ asset("/css/pedido/pedido.min.css") }}">
@endsection

@section("title","Pedidos")

@section("admin-section")
<article class="w-100 df pr">
    <section class="ctn-pedido">
        <section class="txt-pedido-title">Pedidos</section>
        <section class="ctn-search-pedido">
            <article class="w-80">
                <div class="input-search-pedido" >
                    <div class="ctn-icon-pedido"><i class="icon-search"></i></div>
                    <input type="text" class="input input-pedido">
                </div>
            </article>
            <article class="w-80">
                <div></div>
            </article>
            <article class="w-80">
                <div></div>
            </article>
        </section>

        <section class="ctn-filter-search">

        </section>

        <section class="ctn-info-pedido">
            <div>Tu tienes <span class="txt-col-pedido">10</span> pedidos</div>
            <div>buscar por</div>
        </section>
        <section class="ctn-pedido-table">
            <!--articulo-->
          <!--
            <article class="table-pedido">
                <div class="row-table-pedido icon-pedido-table"><i class="icon-delivery"></i></div>
                <div class="row-table-pedido info-pedido-table">
                    <div class="txt-title-pedido">Usuario</div>
                    <div class="subtxt-title-pedido ">Articulos</div>
                </div>
                <div class="row-table-pedido info-pedido-table">
                    <div class="txt-fecha-pedido">total</div>
                    <div class="txt-total-pedido">fecha</div>
                </div>
                <div class="row-table-pedido info-pedido-table">
                    <button class="btn btn-ver">Ver</button>
                </div>
            </article>-->
            <!--endarticulo-->

            <?=$pedido?>

        </section>

    </section>

</article>
@endsection

@section("scripts")
    <script type="module"   src="{{ asset("/js/src/axios/crud/$entidad.min.js") }}"></script>
@endsection
