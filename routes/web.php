<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\articuloController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\boletaController;
use App\Http\Controllers\cuotakmController;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\lugarController;
use App\Http\Controllers\provinciaController;
use App\Http\Controllers\distritoController;
use App\Http\Controllers\facturaController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\sexoController;
use App\Http\Controllers\filtrocategoriaController;
use App\Http\Controllers\formapagoController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\tipoarticuloController;
use App\Http\Controllers\tipopedidoController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\paqueteController;
use App\Http\Controllers\pedidoController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\sucursalController;
use App\Http\Controllers\tipobannerController;
use App\Http\Controllers\tipoitemController;
use App\Http\Controllers\ubicacionController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\modalController;
use App\Http\Controllers\administrarUsuario;
use App\Http\Controllers\Controller;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\localController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(inicioController::class)->group(function () {
    Route::get('/ObtenerItem/{id}/',"ObtenerItem");
});



Route::controller(Controller::class)->group(function () {
    Route::get("/pedidoenviado","pedidoenviado");
    Route::get('/informacion',"informacion");
    Route::get('/carrito',"carrito");
    Route::get('/cerrarsesion',"cerrarsesion");
});


Route::controller(localController::class)->group(function () {
    Route::get('/locales',"index");
});

Route::controller(modalController::class)->group(function () {
    Route::get("/modal_detalles","modal_detalles");
    Route::get("/infopedido","infopedido");
    Route::get('/Producto/{id}','modal_pedido');
    Route::get('/sucursal',"modal_sucursal");
    Route::get('/buscarMenu',"menu_index");
    Route::get('/buscarMenu/{name}',"menu_search");
});

Route::controller(indexController::class)->group(function () {
    Route::get("/",'index')->name("home");
    Route::get("/sucursal/{id}",'sucursal_actual');
    Route::post("/AgregarCarrito",'AgregarCarrito');
});

Route::controller(filtrocategoriaController::class)->group(function () {
    Route::get('/categorias','categoria');
});


/*Autorisacion*/
Route::controller(administrarUsuario::class)->group(function () {
    Route::get('/usuario/{id}','Admin')->middleware("auth");
    Route::get('/Admin_user','Usuario')->middleware("auth");
    Route::get('/ubicacion','Ubicacion')->middleware("auth");
});

Route::controller(loginController::class)->group(function () {
    Route::get('/iniciarsesion', 'login')->name("login")->middleware("guest");
    Route::post('/iniciarsesion/ingresar', 'ingresar');
    Route::get('/Registrar', 'Registrar');
    Route::get('/Registro', 'Registro');
    Route::post('/Restablecer', 'Restablecer');
});

Route::controller(dashboardController::class)->group(function () {
    Route::get('/Admin/Inicio', 'index');
});

Route::controller(lugarController::class)->group(function () {
    Route::get('/Admin/Maestro/Lugar/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/Lugar/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/Lugar/loadData','loadData');

    Route::get('/Admin/Maestro/Lugar', 'index');
    Route::post('/Admin/Maestro/Lugar/create', 'create');
    Route::get('/Admin/Maestro/Lugar/{id}/edit', 'edit');
    Route::post('/Admin/Maestro/Lugar/search', 'search');
    Route::put('/Admin/Maestro/Lugar/{id}/update', 'update');
    Route::post('/Admin/Maestro/Lugar/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/Lugar/{id}/delete', 'delete');
});

Route::controller(provinciaController::class)->group(function () {
    Route::get('/Admin/Maestro/Provincia/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/Provincia/Editar/{id}', 'Agregar');
    Route::get('/Admin/Maestro/Provincia/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/Provincia/loadData','loadData');

    Route::get('/Admin/Maestro/Provincia', 'index');
    Route::post('/Admin/Maestro/Provincia/create', 'create');
    Route::post('/Admin/Maestro/Provincia/search', 'search');
    Route::get('/Admin/Maestro/Provincia/{id}/edit', 'edit');
    Route::put('/Admin/Maestro/Provincia/{id}/update', 'update');
    Route::post('/Admin/Maestro/Provincia/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/Provincia/{id}/delete', 'delete');
});

Route::controller(sexoController::class)->group(function () {
    Route::get('/Admin/Maestro/Sexo/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/Sexo/Editar/{id}', 'Agregar');
    Route::get('/Admin/Maestro/Sexo/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/Sexo/loadData','loadData');

    Route::get('/Admin/Maestro/Sexo', 'index');
    Route::post('/Admin/Maestro/Sexo/create', 'create');
    Route::get('/Admin/Maestro/Sexo/{id}/edit', 'edit');
    Route::post('/Admin/Maestro/Sexo/search', 'search');
    Route::put('/Admin/Maestro/Sexo/{id}/update', 'update');
    Route::post('/Admin/Maestro/Sexo/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/Sexo/{id}/delete', 'delete');
});

Route::controller(tipoitemController::class)->group(function () {
    Route::get('/Admin/Maestro/TipoItem/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/TipoItem/Editar/{id}', 'Agregar');
    Route::get('/Admin/Maestro/TipoItem/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/TipoItem/loadData','loadData');

    Route::get('/Admin/Maestro/TipoItem', 'index');
    Route::post('/Admin/Maestro/TipoItem/create', 'create');
    Route::get('/Admin/Maestro/TipoItem/{id}/edit', 'edit');
    Route::post('/Admin/Maestro/TipoItem/search', 'search');
    Route::put('/Admin/Maestro/TipoItem/{id}/update', 'update');
    Route::post('/Admin/Maestro/TipoItem/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/TipoItem/{id}/delete', 'delete');
});

Route::controller(marcaController::class)->group(function () {
    Route::get('/Admin/Maestro/Marca/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/Marca/Editar/{id}', 'Agregar');
    Route::get('/Admin/Maestro/Marca/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/Marca/loadData','loadData');

    Route::get('/Admin/Maestro/Marca', 'index');
    Route::post('/Admin/Maestro/Marca/create', 'create');
    Route::get('/Admin/Maestro/Marca/{id}/edit', 'edit');
    Route::post('/Admin/Maestro/Marca/search', 'search');
    Route::put('/Admin/Maestro/Marca/{id}/update', 'update');
    Route::post('/Admin/Maestro/Marca/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/Marca/{id}/delete', 'delete');
});

Route::controller(tipoarticuloController::class)->group(function () {
    Route::get('/Admin/Maestro/TipoArticulo/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/TipoArticulo/Editar/{id}', 'Agregar');
    Route::get('/Admin/Maestro/TipoArticulo/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/TipoArticulo/loadData','loadData');

    Route::get('/Admin/Maestro/TipoArticulo', 'index');
    Route::post('/Admin/Maestro/TipoArticulo/create', 'create');
    Route::get('/Admin/Maestro/TipoArticulo/{id}/edit', 'edit');
    Route::post('/Admin/Maestro/TipoArticulo/search', 'search');
    Route::put('/Admin/Maestro/TipoArticulo/{id}/update', 'update');
    Route::post('/Admin/Maestro/TipoArticulo/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/TipoArticulo/{id}/delete', 'delete');
});

Route::controller(tipopedidoController::class)->group(function () {
    Route::get('/Admin/Maestro/TipoPedido/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/TipoPedido/Editar/{id}', 'Agregar');
    Route::get('/Admin/Maestro/TipoPedido/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/TipoPedido/loadData','loadData');

    Route::get('/Admin/Maestro/TipoPedido', 'index');
    Route::post('/Admin/Maestro/TipoPedido/create', 'create');
    Route::get('/Admin/Maestro/TipoPedido/{id}/edit', 'edit');
    Route::post('/Admin/Maestro/TipoPedido/search', 'search');
    Route::put('/Admin/Maestro/TipoPedido/{id}/update', 'update');
    Route::post('/Admin/Maestro/TipoPedido/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/TipoPedido/{id}/delete', 'delete');
});

Route::controller(formapagoController::class)->group(function () {
    Route::get('/Admin/Maestro/FormaPago/Agregar/', 'Agregar');
    Route::get('/Admin/Maestro/FormaPago/Editar/{id}', 'Agregar');
    Route::get('/Admin/Maestro/FormaPago/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Maestro/FormaPago/loadData','loadData');

    Route::get('/Admin/Maestro/FormaPago', 'index');
    Route::post('/Admin/Maestro/FormaPago/create', 'create');
    Route::get('/Admin/Maestro/FormaPago/{id}/edit', 'edit');
    Route::post('/Admin/Maestro/FormaPago/search', 'search');
    Route::put('/Admin/Maestro/FormaPago/{id}/update', 'update');
    Route::post('/Admin/Maestro/FormaPago/{id}/visibility', 'visibility');
    Route::delete('/Admin/Maestro/FormaPago/{id}/delete', 'delete');
});


Route::controller(distritoController::class)->group(function () {
    Route::get('/Admin/Administracion/Distrito/Agregar/', 'Agregar');
    Route::get('/Admin/Administracion/Distrito/Editar/{id}', 'Agregar');
    Route::get('/Admin/Administracion/Distrito/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Administracion/Distrito/loadData','loadData');

    Route::get('/Admin/Administracion/Distrito', 'index');
    Route::post('/Admin/Administracion/Distrito/create', 'create');
    Route::get('/Admin/Administracion/Distrito/{id}/edit', 'edit');
    Route::post('/Admin/Administracion/Distrito/search', 'search');
    Route::put('/Admin/Administracion/Distrito/{id}/update', 'update');
    Route::post('/Admin/Administracion/Distrito/{id}/visibility', 'visibility');
    Route::delete('/Admin/Administracion/Distrito/{id}/delete', 'delete');
});

Route::controller(cuotakmController::class)->group(function () {
    Route::get('/Admin/Administracion/Cuota/Agregar/', 'Agregar');
    Route::get('/Admin/Administracion/Cuota/Editar/{id}', 'Agregar');
    Route::get('/Admin/Administracion/Cuota/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Administracion/Cuota/loadData','loadData');

    Route::get('/Admin/Administracion/Cuota', 'index');
    Route::post('/Admin/Administracion/Cuota/create', 'create');
    Route::get('/Admin/Administracion/Cuota/{id}/edit', 'edit');
    Route::post('/Admin/Administracion/Cuota/search', 'search');
    Route::put('/Admin/Administracion/Cuota/{id}/update', 'update');
    Route::post('/Admin/Administracion/Cuota/{id}/visibility', 'visibility');
    Route::delete('/Admin/Administracion/Cuota/{id}/delete', 'delete');
});

Route::controller(itemController::class)->group(function () {
    Route::get('/Admin/Almacen/Item/Agregar/', 'Agregar');
    Route::get('/Admin/Almacen/Item/Editar/{id}', 'Agregar');
    Route::get('/Admin/Almacen/Item/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Almacen/Item/loadData','loadData');

    Route::get('/Admin/Almacen/Item', 'index');
    Route::post('/Admin/Almacen/Item/create', 'create');
    Route::get('/Admin/Almacen/Item/{id}/edit', 'edit');
    Route::post('/Admin/Almacen/Item/search', 'search');
    Route::put('/Admin/Almacen/Item/{id}/update', 'update');
    Route::post('/Admin/Almacen/Item/{id}/visibility', 'visibility');
    Route::delete('/Admin/Almacen/Item/{id}/delete', 'delete');
});


Route::controller(proveedorController::class)->group(function () {
    Route::get('/Admin/Administracion/Proveedor/Agregar/', 'Agregar');
    Route::get('/Admin/Administracion/Proveedor/Editar/{id}', 'Agregar');
    Route::get('/Admin/Administracion/Proveedor/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Administracion/Proveedor/loadData','loadData');

    Route::get('/Admin/Administracion/Proveedor', 'index');
    Route::post('/Admin/Administracion/Proveedor/create', 'create');
    Route::get('/Admin/Administracion/Proveedor/{id}/edit', 'edit');
    Route::post('/Admin/Administracion/Proveedor/search', 'search');
    Route::put('/Admin/Administracion/Proveedor/{id}/update', 'update');
    Route::post('/Admin/Administracion/Proveedor/{id}/visibility', 'visibility');
    Route::delete('/Admin/Administracion/Proveedor/{id}/delete', 'delete');
});

Route::controller(ubicacionController::class)->group(function () {
    Route::get('/Admin/Administracion/Ubicacion/Agregar/', 'Agregar');
    Route::get('/Admin/Administracion/Ubicacion/Editar/{id}', 'Agregar');
    Route::get('/Admin/Administracion/Ubicacion/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Administracion/Ubicacion/loadData','loadData');

    Route::get('/Admin/Administracion/Ubicacion', 'index');
    Route::post('/Admin/Administracion/Ubicacion/create', 'create');
    Route::get('/Admin/Administracion/Ubicacion/{id}/edit', 'edit');
    Route::post('/Admin/Administracion/Ubicacion/search', 'search');
    Route::put('/Admin/Administracion/Ubicacion/{id}/update', 'update');
    Route::post('/Admin/Administracion/Ubicacion/{id}/visibility', 'visibility');
    Route::delete('/Admin/Administracion/Ubicacion/{id}/delete', 'delete');
});


Route::controller(usuarioController::class)->group(function () {
    Route::get('/Admin/Administracion/Usuario/Agregar/', 'Agregar');
    Route::get('/Admin/Administracion/Usuario/Editar/{id}', 'Agregar');
    Route::get('/Admin/Administracion/Usuario/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Administracion/Usuario/loadData','loadData');

    Route::get('/Admin/Administracion/Usuario', 'index');
    Route::post('/Admin/Administracion/Usuario/create', 'create');
    Route::get('/Admin/Administracion/Usuario/{id}/edit', 'edit');
    Route::post('/Admin/Administracion/Usuario/search', 'search');
    Route::put('/Admin/Administracion/Usuario/{id}/update', 'update');
    Route::post('/Admin/Administracion/Usuario/{id}/visibility', 'visibility');
    Route::delete('/Admin/Administracion/Usuario/{id}/delete', 'delete');
});

Route::controller(administradorController::class)->group(function () {
    Route::get('/Admin/Administracion/Administrador/Agregar/', 'Agregar');
    Route::get('/Admin/Administracion/Administrador/Editar/{id}', 'Agregar');
    Route::get('/Admin/Administracion/Administrador/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Administracion/Administrador/loadData','loadData');

    Route::get('/Admin/Administracion/Administrador', 'index');
    Route::post('/Admin/Administracion/Administrador/create', 'create');
    Route::get('/Admin/Administracion/Administrador/{id}/edit', 'edit');
    Route::post('/Admin/Administracion/Administrador/search', 'search');
    Route::put('/Admin/Administracion/Administrador/{id}/update', 'update');
    Route::post('/Admin/Administracion/Administrador/{id}/visibility', 'visibility');
    Route::delete('/Admin/Administracion/Administrador/{id}/delete', 'delete');
});


Route::controller(sucursalController::class)->group(function () {
    Route::get('/Admin/Administracion/Sucursales/Agregar/', 'Agregar');
    Route::get('/Admin/Administracion/Sucursales/Editar/{id}', 'Agregar');
    Route::get('/Admin/Administracion/Sucursales/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Administracion/Sucursales/loadData','loadData');

    Route::get('/Admin/Administracion/Sucursales', 'index');
    Route::post('/Admin/Administracion/Sucursales/create', 'create');
    Route::get('/Admin/Administracion/Sucursales/{id}/edit', 'edit');
    Route::post('/Admin/Administracion/Sucursales/search', 'search');
    Route::put('/Admin/Administracion/Sucursales/{id}/update', 'update');
    Route::post('/Admin/Administracion/Sucursales/{id}/visibility', 'visibility');
    Route::delete('/Admin/Administracion/Sucursales/{id}/delete', 'delete');
});


Route::controller(boletaController::class)->group(function () {
    Route::get('/Admin/Almacen/Boleta/Agregar/', 'Agregar');
    Route::get('/Admin/Almacen/Boleta/Editar/{id}', 'Agregar');
    Route::get('/Admin/Almacen/Boleta/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Almacen/Boleta/loadData','loadData');

    Route::get('/Admin/Almacen/Boleta', 'index');
    Route::post('/Admin/Almacen/Boleta/create', 'create');
    Route::get('/Admin/Almacen/Boleta/{id}/edit', 'edit');
    Route::post('/Admin/Almacen/Boleta/search', 'search');
    Route::put('/Admin/Almacen/Boleta/{id}/update', 'update');
    Route::post('/Admin/Almacen/Boleta/{id}/visibility', 'visibility');
    Route::delete('/Admin/Almacen/Boleta/{id}/delete', 'delete');
});


Route::controller(facturaController::class)->group(function () {
    Route::get('/Admin/Almacen/Factura/Agregar/', 'Agregar');
    Route::get('/Admin/Almacen/Factura/Editar/{id}', 'Agregar');
    Route::get('/Admin/Almacen/Factura/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Almacen/Factura/loadData','loadData');

    Route::get('/Admin/Almacen/Factura', 'index');
    Route::post('/Admin/Almacen/Factura/create', 'create');
    Route::get('/Admin/Almacen/Factura/{id}/edit', 'edit');
    Route::post('/Admin/Almacen/Factura/search', 'search');
    Route::put('/Admin/Almacen/Factura/{id}/update', 'update');
    Route::post('/Admin/Almacen/Factura/{id}/visibility', 'visibility');
    Route::delete('/Admin/Almacen/Factura/{id}/delete', 'delete');
});


Route::controller(articuloController::class)->group(function () {
    Route::get('/Admin/Almacen/Articulo/Agregar/', 'Agregar');
    Route::get('/Admin/Almacen/Articulo/Editar/{id}', 'Agregar');
    Route::get('/Admin/Almacen/Articulo/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Almacen/Articulo/loadData','loadData');

    Route::post('/Admin/Almacen/Articulo/imagen', 'load_img');


    Route::get('/Admin/Almacen/Articulo', 'index');
    Route::post('/Admin/Almacen/Articulo/create', 'create');
    Route::get('/Admin/Almacen/Articulo/{id}/edit', 'edit');
    Route::post('/Admin/Almacen/Articulo/search', 'search');
    Route::put('/Admin/Almacen/Articulo/{id}/update', 'update');
    Route::post('/Admin/Almacen/Articulo/{id}/visibility', 'visibility');
    Route::delete('/Admin/Almacen/Articulo/{id}/delete', 'delete');
});



Route::controller(paqueteController::class)->group(function () {
    Route::get('/Admin/Almacen/Paquete/Agregar/', 'Agregar');
    Route::get('/Admin/Almacen/Paquete/Editar/{id}', 'Agregar');
    Route::get('/Admin/Almacen/Paquete/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Almacen/Paquete/loadData','loadData');

    Route::get('/Admin/Almacen/Paquete', 'index');
    Route::post('/Admin/Almacen/Paquete/create', 'create');
    Route::get('/Admin/Almacen/Paquete/{id}/edit', 'edit');
    Route::post('/Admin/Almacen/Paquete/search', 'search');
    Route::put('/Admin/Almacen/Paquete/{id}/update', 'update');
    Route::post('/Admin/Almacen/Paquete/{id}/visibility', 'visibility');
    Route::delete('/Admin/Almacen/Paquete/{id}/delete', 'delete');
});


Route::controller(pedidoController::class)->group(function () {
    Route::get('/Admin/Almacen/Pedido/Agregar/', 'Agregar');
    Route::get('/Admin/Almacen/Pedido/Editar/{id}', 'Agregar');
    Route::get('/Admin/Almacen/Pedido/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Almacen/Pedido/loadData','loadData');

    Route::get('/Admin/Almacen/Pedido', 'index');
    Route::post('/Admin/Almacen/Pedido/create', 'create');
    Route::get('/Admin/Almacen/Pedido/{id}/edit', 'edit');
    Route::post('/Admin/Almacen/Pedido/search', 'search');
    Route::put('/Admin/Almacen/Pedido/{id}/update', 'update');
    Route::post('/Admin/Almacen/Pedido/{id}/visibility', 'visibility');
    Route::delete('/Admin/Almacen/Pedido/{id}/delete', 'delete');
});


Route::controller(inventarioController::class)->group(function () {
    Route::get('/Admin/Almacen/Inventario/Agregar/', 'Agregar');
    Route::get('/Admin/Almacen/Inventario/Editar/{id}', 'Agregar');
    Route::get('/Admin/Almacen/Inventario/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Almacen/Inventario/loadData','loadData');

    Route::get('/Admin/Almacen/Inventario', 'index');
    Route::post('/Admin/Almacen/Inventario/create', 'create');
    Route::get('/Admin/Almacen/Inventario/{id}/edit', 'edit');
    Route::post('/Admin/Almacen/Inventario/search', 'search');
    Route::put('/Admin/Almacen/Inventario/{id}/update', 'update');
    Route::post('/Admin/Almacen/Inventario/{id}/visibility', 'visibility');
    Route::delete('/Admin/Almacen/Inventario/{id}/delete', 'delete');
});



Route::controller(tipobannerController::class)->group(function () {
    Route::get('/Admin/Configuracion/TipoBanner/Agregar/', 'Agregar');
    Route::get('/Admin/Configuracion/TipoBanner/Editar/{id}', 'Agregar');
    Route::get('/Admin/Configuracion/TipoBanner/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Configuracion/TipoBanner/loadData','loadData');

    Route::get('/Admin/Configuracion/TipoBanner', 'index');
    Route::post('/Admin/Configuracion/TipoBanner/create', 'create');
    Route::get('/Admin/Configuracion/TipoBanner/{id}/edit', 'edit');
    Route::post('/Admin/Configuracion/TipoBanner/search', 'search');
    Route::put('/Admin/Configuracion/TipoBanner/{id}/update', 'update');
    Route::post('/Admin/Configuracion/TipoBanner/{id}/visibility', 'visibility');
    Route::delete('/Admin/Configuracion/TipoBanner/{id}/delete', 'delete');
});


Route::controller(bannerController::class)->group(function () {
    Route::get('/Admin/Configuracion/Banner/Agregar/', 'Agregar');
    Route::get('/Admin/Configuracion/Banner/Editar/{id}', 'Agregar');
    Route::get('/Admin/Configuracion/Banner/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Configuracion/Banner/loadData','loadData');

    Route::get('/Admin/Configuracion/Banner', 'index');
    Route::post('/Admin/Configuracion/Banner/create', 'create');
    Route::get('/Admin/Configuracion/Banner/{id}/edit', 'edit');
    Route::post('/Admin/Configuracion/Banner/search', 'search');
    Route::put('/Admin/Configuracion/Banner/{id}/update', 'update');
    Route::post('/Admin/Configuracion/Banner/{id}/visibility', 'visibility');
    Route::delete('/Admin/Configuracion/Banner/{id}/delete', 'delete');
});

Route::controller(menuController::class)->group(function () {
    Route::get('/Admin/Configuracion/Menu/Agregar/', 'Agregar');
    Route::get('/Admin/Configuracion/Menu/Editar/{id}', 'Agregar');
    Route::get('/Admin/Configuracion/Menu/modal_delete/{id}', 'modal_delete');
    Route::post('/Admin/Configuracion/Menu/loadData','loadData');

    Route::get('/Admin/Configuracion/Menu', 'index');
    Route::post('/Admin/Configuracion/Menu/create', 'create');
    Route::get('/Admin/Configuracion/Menu/{id}/edit', 'edit');
    Route::post('/Admin/Configuracion/Menu/search', 'search');
    Route::put('/Admin/Configuracion/Menu/{id}/update', 'update');
    Route::post('/Admin/Configuracion/Menu/{id}/visibility', 'visibility');
    Route::delete('/Admin/Configuracion/Menu/{id}/delete', 'delete');
});






