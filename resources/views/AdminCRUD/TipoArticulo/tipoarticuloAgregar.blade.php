@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Nombre:</div>
            <div class="w-100">
                <input type="text" id="TIPART_Nombre" name="TIPART_Nombre" value="<?=$nombre?>" class="input input-agregar-modal">
            </div>
        </div>
@endsection
