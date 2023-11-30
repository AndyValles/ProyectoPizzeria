@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Descripcion:</div>
            <div class="w-100">
                <input type="text" id="ITEM_Descripcion" name="ITEM_Descripcion" value="<?=$descripcion?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Precio:</div>
            <div class="w-100">
                <input type="text" id="ITEM_Precio" name="ITEM_Precio" value="<?=$precio?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Tipo Item:</div>
            <div class="w-100">
                <?=$tipoItem?>
            </div>
        </div>
@endsection
