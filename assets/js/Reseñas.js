let reseñas = []; // Este será tu array de reseñas, asegúrate de tenerlo poblado con tus datos

function obtenerReseñas() {
    fetch('http://localhost/index.php?controller=api&action=buscar_reseñas', {
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




//let resultado;
//fetch('http://localhost/index.php?controller=api&action=buscar_reseñas')
  //  .then(data => data.json())
   // .then(arrayReseñas => {
    //    resultado = arrayReseñas;
     //   const container = document.getElementById('reseñas-container');

        //resultado.forEach(reseña => {
         //   const div = document.createElement('div');
          //  div.classList.add('reseña');
           // div.innerHTML = `
            //    <p><strong>Usuario:</strong> ${reseña.Usuario}</p>
             //   <p><strong>Valoración:</strong> ${reseña.Valoracion}</p>
              //  <h3>${reseña.Titulo}</h3>
               // <p>${reseña.Comentario}</p>
                //<p><strong>ID_Pedido:</strong> ${reseña.Pedido}</p>
            //`;
          //  container.appendChild(div);
        //});
    //})
   // .catch(error => {
    //    console.error('Error al obtener las reseñas:', error);
    //});




 //   fetch('http://localhost/index.php?controller=api&action=buscar_reseñas', {
 //       method: 'GET', 
  //      headers: {
  //          'Content-Type': 'application/json', 
    //    },
  //  })
 //   .then(response => {
 //       if (!response.ok) {
   //         throw new Error('No se pudo obtener las reseñas');
  //      }
 //       return response.json();
//    })
  //  .then(data => {
   //     const reseñas = data; // Guardar las reseñas obtenidas
  //      const reseñasContainer = document.getElementById('reseñas-container');
   //     reseñasContainer.innerHTML = ''; 

        // Mostrar las reseñas en la página
    //    reseñas.forEach(reseña => {
    //        const div = document.createElement('div');
   //         div.classList.add('reseña');
  //          div.innerHTML = `
            //            <p><strong>Usuario:</strong> ${reseña.Usuario}</p>
                //           <p><strong>Valoración:</strong> ${reseña.Valoracion}</p>
                //          <h3>${reseña.Titulo}</h3>
                //          <p>${reseña.Comentario}</p>
                //          <p><strong>ID_Pedido:</strong> ${reseña.Pedido}</p>
                //       `;
      //      reseñasContainer.appendChild(div);
   //     });

        // Manejar el evento de cambio en el filtro de estrellas
    //    document.getElementById('filtro-nota').addEventListener('change', () => {
   //         const filtroNota = document.getElementById('filtro-nota').value;
    //        const reseñasFiltradas = reseñas.filter(reseña => filtroNota === '0' || reseña.Valoracion === parseInt(filtroNota));
     //       mostrarReseñas(reseñasFiltradas);
     //   });
  //  })
   // .catch(error => {
      //  console.error('Error al obtener las reseñas:', error);
    //});