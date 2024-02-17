
fetch('/index.php?controller=api&action=insertar_reseñas', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(nuevaReseña)
})
.then(response => response.json())
.then(data => {
    // Mostrar mensaje de éxito o error
    alert(data.message);
    // Limpiar el formulario después de enviar la reseña
    document.getElementById('formulario-reseña').reset();
})
.catch(error => {
    console.error('Error al enviar reseña:', error);

 
});


    // Event listener para el envío del formulario de reseñas
    document.getElementById('formulario-reseña').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de manera tradicional

        const titulo = document.getElementById('titulo').value;
        const comentario = document.getElementById('comentario').value;
        const valoracion = document.getElementById('valoracion').value;
        const usuario = document.getElementById('usuario').value;
        const pedido = document.getElementById('pedido').value;

        // Crear un objeto con los datos de la reseña
        const nuevaReseña = {
            titulo: titulo,
            comentario: comentario,
            valoracion: valoracion,
            usuario: usuario,
            pedido: pedido
        };

        // Enviar la reseña al servidor utilizando fetch
    });