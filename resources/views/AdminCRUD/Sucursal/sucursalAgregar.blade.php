@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Referencia:</div>
            <div class="w-100">
                <input type="text" id="SUC_Referencia" name="SUC_Referencia" value="<?=$referencia?>" class="input input-agregar-modal">
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
                <input type="text" id="SUC_Direccion" name="SUC_Direccion" value="<?=$direccion?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc"> Horas Atencion:</div>
            <div class="w-100">
                <input type="hidden" id="HorasAtencion" name="HorasAtencion" value="<?=$horasatencion?>">
                @if ($codigo!="")
                    <span class="mr-10 gray-181 ">hora anterior: <?=$horapp?></span>
                @endif
                <div class="ctn-time-input">
                    <input value="00" type="text" id="time-hora-1" class="input w-10 input-time" data-value="hour"><span>:</span>
                    <input value="00" type="text" id="time-min-1" class="input w-10 input-time" data-value="min">
                    <select class="mr-10 input w-30">
                        <option value="a.m."> a.m.</option>
                        <option value="a.m."> p.m.</option>
                    </select>
                    <span>a</span>
                    <input value="00" type="text" id="time-hora-2" class="input w-10 input-time" data-value="hour"><span>:</span>
                    <input value="00" type="text" id="time-min-2" class="input w-10 input-time" data-value="min">
                    <select class="mr-10 input w-30 ">
                        <option value="a.m."> a.m.</option>
                        <option value="a.m." selected> p.m.</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Telefono:</div>
            <div class="w-100">
                <input type="text" id="SUC_Telefono" name="SUC_Telefono" value="<?=$telefono?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">URL(<span class="font-subtext">sacar url de google maps</span>):</div>
            <div class="w-100">
                <input type="text" id="SUC_URL" name="SUC_URL" value="<?=$url?>" class="input input-agregar-modal">
            </div>
        </div>
@endsection
