@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">DNI:</div>
            <div class="w-100">
                <input type="text" id="USU_DNI" name="USU_DNI" value="<?=$dni?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Primer Nombre:</div>
            <div class="w-100">
                <input type="text" id="USU_PriNombre" name="USU_PriNombre" value="<?=$prinombre?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Segundo Nombre:</div>
            <div class="w-100">
                <input type="text" id="USU_SegNombre" name="USU_SegNombre" value="<?=$segnombre?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Apellido Paterno:</div>
            <div class="w-100">
                <input type="text" id="USU_ApePaterno" name="USU_ApePaterno" value="<?=$apepaterno?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Apellido Materno:</div>
            <div class="w-100">
                <input type="text" id="USU_ApeMaterno" name="USU_ApeMaterno" value="<?=$apematerno?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Usuario:</div>
            <div class="w-100">
                <input type="text" id="USU_Usuario" name="USU_Usuario" value="<?=$usuario?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Clave:</div>
            <div class="w-100">
                <input type="text" id="USU_Clave" name="USU_Clave" value="<?=$clave?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Telefono:</div>
            <div class="w-100">
                <input type="text" id="USU_Telefono" name="USU_Telefono" value="<?=$telefono?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Correo:</div>
            <div class="w-100">
                <input type="text" id="USU_Correo" name="USU_Correo" value="<?=$correo?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Fecha Nacimiento:</div>
            <div class="w-100">
                <input type="text" id="USU_FechaNacimiento" name="USU_FechaNacimiento" value="<?=$fechanacimiento?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Sexo:</div>
            <div class="w-100">
                <?=$sexo?>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Token:</div>
            <div class="w-100">
                <input type="text" id="USU_Token" name="USU_Token" value="<?=$token?>" class="input input-agregar-modal">
            </div>
        </div>
@endsection
