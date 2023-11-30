@extends("/AdminCRUD/layout_Agregar")

@section("section")
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Precio:</div>
    <div class="w-100">
        <input type="text" id="CKM_Precio" name="CKM_Precio"  value="<?=$precio?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Metros:</div>
    <div class="w-100">
        <input type="text" id="CKM_Metros" name="CKM_Metros"  value="<?=$metros?>" class="input input-agregar-modal">
    </div>
</div>
@endsection
