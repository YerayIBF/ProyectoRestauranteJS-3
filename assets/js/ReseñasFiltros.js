let reseñasFiltradas = []; 

document.addEventListener('DOMContentLoaded', () => {
    obtenerReseñas();
    reseñasFiltradas = [reseñas]; 
});
document.getElementById('filtro-valoracion').addEventListener('change', filtrarReseñas);
document.getElementById('orden-ascendente').addEventListener('click', ordenarReseñasAscendente);
document.getElementById('orden-descendente').addEventListener('click', ordenarReseñasDescendente);

function filtrarReseñas() {
    const filtroValoracion = parseInt(document.getElementById('filtro-valoracion').value); 

    reseñasFiltradas = reseñas.filter(reseña => {
        return filtroValoracion === 0 || parseInt(reseña.Valoracion) === filtroValoracion; 
    });
    mostrarReseñas(reseñasFiltradas);
}

function ordenarReseñasAscendente() {
    reseñasFiltradas.sort((a, b) => a.Valoracion - b.Valoracion);
    mostrarReseñas(reseñasFiltradas);
}

function ordenarReseñasDescendente() {
    reseñasFiltradas.sort((a, b) => b.Valoracion - a.Valoracion);
    mostrarReseñas(reseñasFiltradas);
}