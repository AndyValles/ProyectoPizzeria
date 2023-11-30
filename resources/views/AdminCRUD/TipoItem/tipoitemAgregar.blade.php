@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Nombre:</div>
            <div class="w-100">
                <input type="text" id="TIPIT_Nombre" name="TIPIT_Nombre" value="<?=$nombre?>" class="input input-agregar-modal">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Importante:</div>
            <div class="ctn-rbk-button">
                <div class="">
                    <label for="TIPIT_Importancia-SI">Si</label>
                    <input type="radio" id="TIPIT_Importancia-SI" name="TIPIT_Importancia" class="TIPIT_Importancia" data-value="SI" <?=$importancia=="1"?"checked":""?>>
                </div>
                <div class="">
                    <label for="TIPIT_Importancia-NO">No</label>
                    <input type="radio" id="TIPIT_Importancia-NO" name="TIPIT_Importancia" class="TIPIT_Importancia" data-value="NO" <?=$importancia=="0"?"checked":""?>>
                </div>
            </div>

        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Seleccion multiple:</div>
            <div class="ctn-rbk-button">
                <div class="">
                    <label for="TIPIT_Seleccion-SI">Si</label>
                    <input type="radio" id="TIPIT_Seleccion-SI" name="TIPIT_Seleccion" class="TIPIT_Seleccion" data-value="SI"  <?=$Seleccion=="1"?"checked":""?>>
                </div>
                <div class="">
                    <label for="TIPIT_Seleccion-NO">No</label>
                    <input type="radio" id="TIPIT_Seleccion-NO" name="TIPIT_Seleccion" class="TIPIT_Seleccion" data-value="NO"  <?=$Seleccion=="0"?"checked":""?>>
                </div>
            </div>
        </div>
@endsection
