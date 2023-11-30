@extends("/AdminCRUD/layout_Agregar")

@section("section")
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Imagen:</div>
    <div class="w-100">
        <input type="file" id="BAN_Imagen" name="BAN_Imagen"  value="<?=$imagen?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Ruta:</div>
    <div class="w-100">
        <input type="text" id="BAN_Ruta" name="BAN_Ruta"  value="<?=$nombre?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Tipo Banner:</div>
    <div class="w-100">
        <?=$tipobanner?>
    </div>
</div>
<!-- <div class="w-100 df">
    <div class="w-20 df-ac-jc">Paquete:</div>
    <div class="w-100">
       <$paquete?>
    </div>
</div>-->
@endsection
