@extends("./AdminCRUD/index_admin")


@section("title","Marca")

@section("input-buscar")
    <div class="w-80">
        <p class="w-100 mr-10">Codigo:</p>
        <input type="text" class="input input-search-filter" id="Bus_MAR_Codigo" name="Bus_MAR_Codigo">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Nombre:</p>
        <input type="text" class="input input-search-filter" id="Bus_MAR_Nombre" name="Bus_MAR_Nombre">
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
<div class="dropview-item"><i class="icon-checkbox-checked icon-rd" id="icon-CBK-Codigo"></i><input type="checkbox" class="input-custom" onclick="Filter_CBK('Codigo')" checked>Codigo</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-Nombre"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('Nombre')" checked>Nombre</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-Estado"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('Estado')" checked>Estado</div>
@endsection

@section("table-head")
<div class="table-cell tb_Codigo"><button class="btn bg-transparent w-100 " onclick="filter_table('Codigo')"> Codigo <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Nombre"><button class="btn bg-transparent w-100 " onclick="filter_table('Nombre')"> Nombre <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Estado"><button class="btn bg-transparent w-100 "> Estado <i class="icon-bottom"></i></button> </div>
@endsection




@section("table")
<div class="table-<?$entidad?>">
    <?=$data?>
</table>
@endsection


@section("paginate")
    <div class="df paginate_<?$entidad?>"><?= $paginate ?></div>
@endsection


@section("scripts")
    <script type="module" src="{{ asset("/js/src/axios/crud/$entidad.min.js") }}"></script>
@endsection
