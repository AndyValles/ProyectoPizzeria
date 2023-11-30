@extends("./AdminCRUD/layout_admin")

@section("title","Dashboard")

@section("css")
<link rel="stylesheet" href="{{ asset("./css/dashboard/dashboard.min.css") }}">
@endsection

@section("admin-section")
<section class="ctn-dashboard">
    <section  class="ctn-title-dashboard">
        <div class="txt-title-dashboard">Dashboard</div>
    </section>
    <section class="ctn-present-dashboard bg-nigth-present ">
        <section class="present-dashboard ">
            <div class="txt-title-present"><?=$tiempo?> <?=$nombre?></div>
            <div class="">Listo para comenzar <?=$comentar?></div>
        </section>
        <div class="ctn-img-present-dashboard">
            <img src="{{ asset("resource/chico.svg")}}" alt="" class="img-present-dasboard">
        </div>
    </section>
    <section class="ctn-info-dashboard">
        <section class="cnt-cards">
            <!--card-->
            <div class="cnt-card-dashboard">
                <div class="txt-card-title">
                    <a href="{{ url("/Admin/Administracion/Usuario/") }}"class="btn-card-title">
                        <div class="btn-circle"></div>
                        <div>Usuario</div>
                        <div ><i class="icon-arrow-right2"></i></div>
                    </a>
                </div>
                <div class="txt-card-plus">
                    <div><i class="icon-user"></i></div>
                    <div><?=$totales["usuario"]?> Total</div>
                </div>
            </div>
            <!--endcard-->
            <!--card-->
            <div class="cnt-card-dashboard">
                <div class="txt-card-title">
                    <a href="{{ url("/Admin/Almacen/Articulo/") }}"class="btn-card-title">
                        <div class="btn-circle"></div>
                        <div>Articulo</div>
                        <div ><i class="icon-arrow-right2"></i></div>
                    </a>
                </div>
                <div class="txt-card-plus">
                    <div><i class="icon-spoon-knife"></i></div>
                    <div><?=$totales["articulo"]?> Total</div>
                </div>
            </div>
            <!--endcard-->
             <!--card-->
             <div class="cnt-card-dashboard">
                <div class="txt-card-title">
                    <a href="{{ url("/Admin/Administracion/Administrador/") }}"class="btn-card-title">
                        <div class="btn-circle"></div>
                        <div>Administrador</div>
                        <div ><i class="icon-arrow-right2"></i></div>
                    </a>
                </div>
                <div class="txt-card-plus">
                    <div><i class="icon-user-tie"></i></div>
                    <div><?=$totales["administrador"]?> Total</div>
                </div>
            </div>
            <!--endcard-->
            <!--card-->
            <div class="cnt-card-dashboard">
                <div class="txt-card-title">
                    <a href="{{ url("/Admin/Almacen/Pedido/") }}"class="btn-card-title">
                        <div class="btn-circle"></div>
                        <div>Pedidos</div>
                        <div ><i class="icon-arrow-right2"></i></div>
                    </a>
                </div>
                <div class="txt-card-plus">
                    <div><i class="icon-truck"></i></div>
                    <div><?=$totales["pedidos"]?> Total</div>
                </div>
            </div>
            <!--endcard-->
              <!--card-->
              <div class="cnt-card-dashboard">
                <div class="txt-card-title">
                    <a href="{{ url("/Admin/Administracion/Proveedor/") }}"class="btn-card-title">
                        <div class="btn-circle"></div>
                        <div>Proveedor</div>
                        <div ><i class="icon-arrow-right2"></i></div>
                    </a>
                </div>
                <div class="txt-card-plus">
                    <div><i class="icon-users"></i></div>
                    <div><?=$totales["proveedor"]?> Total</div>
                </div>
            </div>
            <!--endcard-->


        </section>
        <section class="ctn-tables-dashboard">
            <div class="ctn-table">
                <div class="w-100 df">
                    <div class="w-80">
                        <div class="txt-table-title">Pedidos Recientes</div>
                        <div class="gray-209 ">Pedidos realizados por  los usuarios recientemente</div>
                    </div>
                    <div class="w-20 df-ac-jc">
                        <a href="{{ url("/Admin/Almacen/Pedido/") }}">ver mas</a>
                    </div>
                </div>
                <div  class="w-100">
                    <table class="table-dashboard">
                        <thead class=" tb-head">
                            <tr class="">
                                <td class="">Nr°</td>
                                <td class="">Numero</td>
                                <td class="">Usuario</td>
                                <td class="">Fecha y hora</td>
                                <td class="">Comentario</td>
                            </tr>
                        </thead>
                        <tbody class=" tb-body">
                            <?=$pedido?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ctn-table">
                <div class="w-100 df">
                    <div class="w-80">
                        <div class="txt-table-title">Usuarios Actuales</div>
                        <div class="gray-209 ">Usuarios registrados recientemente</div>
                    </div>
                    <div  class="w-20 df-ac-jc">
                        <a href="{{ url("/Admin/Administracion/Usuario/") }}" class="btn-vermas">ver mas</a>
                    </div>
                </div>
                <div class="w-100 ">
                    <?=$usuario?>
                </div>
            </div>
        </section>
    </section>
</section>
@endsection

@section("scripts")
<script src=""></script>
@endsection
