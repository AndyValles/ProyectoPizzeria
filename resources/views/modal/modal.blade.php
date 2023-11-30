@extends("layout")
@section("css")
<link rel="stylesheet" href="{{asset("/css/producto/producto.min.css")}}">
@endsection

@section("section")
<section class="ctn-producto-total">
    <input type="hidden" name="CodigoInterno" id="CodigoInterno" value="<?=$id?>">
    <input type="hidden" name="ctn-pres-total" id="ctn-pres-total" value="<?=$precio?>">
    <input type="hidden" name="TotalPrice" id="TotalPrice"value="<?=$total?>">
    <input type="hidden" name="cantidad" id="cantidad"value="<?=$stock?>">
        <section class="row-producto-total">
            <section class="ctn-image-product">
                <img src="{{asset($url)}}" alt="" class="image-product">
            </section>
            <section class="w-50">
                <div class="txt-title-subArt"><?=$tipoArticulo?></div>
                <div class="txt-title-Art"><?=$nombre?></div>
                <div class="txt-precio-text">S/ <?=$precio?></div>
                <section class="ctn-descrip-product">
                    <section>
                        <div class="txt-descrip-title">Descripcion</div>
                        <div><?=$descripcion?></div>
                    </section>
                    <section>
                        <div class="txt-descrip-title"> Informacion Adicional</div>
                        <div></div>
                    </section>
                </section>
                <section class="mr-10">
                    <div>Habilitado: <?=$stock?> en stock</div>
                </section>
                <section class="w-100 df-ac-jc">
                    <div class="ctn-cant-press"><button class="btn btn-pres-cant btn-cant-minus">-</button><span class="ctn-cant-pres">1</span><button class="btn btn-pres-cant btn-cant-plus">+</button></div>
                    <div class="w-100"><button class="btn btn-agregar-carrito">Agregar al carro</button></div>
                </section>
            </section>
        </section>
        <!--<section class="ctn-extras-product">
            <div class="row-descrip-Agregar">Agregar A la compra</div>
            <section class="row-extras-product">
                <div class="txt-title-product-extra">Tamaño<span class="red-223">*</span></div>
                <section class="ctn-txt-extra">
                    <section class="ctn--product">
                        <input type="radio" name="" id="" class="cb-product-extra">
                        <div class="txt-text-product">Combo Futbolero Grande</div>
                        <div class="txt-disabled-text-product">S/. 144.60</div>
                        <div class="txt-text-product">S/. 69.90</div>
                    </section>
                    <section class="ctn--product">
                        <input type="radio" name="" id="" class="cb-product-extra">
                        <div class="txt-text-product">Combo Futbolero Familiar</div>
                        <div class="txt-disabled-text-product">S/. 164.60</div>
                        <div class="txt-text-product">S/. 94.90</div>
                    </section>
                </section>
            </section>
            <section class="row-extras-product">
                <div class="txt-title-product-extra">Masa<span class="red-223">*</span></div>
                <section class="ctn-txt-extra">
                    <section class="ctn--product">
                        <input type="radio" name="rd-button-masa" id="" class="cb-product-extra">
                        <div class="txt-text-product ctn-check-product"><i class="icon-checkmark"></i></div>
                        <div class="txt-text-product ">Masa Regular</div>
                    </section>
                    <section class="ctn--product">
                        <input type="radio" name="rd-button-masa" id="" class="cb-product-extra">
                        <div class="txt-text-product ">Masa Con Borde De Queso</div>
                        <div class="txt-descrip-product">Seleccionala por S/. 10.00</div>
                    </section>
                    <section class="ctn--product">
                        <input type="radio" name="rd-button-masa" id="" class="cb-product-extra">
                        <div class="txt-text-product ">Masa Con Borde Parmesano</div>
                        <div class="txt-descrip-product">Seleccionala por S/. 5.00</div>
                    </section>
                </section>
            </section>
            <div class="row-extras-product">
                <div class="txt-title-product-extra">Extras</div>
                <section class="ctn-txt-extra">
                    <div class="ctn--product">
                        <input type="checkbox" name="" id="" class="cb-product-extra">
                        <div class="ctn-image-extra"><img src="" alt=""></div>
                        <span class="txt-text-product ">Pepperoncini</span>
                    </div>
                    <div class="ctn--product">
                        <input type="checkbox" name="" id="" class="cb-product-extra">
                        <div class="ctn-image-extra"><img src="" alt=""></div>
                        <span class="txt-text-product ">Salsa de ajo</span>
                    </div>
                    <div class="ctn--product">
                        <input type="checkbox" name="" id="" class="cb-product-extra">
                        <div class="ctn-image-extra"><img src="" alt=""></div>
                       <span class="txt-text-product ">Pepperoncini y Salsa de ajo</span>
                    </div>
                    <div class="ctn--product">
                        <input type="checkbox" name="" id="" class="cb-product-extra">
                        <div class="ctn-image-extra"><img src="" alt=""></div>
                        <span class="txt-text-product "> Sin extras</span>
                    </div>
                </section>
            </div>
            </section>
        </section>-->
        <section class="ctn-productsimilar">
            <div class="txt-product-igual">Productos que te pueden interesar</div>
            <div class="ctn-product-similar">
                <!--product-->
                 <?=$produc_simil?>
                <!--endproduct-->
            </div>
            <div class="ctn-prev-icon">
               <!-- <section ><button class="btn btn-prev-product"><i class="icon-left-arrow"></i></button></section>-->
               <!-- <section ><button class="btn btn-prev-product"><i class="icon-rigth-arrow"></i></button></section>-->
            </div>
        </section>

</section>
@endsection
