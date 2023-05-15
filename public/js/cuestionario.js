
const form = document.querySelector('form')
const listaResultados = document.getElementById('lista-resultados')
const cargando = document.getElementById('cargando')
const imagen1 = document.createElement('img')
const imagen2 = document.createElement('img')
const imagen3 = document.createElement('img')
const fotosContainer = document.getElementById('fotos-container')
const duracionMinima = {
    corta: 0,
    larga: 120,
    indiferente: 0
}
const generos = {
    feliz: 35, // Comedia
    triste: 18, // Drama
    enojado: 28, // Acción
    cansado: 99, // Documental
    emocionado: 12 // Aventura
}
const aptaParaTodoPublico = {
    '0-6': 'G',
    '7-13': 'PG',
    '14-17': 'PG-13'
}


function mostrarFotosAleatorias() {
    
    fetch('https://api.themoviedb.org/3/movie/now_playing?api_key=0202074c6fd19918f230acfa46a461d5')
      .then(response => response.json())
      .then(data => {
        const peliculasAleatorias = []
        while (peliculasAleatorias.length < 3 && data.results.length > 0) {
          const indiceAleatorio = Math.floor(Math.random() * data.results.length)
          peliculasAleatorias.push(data.results[indiceAleatorio])
          data.results.splice(indiceAleatorio, 1)
        }
        
        fotosContainer.style.display = 'block' // Agregar la clase 'oculto'
        peliculasAleatorias.forEach(pelicula => {
          const foto = document.createElement('img')
          foto.src = `https://image.tmdb.org/t/p/w200${pelicula.poster_path}`
          foto.alt = pelicula.title
          foto.classList.add('imagen-resultados') // Agregar la clase CSS
          fotosContainer.appendChild(foto)
        })
       
      }) 
    
  }
  
  
form.addEventListener('submit', event => {
      mostrarFotosAleatorias()
    event.preventDefault() // Evita que se envíe el formulario
    form.classList.add('formulario-oculto')
    cargando.style.display = 'block'
    
    const formData = new FormData(form)
    const opciones = {
        sentimiento: formData.get('sentimiento'),
        edad: formData.get('edad'),
        duracion: formData.get('duracion'),
        maraton: formData.get('maraton')
    }
    // Obtener la clasificación adecuada para la edad ingresada
    const clasificacion = aptaParaTodoPublico[opciones.edad]
    // Construir URL de la API con opciones de búsqueda
    const url =
        `https://api.themoviedb.org/3/discover/movie?api_key=0202074c6fd19918f230acfa46a461d5&language=es-ES&include_adult=false&include_video=false` +
        `&certification_country=US&certification=${clasificacion}` +
        `&sort_by=popularity.desc&with_runtime.gte=${duracionMinima[opciones.duracion]
        }` +
        `&with_genres=${generos[opciones.sentimiento]}` +
        `&vote_count.gte=1000`
    let totalResults = 0
    let totalPages = 0
    const peliculas = []
    // Mostrar GIF de carga
    cargando.classList.remove('oculto')
      
    // Función para realizar la búsqueda paginada de películas
    const buscarPeliculas = page => {
        fetch(`${url}&page=${page}`)
            .then(response => response.json())
            .then(data => {
                totalResults = data.total_results
                totalPages = data.total_pages
                // Agregar las películas de esta página al array de resultados
                peliculas.push(...data.results)
                // Si hay más páginas, buscar las siguientes
                if (page < totalPages) {
                    buscarPeliculas(page + 1)
                } else {
                    // Si se han obtenido todas las películas, seleccionar aleatoriamente 5
                    const peliculasAleatorias = []
                    while (
                        peliculasAleatorias.length < 5 &&
                        peliculas.length > 0
                    ) {
                        const indiceAleatorio = Math.floor(
                            Math.random() * peliculas.length
                        )
                        peliculasAleatorias.push(peliculas[indiceAleatorio])
                        peliculas.splice(indiceAleatorio, 1)
                    }
                    setTimeout(() => {
                        cargando.style.display = 'none'
                        fotosContainer.style.display = 'none';
                        // Limpiar lista de resultados
                        listaResultados.innerHTML = ''
                        // Mostrar cada película seleccionada aleatoriamente en la lista de resultados
                        peliculasAleatorias.forEach(pelicula => {
                            const peliculaItem = document.createElement('li')
                            // Crear elemento de imagen de película
                            const peliculaImagen = document.createElement('img')
                            peliculaImagen.src = `https://image.tmdb.org/t/p/w200${pelicula.poster_path}`
                            peliculaImagen.alt = pelicula.title
                            peliculaItem.appendChild(peliculaImagen)
                            // Crear elementos para la información de la película
                            const p = document.createElement('p')
                            const votoTexto = document.createElement('p')
                            const verTrailerBtn = document.createElement(
                                'button'
                            )
                            //Función seleccionar la película y abrir detalles
                            peliculaItem.addEventListener('click', function () {
                                const detalles = document.getElementById(
                                    'detalles'
                                )
                                detalles.innerHTML = ''
                                // Agregar texto y clases a los elementos
                                peliculaTitulo.textContent = pelicula.title
                                p.textContent = pelicula.overview
                                votoTexto.textContent =
                                    'Vote average: ' + pelicula.vote_average
                                verTrailerBtn.textContent = 'Ver trailer'
                                verTrailerBtn.classList.add('ver-trailer-btn')
                                detalles.classList.add('detalles')
                                // Agregar elementos al contenedor de detalles
                                detalles.appendChild(peliculaTitulo)
                                detalles.appendChild(p)
                                detalles.appendChild(votoTexto)
                                detalles.appendChild(verTrailerBtn)
                                // Agregar el contenedor de detalles al contenedor principal
                                verTrailerBtn.addEventListener(
                                    'click',
                                    function () {
                                        fetch(
                                            `https://api.themoviedb.org/3/movie/${pelicula.id}/videos?api_key=0202074c6fd19918f230acfa46a461d5`
                                        )
                                            .then(response => response.json())
                                            .then(data => {
                                                const video = data.results[0]
                                                if (video) {
                                                    const trailerURL = `https://www.youtube.com/watch?v=${video.key}`
                                                    // Abrir una nueva ventana o pestaña con la URL del trailer
                                                    window.open(
                                                        trailerURL,
                                                        '_blank'
                                                    )
                                                } else {
                                                    console.log(
                                                        'No se encontraron videos para la película'
                                                    )
                                                }
                                            })
                                            .catch(error => {
                                                console.log(
                                                    'Error al obtener los videos de la película',
                                                    error
                                                )
                                            })
                                    }
                                )
                            })
                            // Crear elemento de título de película
                            const peliculaTitulo = document.createElement('h2')
                            peliculaTitulo.textContent = pelicula.title
                            peliculaItem.appendChild(peliculaTitulo)
                            // Agregar película a la lista de resultados
                            listaResultados.appendChild(peliculaItem)
                        })
                        const guardarFormularioBtn = document.getElementById(
                            'guardarFormulario'
                        )
                        const h1title = document.getElementById(
                            'h2'
                        )
                        h1title.style.display = 'block'
                        guardarFormularioBtn.style.display = 'block'
                        guardarFormularioBtn.addEventListener(
                            'click',
                            function () {
                                const peliculasPresentadas = document.querySelectorAll(
                                    '#lista-resultados li'
                                )
                                // Obtén los datos relevantes de cada película
                                const peliculasGuardadas = Array.from(
                                    peliculasPresentadas
                                ).map(peliculaItem => {
                                    const peliculaTitulo = peliculaItem.querySelector(
                                        'h2'
                                    ).textContent
                                    const peliculaImagen = peliculaItem.querySelector(
                                        'img'
                                    ).src
                                    return {
                                        titulo: peliculaTitulo,
                                        imagen: peliculaImagen
                                    }
                                })
                                console.log(peliculasGuardadas)
                            }
                        )
                    }, 5000)
                }
            })
            .catch(error => console.log(error))
    }
    // Iniciar la búsqueda en la página 1
    buscarPeliculas(1)
})
var checkboxes = document.getElementById('checkboxes')
var selectBox = document.getElementById('selectBox')
function showCheckboxes() {
    checkboxes.style.display =
        checkboxes.style.display === 'block' ? 'none' : 'block'
}
function getSelectedOptions() {
    var selectedOptions = []
    var checkboxes = document.getElementsByName('sentimiento')
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            selectedOptions.push(checkboxes[i].value)
        }
    }
    return selectedOptions
}
document.getElementById('sentimiento').addEventListener('change', function () {
    var selectedOptions = getSelectedOptions()
    if (selectedOptions.length > 3) {
        // Deselecciona las opciones excedentes
        for (var i = 0; i < checkboxes.length; i++) {
            if (!checkboxes[i].checked) {
                checkboxes[i].disabled = true
            }
        }
    } else {
        // Habilita todas las opciones
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].disabled = false
        }
    }
})
// Obtén los valores seleccionados cuando se envíe el formulario
document
    .getElementById('movie-form')
    .addEventListener('submit', function (event) {
        event.preventDefault() // Evita el envío del formulario para este ejemplo
        var selectedOptions = getSelectedOptions()
        // Realiza las acciones que desees con los valores seleccionados
        console.log(selectedOptions)
    })
document
    .getElementById('search-button')
    .addEventListener('click', function (event) {
        var checkboxes = document.querySelectorAll(
            "#checkboxes input[type='checkbox']:checked"
        )
        var selectedCount = checkboxes.length
        if (selectedCount > 3) {
            // Mostrar alerta utilizando SweetAlert
            Swal.fire({
                title: '¡Alerta!',
                text: 'Solo puedes seleccionar un máximo de 3 emociones',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            })
            event.preventDefault() // Cancelar el envío del formulario
        }
    })
document
    .getElementById('search-button')
    .addEventListener('click', function (event) {
        var checkboxes = document.querySelectorAll(
            "#checkboxes input[type='checkbox']:checked"
        )
        var selectedCount = checkboxes.length
        if (selectedCount == 0) {
            // Mostrar alerta utilizando SweetAlert
            Swal.fire({
                title: '¡Alerta!',
                text: 'Debes seleccionar minimo una!',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            })
            event.preventDefault() // Cancelar el envío del formulario
        }
    })