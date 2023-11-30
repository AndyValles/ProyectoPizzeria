<article class="modal-filter">
    <section class="modal-filter-header">
        <div class="w-100 mr-lr-50">Eliminar <?=$entidad?></div>
        <div class="w-20"><button class="btn btn-modal-filter btn-cerrar" ><i class="icon-cancel-circle"></i></button></div>
    </section>

    <section class="modal-filter-body">

        <article class="w-100 df-ac-jc mr-10">
                <div class="general-id"  data-id="<?=$id?>"></div>
                Desea eliminar <?=$name?> de la tabla <?=$entidad?> ?
        </article>
    </section>

    <section class="modal-filter-footer">
        <div class="w-30"><button class="btn btn-filter-guardar">Eliminar</button></div>
        <div class="w-30"><button class="btn btn-filter-cancelar btn-cerrar" >Cancelar</button></div>
    </section>
</article>
