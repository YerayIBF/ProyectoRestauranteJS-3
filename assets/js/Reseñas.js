let reseñas = [];

function obtenerReseñas() {
    fetch('/index.php?controller=api&action=buscar_reseñas', {
        method: 'GET', 
        headers: {
            'Content-Type': 'application/json', 
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('No se pudo obtener las reseñas');
        }
        return response.json();
    })
    .then(data => {
        reseñas = data; 
        mostrarReseñas(reseñas); 
        filtrarReseñas();
    })
    .catch(error => {
        console.error('Error al obtener las reseñas:', error);
    });
}

function mostrarReseñas(reseñas) {
    const reseñasContainer = document.getElementById('reseñas-container');
    reseñasContainer.innerHTML = ''; 

    reseñas.forEach(reseña => {
        const div = document.createElement('div');
        div.classList.add('reseña');
        div.innerHTML = `
            <p><strong>Usuario:</strong> ${reseña.Usuario}</p>
            <p><strong>Valoración:</strong> ${reseña.Valoracion}</p>
            <h3>${reseña.Titulo}</h3>
            <p>${reseña.Comentario}</p>
            <p><strong>ID_Pedido:</strong> ${reseña.Pedido}</p>
        `;
        reseñasContainer.appendChild(div);
    });
}


