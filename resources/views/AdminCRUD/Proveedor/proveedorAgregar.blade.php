@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Nombre:</div>
            <div class="w-100">
                <input type="text" id="PROV_Nombre" name="PROV_Nombre"  value="<?=$nombre?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Identificador:</div>
            <div class="w-100">
                @csrf
                <input type="text" id="PROV_Identificador" name="PROV_Identificador"  value="<?=$identificador?>" class="input input-agregar-modal">
            </div>
        </div>
@endsection
