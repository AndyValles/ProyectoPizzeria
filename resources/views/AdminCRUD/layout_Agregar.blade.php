<div class="modal-agregar">
    <div class="modal-agregar-header">
        @if ($tipoEvent!="Agregar")
            <input type="hidden" id="CodigoInterno" name="CodigoInterno" value="<?=$codigo?>">
        @endif
        <div class="modal-agregar-header-title"><?=$tipoEvent?> <?=$entidad?></div>
    </div>
    <div class="modal-agregar-body form-data">
           @yield("section")
        @if($tipoEvent=="Agregar")
            <div class="w-100 df-ac-jc"><button class="btn btn-agregar-modal">Agregar</button></div>
        @else
            <div class="table-cell">
                <button class="btn btn-crud-edit" data-id="<?=$codigo?>">Guardar</button>
                <button class="btn btn-crud-cancelar" data-id="<?=$codigo?>">cancelar</button>
            </div>
        @endif
    </div>
</div>
