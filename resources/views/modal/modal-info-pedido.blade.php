@auth
<div class="modal-info-real">El pedido a sido realizado  correctamente revise su carrito</div>
@else
<div>
    <div><i class="icon-cross"></i></div>
    <div><img src="" alt="" sizes="" srcset=""></div>
    <div>Para realizar un pedido debes iniciar sesion o registrarte</div>
    <a class="" href="<?=url("/iniciarsesion")?>"> iniciar sesion</a>
    <a class="" href="<?=url("/Registrar")?>">Registrarte</a>
</div>
@endauth
