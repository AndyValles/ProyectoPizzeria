@extends("/AdminCRUD/layout_Agregar")

@section("section")
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Nombre:</div>
            <div class="w-100">
                <input type="text" id="ART_Nombre" name="ART_Nombre" class="input input-agregar-modal"  value="<?=$nombre?>">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Descripcion:</div>
            <div class="w-100">
                <textarea type="text" id="ART_Descripcion" name="ART_Descripcion" class="input input-agregar-modal" value="<?=$descripcion?>"></textarea>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Precio: </div>
            <div class="w-50 df-ac-jc">
                S/.  <input type="text" id="ART_Precio" name="ART_Precio" class="input input-agregar-modal" value="<?=$precio?>">
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Stock:</div>
            <div class="w-50 df-ac-jc" >
                <input type="text" id="ART_Stock" name="ART_Stock" class="input input-agregar-modal" value="<?=$stock?>">
            </div>
        </div>

        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Imagen:</div>
            <div class="w-100">
                <!--file-->
                <input type="hidden" id="ART_Imagen" name="ART_Imagen" value="<?=$imagen?>">
                <div class="ctn-img-agregar">
                    <section class="ii-img-agregar"><img class="image-agregar" src="{{ asset($imagen)}}" alt="<?=$imagen?>" ></section>
                    <section class="ctn-input-file">
                        <input accept="image/png, image/jpeg" type="file" name="imagen" class="input input-agregar-imagen">
                        <input type="text" class="input input-text-image">
                        <div class="input-upload">
                            <i class="icon-upload"></i>
                        </div>
                    </section>
                </div>
                <!--endfile-->
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Marca:</div>
            <div class="w-100">
                <?=$marca?>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Proveedor:</div>
            <div class="w-100">
                <?=$proveedor?>
            </div>
        </div>
        <div class="w-100 df">
            <div class="w-20 df-ac-jc">Tipo Articulo:</div>
            <div class="w-100">
                <?=$tipoarticulo?>
            </div>
        </div>
        @endsection

