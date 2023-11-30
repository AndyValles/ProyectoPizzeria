@extends("layout")

@section("title","Inicio")

@section("section")

    <?=$carrusel?>

    <!--=$cuadricula?>-->
    <section>

    </section>
    <!--Categoria1-->
    <section class="df-ac-jc">
       <div class="txt-title-Agregado">Agregados recientemente</div>
    </section>
    <!--End Categoria1-->
    <section class="cnt-product">
       <?=$productos?>
    </section>


     <?=$productoALL?>

    <?=$footer?>
@endsection
