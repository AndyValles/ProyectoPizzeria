@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Nombre:</div>
            <div class="w-100">
                <input type="text" id="SEX_Nombre" name="SEX_Nombre" value="<?=$nombre?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Identificador:</div>
            <div class="w-100">
                <input type="text" id="SEX_Identificador" name="SEX_Identificador" value="<?=$identificador?>" class="input input-agregar-modal">
            </div>
        </div>
@endsection
