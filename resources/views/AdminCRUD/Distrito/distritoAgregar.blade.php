@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Nombre:</div>
            <div class="w-100">
                <input type="text" id="DIS_Nombre" name="DIS_Nombre" class="input input-agregar-modal" value="<?=$nombre?>">
            </div>
        </div>
@endsection

