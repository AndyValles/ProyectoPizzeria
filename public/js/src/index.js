import { query, queryAll, get, load_on, close_modal, cargar_modal, base_root, modifCssRules } from "../load.min.js";

var actual = 1;
var valor = 40;
var value = actual;

var total_carrito = 0;
var carrito_cantidad = 0;
var cant = query(".ctn-cant-pres") != null ? parseInt(query(".ctn-cant-pres").innerHTML) : 0;
var rootCss = document.documentElement.style;



const carrucel_input = setInterval(key => {
    Carrusel();
    actual++;
}, 5000);

var witd = 0;
setInterval(e => {
    if (witd == 100) { witd = 0; }
    modifCssRules(".progress-bar").width = witd + "%";
    witd++;
}, 50);

if (query("#dis-session").getAttribute("content") == "") {
    document.addEventListener("DOMContentLoaded", e => { get(base_root + "/sucursal", ".modal"); });
}

function Carrusel() {
    var item = queryAll(".item-slide");
    var item_total = item.length;
    if (actual < 1) {
        actual = item_total;
    }
    if (actual > item_total) {
        actual = 1;
    }
    item.forEach((e, key) => {
        if ((key + 1) == actual) {
            query(".txt-txt-actual").innerHTML = (actual.toString().length == 1 ? "0" : "") + (actual + 1);
            e.classList.add("item-slide-animate-0");
        }
    });
}

function reloadcarrucel() {
    clearInterval(carrucel_input);
    carrucel_input = setInterval(key => {
        Carrusel(actual += 1);
    }, 5000);
}

function cargar_modal_producto(e) {
    var id = e.target.getAttribute("data-id");
    if (id != null) {
        cargar_modal("Producto/" + id);
    }
}

function agregarCarrito(e) {
    console.log("0");
    var data = {
        articulo: query("#CodigoInterno").value,
        artit: "1",
        cantidad: query(".ctn-cant-pres").innerHTML,
        total: query("#ctn-pres-total").value,
    }
    axios({
        method: "post",
        url: base_root + "/AgregarCarrito",
        data: data,
        responseType: "json"
    }).then(function(r) {
        query(".precio").innerHTML = "S/." + r.data.total;
        query(".car").innerHTML = r.data.cantidad;
        get("/infopedido", ".modal");
    });
}

load_on(document, "click", ".btn-slider-pp", function(e) {
    var s = this.getAttribute("data-value");
    Carrusel(actual = (s - 1));
    //reloadcarrucel();
});

load_on(document, "click", ".btn-realizar-pedido", function(e) {
    get("/pedidoenviado", "", res => {
        window.location.href = base_root + "/carrito";
    });
});



load_on(document, "click", ".btn-modal-Salir", function() { close_modal() });


load_on(document, 'click', '.btn-agregar-carrito', function(e) {
    agregarCarrito(e);
});

load_on(document, 'click', '.btn-hamburger', function(e) {
    query(".cnt--menu").classList.toggle("left-0");
});

load_on(document, 'click', '.btn-close-menu', function(e) {
    query(".cnt--menu").classList.toggle("left-0");
});

load_on(document, 'click', '.btn-distrito', function(e) {
    get(base_root + "/sucursal", ".modal");
});

load_on(document, 'click', '.btn-disname-mm', function(e) {
    let codigo = e.target.getAttribute("data-id");

    axios.get(base_root + "/sucursal/" + codigo).then(res => {
        close_modal();
        query(".name_dis").innerHTML = res.data.Distrito;
        query(".tel").innerHTML = res.data.Telefono;
    }).catch(err => {
        console.error(err);
    });
});

load_on(document, 'click', '.btn-md-pedido-exit', function(e) {
    close_modal();
});

load_on(document, 'click', '.btn-prev', function(event) {
    Carrusel();
    actual -= 1;
});

load_on(document, 'click', '.btn-next', function(event) {
    Carrusel();
    actual += 1;
});

load_on(document, 'click', '.btn-cant-plus', function(event) {
    if (parseInt(query("#cantidad").value) > cant) {
        cant += 1;
        query(".ctn-cant-pres").innerHTML = cant;
    }
});

load_on(document, 'click', '.btn-cant-minus', function(event) {
    if (cant > 1) {
        cant -= 1;
        query(".ctn-cant-pres").innerHTML = cant;
    }
});
