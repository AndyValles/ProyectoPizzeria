@extends("./AdminCRUD/index_admin")


@section("title","Item")

@section("input-buscar")
    <div class="w-80">
        <p class="w-100 mr-10">Codigo:</p>
        <input type="text" class="input input-search-filter" id="Bus_ITEM_CodigoInterno" name="Bus_ITEM_CodigoInterno">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Precio:</p>
        <input type="text" class="input input-search-filter" id="Bus_ITEM_Precio" name="Bus_ITEM_Precio">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Tipo Item:</p>
        <?=$tipoItem?>
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Estado:</p>
        <?=$select_estado?>
    </div>

    <div class="w-50 df-ac-jc">
        <button class="btn btn-crud-Agregar" ><i class="icon-search"></i> Buscar</button>
    </div>
@endsection

@section("drop-view-filter")
<div class="dropview-item"><i class="icon-checkbox-checked icon-rd" ></i><input type="checkbox" class="input-custom" data-name="Codigo" checked>Codigo</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd"></div><input type="checkbox" class="input-custom" data-name="Nombre" checked>Nombre</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd"></div><input type="checkbox" class="input-custom" data-name="Precio" checked>Nombre</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd"></div><input type="checkbox" class="input-custom" data-name="Tipo_Item" checked>Nombre</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd"></div><input type="checkbox" class="input-custom" data-name="Estado" checked>Estado</div>
@endsection

@section("table-head")
<div class="table-cell tb_Codigo"><button class="btn bg-transparent w-100"> Codigo <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Nombre"><button class="btn bg-transparent w-100"> Nombre <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Precio"><button class="btn bg-transparent w-100"> Precio <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Tipo_Item"><button class="btn bg-transparent w-100"> Tipo Item <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Estado"><button class="btn bg-transparent w-100"> Estado <i class="icon-bottom"></i></button> </div>
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
