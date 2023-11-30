@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Nombre:</div>
            <div class="w-100">
                <input type="text" id="MAR_Nombre" name="MAR_Nombre" class="input input-agregar-modal" value="<?=$nombre?>">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Identificador:</div>
            <div class="w-100">
                <input type="text" id="FORM_Identificador" name="FORM_Identificador" class="input input-agregar-modal" value="<?=$identificador?>">
            </div>
        </div>
@endsection
