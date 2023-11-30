@extends("/AdminCRUD/layout_Agregar")

@section("section")
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Stock:</div>
    <div class="w-100">
        <input type="text" id="INV_StockModificado" name="INV_StockModificado"  value="<?=$stock?>" class="input input-agregar-modal">
    </div>
</div>


<section class="w-100 ">
    <div class="ctn-radio-habilitar ">
       <button class="btn btn-tab-item btn-selected-item" id="articulo">Articulo</button>
       <button class="btn btn-tab-item" id="item">Item</button>
    </div>
    <div class="w-100 df" id="ctn-item">
        <div class="w-20 df-ac-jc">Articulo:</div>
                <div class="w-100">
                    <?=$articulo?>
                </div>
        </div>
    </div>
</section>

@endsection
