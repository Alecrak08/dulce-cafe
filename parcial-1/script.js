function confirmarPedido() {
    const mensaje = document.querySelector("#mensaje");

    mensaje.textContent = "pedido confirmado - te atiende luis alejandro terceros gutierrez";
    mensaje.classList.remove("oculto");
}

document.querySelector("#btn-confirmar").addEventListener("click", confirmarPedido);