@extends("layout")

@section("title","Carrito")
@section("css")
<link rel="stylesheet" href="{{ asset("./css/primary/carrito.min.css")}}">
@endsection
@section("section")
<div class="cnt-storecar">
    <section class="row-storecar">
        <div class="cnt-title-storecar">
            <div class="txt-storecar-title">Carrito de compra</div>
            <div class="txt-storecar-title"><?=$cantidad?> Item Agregado(s)</div>
        </div>
        <div class="w-100">
            <?=$producto?>
        </div>
    </section>
    <section  class="ctn-sumario">
        <div class="">Sumario</div>
        <div class="">Total</div>
        <div class="w-100 df">
            <div class="w-80">SubTotal</div>
            <div class="w-20">S/ <?=$subtotal?></div>
        </div>
        <div class="w-100 df">
            <div class="w-80">Delivery</div>
            <div class="w-20"><?=$delivery?></div>
        </div>
        <div class="w-100 df">
            <div class="w-80">IGV</div>
            <div class="w-20">S/ <?=$igv?></div>
        </div>
        <div class="w-100 df">
            <div class="w-80">Descuento</div>
            <div class="w-20">S/<?=$descuento?></div>
        </div>
        <div class="w-100">
            <div class="w-100">Comentario:</div>
            <div class="w-100"><textarea class="input input-carrito" name="PED_Comentario" id="PED_Comentario" cols="30" rows="10"></textarea></div>
        </div>
        <div class="ctn-total-store">
            <div class="txt-total-store-info">Total</div>
            <div class="txt-total-store-price">S/<?=$total?></div>
        </div>
        <div class="w-100 df-ac-jc"><button class="btn btn-realizar-pedido">Realizar Pedido</button></div>
    </section>
</div>
@endsection
