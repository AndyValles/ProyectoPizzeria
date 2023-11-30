@extends("./AdminCRUD/index_admin")


@section("title","Articulo")

@section("input-buscar")


    <div class="w-80">
        <p class="w-100 mr-10">Codigo:</p>
        <input type="text" class="input input-search-filter" id="Bus_ART_Codigo" name="Bus_ART_Codigo">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Nombre:</p>
        <input type="text" class="input input-search-filter" id="Bus_ART_Nombre" name="Bus_ART_Nombre">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Precio:</p>
        <input type="text" class="input input-search-filter" id="Bus_ART_Estado" name="Bus_ART_Estado">
    </div>

    <div class="w-80">
        <p class="w-100 mr-10">Stock:</p>
        <input type="text" class="input input-search-filter" id="Bus_ART_Codigo" name="Bus_ART_Codigo">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Fecha Ingreso:</p>
        <input type="text" class="input input-search-filter" id="Bus_ART_Nombre" name="Bus_ART_Nombre">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Marca:</p>
        <?=$marca?>
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Proveedor:</p>
        <?=$proveedor?>
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Tipo Articulo:</p>
        <?=$tipoarticulo?>
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Estado:</p>
        <input type="text" class="input input-search-filter" id="Bus_ART_Estado" name="Bus_ART_Estado">
    </div>
    <div class="w-100 df-ac-jc">
        <button class="btn btn-crud-Agregar" ><i class="icon-search"></i> Buscar</button>
    </div>
@endsection

@section("drop-view-filter")
<div class="dropview-item"><i class="icon-checkbox-checked icon-rd" id="icon-CBK-Codigo"></i><input type="checkbox" class="input-custom" onclick="Filter_CBK('Codigo')" checked>Codigo</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-Nombre"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('Nombre')" checked>Nombre</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-Estado"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('Estado')" checked>Estado</div>
@endsection

@section("table-head")
<div class="table-cell tb_Codigo"><button class="btn bg-transparent w-100 " onclick="filter_table('Codigo')"> Codigo <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Nombre"><button class="btn bg-transparent w-100 " onclick="filter_table('Nombre')"> Nombre <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Nombre"><button class="btn bg-transparent w-100 " onclick="filter_table('Nombre')"> Precio <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Nombre"><button class="btn bg-transparent w-100 " onclick="filter_table('Nombre')"> Stock <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Nombre"><button class="btn bg-transparent w-100 " onclick="filter_table('Nombre')"> Fecha Registro <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Nombre"><button class="btn bg-transparent w-100 " onclick="filter_table('Nombre')"> Tipo Articulo <i class="icon-bottom"></i></button> </div>

<div class="table-cell tb_Estado"><button class="btn bg-transparent w-100 "> Estado <i class="icon-bottom"></i></button> </div>
@endsection




@section("table")
<div class="table-<?=$entidad?>">
    <?=$data?>
</table>
@endsection


@section("paginate")
    <div class="df paginate_<?=$entidad?>"><?= $paginate ?></div>

@endsection


@section("scripts")
    <script type="module" src="{{ asset("/js/src/axios/crud/$entidad.min.js") }}"></script>
@endsection
