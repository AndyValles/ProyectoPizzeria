@extends("/AdminCRUD/layout_Agregar")

@section("section")
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Padre:</div>
    <div class="w-100">
        <input type="text" id="MEN_CodigoPadre" name="MEN_CodigoPadre"  value="<?=$padre?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Nombre:</div>
    <div class="w-100">
        <input type="text" id="MEN_Nombre" name="MEN_Nombre"  value="<?=$nombre?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Tipo:</div>
    <div class="w-100">
        <input type="text" id="MEN_Tipo" name="MEN_Tipo"  value="<?=$tipo?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Icono:</div>
    <div class="w-100">
        <input type="text" id="MEN_Icono" name="MEN_Icono"  value="<?=$icono?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Ruta:</div>
    <div class="w-100">
        <input type="text" id="MEN_Ruta" name="MEN_Ruta"  value="<?=$ruta?>" class="input input-agregar-modal">
    </div>
</div>
@endsection
