function enviarPedido() {
    const limon = document.getElementById('limon').value;
    const grosella = document.getElementById('grosella').value;
    const tamarindo = document.getElementById('tamarindo').value;

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

    enviarEmail(limon, grosella, tamarindo, total);
}

function enviarEmail(limon, grosella, tamarindo, total) {
    const mailto = `mailto:gabriangel015@gmail.com?subject=Nuevo%20Pedido&body=
        Pedido de Paletas:
        %0ALimón: ${limon} ($${(limon * 3.5).toFixed(2)})
        %0AGrosella: ${grosella} ($${(grosella * 3.5).toFixed(2)})
        %0ATamarindo: ${tamarindo} ($${(tamarindo * 3.5).toFixed(2)})
        %0ATotal: $${total.toFixed(2)}`;

    // Reemplaza "tuemail@example.com" con tu correo electrónico
    window.location.href = mailto;
}