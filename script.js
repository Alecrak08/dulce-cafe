
document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript cargado correctamente");

    // MODO OSCURO
    const botonTema = document.querySelector("#btn-tema");

    if (botonTema) {
        botonTema.addEventListener("click", function () {
            document.body.classList.toggle("oscuro");

            if (document.body.classList.contains("oscuro")) {
                botonTema.textContent = "Activar modo claro";
            } else {
                botonTema.textContent = "Activar modo oscuro";
            }
        });
    } else {
        console.error("No se encontró el botón de modo oscuro");
    }

    // FORMULARIO
    const formulario = document.querySelector("#form-contacto");
    const respuesta = document.querySelector("#respuesta-formulario");

    if (formulario && respuesta) {
        formulario.addEventListener("submit", function (evento) {
            evento.preventDefault();

            const nombre = document.querySelector("#nombre").value.trim();

            respuesta.textContent =
                "¡Gracias, " + nombre +
                "! Tu mensaje se registró como demostración. " +
                "Este sitio todavía no envía correos.";

            respuesta.classList.add("mensaje-exito");
            formulario.reset();
        });
    } else {
        console.error("No se encontró el formulario o el mensaje de respuesta");
    }
});