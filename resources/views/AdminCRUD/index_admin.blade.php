@extends("./AdminCRUD/layout_admin")


@section("css")
<link rel="stylesheet" href="{{ asset("/css/crud/crud.css") }}">
@endsection

@section("admin-section")
    <section class="cnt-crud">
        <section class="row-crud">
            <div class="crud-title">@yield("title")</div>
            <!--<div class="cnt-crud-Agregar">
                <button class="btn btn-crud-Agregar" onclick="cargar_modal('<?=$url_modal?>')"><i class="icon-plus"></i> Agregar</button>
            </div>-->

                <section class="row-crud-filter">
                    <div class="cnt-buscar-filter">
                        <article class="header-search-filter">Buscar @yield("title") Por: </article>
                        <article class="cnt-crud-filter-input">
                            @yield("input-buscar")

                        </article>
                    </div>
                </section>

                <div class="w-100 df">
                <div class="cnt-crud-tabs">
                    <div class="w-10"><button class="btn btn-crud-tabs btn-select-tabs">Tabla</button></div>
                    <div class="w-10"><button class="btn btn-crud-tabs ">Agregar</button></div>
                    <!--<div class="w-10"><button class="btn btn-crud-tabs ">Editar</button></div>-->
                    <!--<div class="w-10"><button class="btn btn-crud-tabs ">Exportar</button></div>-->
                </div>

                <div class="w-30 df-ac-jc pr">
                    <button class="btn btn-crud-filter">Filtro <i class="icon-filter"></i></button>
                    <div class="ctn-dropview-filter" id="content-Filtro">
                        <div class="dropview-item"><input type="text" class="input input-dropview-item" placeholder="buscar filtro"></div>
                        <section class="cnt-dropview-item">
                            @yield("drop-view-filter")
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!--tabla-->
        <section class="row-crud-table">
            <div class="table-crud">
                <div class="table-header">
                        <div class="table-cell">N°</div>

                        @yield("table-head")

                        <div class="table-cell">Acciones</div>
                </div>

                <div class="table-row h-0 pr">
                    <div class="table-cell"></div>

                    @yield("table-filter")

                    <div class="table-cell"></div>
                </div>

                @yield("table")


                </div>
                <!--paginacion-->
                <section class="ctn-paginate">
                    <div class="row-paginate">
                        @yield("paginate")
                    </div>
                    <div>items por pagina:<?=$pgValue?> Viendo <span class="id_ver"> <?=$iniciA?></span> de <?= $total ?></div>

                    </div>
                </section>
                  <!--fin paginacion-->
        </section>
        <!--fin tabla-->
        @yield("app")

    </section>

@endsection

