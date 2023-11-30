@extends("/AdminCRUD/layout_Agregar")

@section("section")
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Numero:</div>
    <div class="w-100">
        <input type="text" id="BOL_Numero" name="BOL_Numero"  value="<?=$numero?>" class="input input-agregar-modal" disabled>
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Serie:</div>
    <div class="w-100">
        <input type="text" id="BOL_Serie" name="BOL_Serie"  value="<?=$serie?>" class="input input-agregar-modal" disabled>
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
