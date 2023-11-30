@extends("/AdminCRUD/layout_Agregar")

@section("section")
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Nombre:</div>
    <div class="w-100">
        <input type="text" id="TIPBAN_Nombre" name="TIPBAN_Nombre"  value="<?=$nombre?>" class="input input-agregar-modal">
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Html:</div>
    <div class="w-100">
        <textarea type="text" id="TIPBAN_Html" name="TIPBAN_Html"  value="<?=$nombre?>" class="input input-agregar-modal" cols="30" rows="10"></textarea>
    </div>
</div>
<div class="w-100 df">
    <div class="w-20 df-ac-jc">Cantidad:</div>
    <div class="w-100">
        <input type="text" id="TIPBAN_Cantidad" name="TIPBAN_Cantidad"  value="<?=$nombre?>" class="input input-agregar-modal">
    </div>
</div>
@endsection
