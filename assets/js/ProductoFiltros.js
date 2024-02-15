document.addEventListener('DOMContentLoaded', function() {
const checkboxes = document.querySelectorAll('.filtro-categoria');

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        console.log('Evento de cambio detectado');
        filtrarProductos();
    });
});
});

function filtrarProductos() {
    const productos = document.querySelectorAll('.card');
    const categoriasSeleccionadas = obtenerCategoriasSeleccionadas();

    productos.forEach(producto => {
        const categoriaProducto = parseInt(producto.dataset.categoria); 
        if (categoriasSeleccionadas.length === 0 || categoriasSeleccionadas.includes(categoriaProducto.toString())) {
            producto.style.display = 'block';
        } else {
            producto.style.display = 'none';
        }
    });
}

function obtenerCategoriasSeleccionadas() {
    const checkboxes = document.querySelectorAll('.filtro-categoria:checked');
    const categoriasSeleccionadas = Array.from(checkboxes).map(checkbox => checkbox.value);
    return categoriasSeleccionadas;
}