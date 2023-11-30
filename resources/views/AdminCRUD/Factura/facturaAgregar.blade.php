@extends("/AdminCRUD/layout_Agregar")

@section("section")
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Descuento:</div>
    <div class="w-100">
        <input type="text" id="FAC_Descuento" name="FAC_Descuento"  value="<?=$descuento?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">IGV:</div>
    <div class="w-100">
        <input type="text" id="FAC_IGV" name="FAC_IGV"  value="<?=$igv?>" class="input input-agregar-modal" disabled>
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Total:</div>
    <div class="w-100">
        <input type="text" id="BOL_Total" name="BOL_Total"  value="<?=$nombre?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Pedido:</div>
    <div class="w-100">
        <input type="text" id="PED_CodigoInterno" name="PED_CodigoInterno"  value="<?=$pedido?>" class="input input-agregar-modal">
    </div>
</div>
@endsection
