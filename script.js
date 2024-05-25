function enviarPedido() {
    const limon = parseInt(document.getElementById('limon').value);
    const grosella = parseInt(document.getElementById('grosella').value);
    const tamarindo = parseInt(document.getElementById('tamarindo').value);

    const total = (limon * 3.5) + (grosella * 3.5) + (tamarindo * 3.5);

    const resumen = `
        <h2>Resumen del Pedido</h2>
        <p>Limón: ${limon} ($${(limon * 3.5).toFixed(2)})</p>
        <p>Grosella: ${grosella} ($${(grosella * 3.5).toFixed(2)})</p>
        <p>Tamarindo: ${tamarindo} ($${(tamarindo * 3.5).toFixed(2)})</p>
        <p><strong>Total: $${total.toFixed(2)}</strong></p>
    `;

    document.getElementById('resumenPedido').innerHTML = resumen;
    document.getElementById('resumenPedido').style.display = 'block';

    // Aquí puedes llamar a la función enviarEmail() si deseas enviar un correo electrónico al hacer clic en el botón de enviar pedido
}

// Esta función enviarEmail() se encarga de enviar un correo electrónico con el resumen del pedido
function enviarEmail(limon, grosella, tamarindo, total) {
    const mailto = `mailto:tuemail@example.com?subject=Nuevo%20Pedido&body=
        Pedido de Paletas:
        %0ALimón: ${limon} ($${(limon * 3.5).toFixed(2)})
        %0AGrosella: ${grosella} ($${(grosella * 3.5).toFixed(2)})
        %0ATamarindo: ${tamarindo} ($${(tamarindo * 3.5).toFixed(2)})
        %0ATotal: $${total.toFixed(2)}`;

    // Reemplaza "tuemail@example.com" con tu correo electrónico
    window.location.href = mailto;
}
