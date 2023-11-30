@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Lugar:</div>
            <div class="w-100">
                <?=$lugar?>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Provincia:</div>
            <div class="w-100">
                <?=$provincia?>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Distrito:</div>
            <div class="w-100">
                <?=$distrito?>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Direccion:</div>
            <div class="w-100">
                <input type="text" id="UBI_Direccion" name="UBI_Direccion"  value="<?=$direccion?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Calle:</div>
            <div class="w-100">
                <input type="text" id="UBI_Calle" name="UBI_Calle"  value="<?=$calle?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Numero:</div>
            <div class="w-100">
                <input type="text" id="UBI_Numero" name="UBI_Numero"  value="<?=$numero?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Referencia:</div>
            <div class="w-100">
                <input type="text" id="UBI_Referencia" name="UBI_Referencia"  value="<?=$referencia?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Usuario:</div>
            <div class="w-100">
                <input type="text" id="USU_CodigoInterno" name="USU_CodigoInterno"  value="<?=$usuario?>" class="input input-agregar-modal">
            </div>
        </div>
@endsection
