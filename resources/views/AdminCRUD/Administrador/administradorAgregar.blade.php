@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df-ac-jc">
            <div class="w-20 df-ac-jc">Usuario:</div>
            <div class="w-80">
                <?=$usuario?>
            </div>
        </div>
        <div class="w-100 df-ac-jc">
            <div class="w-20 df-ac-jc">Escritura:</div>
            <div class="ctn-rbk-button">
                <div class="">
                    <label for="ADM_Write-SI">Si</label>
                    <input type="radio" id="ADM_Write-SI" name="ADM_Write" class="ADM_Write" data-value="SI"  <?=$WRITE=="1"?"checked":""?>>
                </div>
                <div class="">
                    <label for="ADM_Write-NO">No</label>
                    <input type="radio" id="ADM_Write-NO" name="ADM_Write" class="ADM_Write" data-value="NO"  <?=$WRITE=="0"?"checked":""?>>
                </div>
            </div>
        </div>
        <div class="w-100 df-ac-jc">
            <div class="w-20 df-ac-jc">Lectura:</div>
            <div class="ctn-rbk-button">
                <div class="">
                    <label for="ADM_READ-SI">Si</label>
                    <input type="radio" id="ADM_READ-SI" name="ADM_READ" class="ADM_READ" data-value="SI"  <?=$READ=="1"?"checked":""?>>
                </div>
                <div class="">
                    <label for="ADM_READ-NO">No</label>
                    <input type="radio" id="ADM_READ-NO" name="ADM_READ" class="ADM_READ" data-value="NO"  <?=$READ=="0"?"checked":""?>>
                </div>
            </div>
        </div>
        <div class="w-100 df-ac-jc">
            <div class="w-20 df-ac-jc">Vista:</div>
            <div class="ctn-rbk-button">
                <div class="">
                    <label for="ADM_VIEW-SI">Si</label>
                    <input type="radio" id="ADM_VIEW-SI" name="ADM_VIEW" class="ADM_VIEW" data-value="SI"  <?=$VIEW=="1"?"checked":""?>>
                </div>
                <div class="">
                    <label for="ADM_VIEW-NO">No</label>
                    <input type="radio" id="ADM_VIEW-NO" name="ADM_VIEW" class="ADM_VIEW" data-value="NO"  <?=$VIEW=="0"?"checked":""?>>
                </div>
            </div>
        </div>
        <div class="w-100 df-ac-jc">
            <div class="w-20 df-ac-jc">Ip:</div>
            <div class="w-80">
                @csrf
                <input type="text" id="ADM_Ip" name="ADM_Ip" class="input input-agregar-modal"   value="<?=$ip?>">
            </div>
        </div>
@endsection
