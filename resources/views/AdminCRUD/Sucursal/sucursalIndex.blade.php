@extends("./AdminCRUD/index_admin")


@section("title","Sucursal")

@section("input-buscar")
    <div class="w-80">
        <p class="w-100 mr-10">Codigo:</p>
        <input type="text" class="input input-search-filter" id="Bus_SUC_CodigoInterno" name="Bus_SUC_CodigoInterno">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Descripcion:</p>
        <input type="text" class="input input-search-filter" id="Bus_SUC_Descripcion" name="Bus_SUC_Descripcion">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Horas Atencion (Delivery):</p>
        <input type="text" class="input input-search-filter" id="Bus_SUC_DeliveryHorasAtencion" name="Bus_SUC_DeliveryHorasAtencion">
    </div>
    <div class="w-80">
        <p class="w-100 mr-10">Horas Atencion (Tienda):</p>
        <input type="text" class="input input-search-filter" id="Bus_SUC_TiendaHorasAtencion" name="Bus_SUC_TiendaHorasAtencion">
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
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-descripcion"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('descripcion')" checked>descripcion</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-delivery"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('delivery')" checked>delivery</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-tienda"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('tienda')" checked>Tienda</div>
<div class="dropview-item"><div class="icon-checkbox-checked icon-rd" id="icon-CBK-Estado"></div><input type="checkbox" class="input-custom" onclick="Filter_CBK('Estado')" checked>Estado</div>
@endsection

@section("table-head")
<div class="table-cell tb_Codigo"><button class="btn bg-transparent w-100 " onclick="filter_table('Codigo')"> Codigo <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_descripcion"><button class="btn bg-transparent w-100 " onclick="filter_table('descripcion')"> Descripcion <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_delivery"><button class="btn bg-transparent w-100 " onclick="filter_table('delivery')"> Delivery: <i class="icon-bottom"></i></button> </div>
<div class="table-cell tb_Tienda"><button class="btn bg-transparent w-100 " onclick="filter_table('Tienda')"> Tienda: <i class="icon-bottom"></i></button> </div>
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
    <script type="module"   src="{{ asset("/js/src/axios/crud/$entidad.min.js") }}"></script>
@endsection
