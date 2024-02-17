const apiUrl = '/index.php?controller=api&action=calcular_y_actualizar_puntos';
function calcularYActualizarPuntos(usuarioID, totalCompra) {
    const formData = new FormData();
    formData.append('action', 'calcular_y_actualizar_puntos');
    formData.append('usuario_id', usuarioID);
    formData.append('total_compra', totalCompra);

    fetch(apiUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta de la API (por ejemplo, mostrar el resultado de la actualización de puntos)
        console.log('Resultado de la actualización de puntos:', data);
    })
    .catch(error => {
        console.error('Error al calcular y actualizar puntos:', error);
    });
}