@extends("layout")

@section("title","Categoria")

@section("css")
    <link rel="stylesheet" href="{{ asset("/css/primary/categorias.min.css")  }}">
@endsection


@section("section")
    <section class="ctn-content-categorie">
        <section class="cnt-filter">
            <div class="fs-2em">Filtro</div>
            <!--rangos-->
            <div class="w-100 pr df">
                <input type="text" class="input-filter w-100">
                <button class="btn btn-icon-filter"><i class="icon-search"></i></button>
            </div>

            <div  class="cnt-filter-price">
                <div class="row-filter-price"><div class="txt-filter-price">Precio</div><div><i class="fa-solid fa-caret-up"></i></div></div>

                <div>
                    <div>
                       <label> De</label>
                       <input type="text" class="input-filter w-20">
                       <label> A</label>
                       <input type="text" class="input-filter w-20">
                    </div>
                </div>
            </div>
             <!--end rangos-->
              <!--resultado-->
            <div>
                <div class="row-filter-price"><div class="txt-filter-price">Categoria</div><div><i class="fa-solid fa-caret-up"></i></div></div>
                <div class="w-100">
                    <input type="text" class="input-filter w-100">
                </div>
                <div class="mr-10">
                    <div class="pr df mr-10">
                        <input type="checkbox" class="input-checkbox" checked> <div class="cbk"><i class="icon-checkmark white-255"></i></div><span>Pizza</span>
                    </div>
                    <div class="pr df  mr-10">
                        <input type="checkbox" class="input-checkbox" checked> <div class="cbk"><i class="icon-checkmark white-255"></i></div><span>Pasta</span>
                    </div>
                    <div class="pr df  mr-10">
                        <input type="checkbox" class="input-checkbox" checked> <div class="cbk"><i class="icon-checkmark white-255"></i></div><span>Bebidas</span>
                    </div>
                </div>
            </div>
             <!--end resultado-->
        </section>
        <!--end filtros-->
        <section class="cnt-categoria">
            <div class="txt-title-categoria">Productos</div>
            <div class="txt-subtitle-categoria">Encontrada <?=$cantidad?> productos</div>
            <div class="cnt-pop-filter">
                <!--?=$filtros?-->
            </div>
            <!--categorias-->
            <div class="containt-categoria">
               <?=$productos?>

            </div>
            <!--end categorias-->
            <!--paginacion-->
            <?=$paginate?>
            <!--end paginacion-->
        </section>
    </section>

@endsection

