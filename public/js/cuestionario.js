const form = document.querySelector("form");
const listaResultados = document.getElementById("lista-resultados");
const cargando = document.getElementById("cargando");
const detalles = document.getElementById("detalles");

const duracionMinima = {
    corta: 0,
    larga: 120,
    indiferente: 0,
};

const generos = {
    feliz: 35, // Comedia
    triste: 18, // Drama
    enojado: 28, // Acción
    cansado: 99, // Documental
    emocionado: 12, // Aventura
};

const aptaParaTodoPublico = {
    "0-6": "G",
    "7-13": "PG",
    "14-17": "PG-13",
};

form.addEventListener("submit", (event) => {
    event.preventDefault(); // Evita que se envíe el formulario

    form.classList.add("formulario-oculto");

    cargando.style.display = "block";

    const formData = new FormData(form);
    const opciones = {
        sentimiento: formData.get("sentimiento"),
        edad: formData.get("edad"),
        duracion: formData.get("duracion"),
        maraton: formData.get("maraton"),
    };

    // Obtener la clasificación adecuada para la edad ingresada
    const clasificacion = aptaParaTodoPublico[opciones.edad];

    // Construir URL de la API con opciones de búsqueda
    const url =
        `https://api.themoviedb.org/3/discover/movie?api_key=0202074c6fd19918f230acfa46a461d5&language=es-ES&include_adult=false&include_video=false` +
        `&certification_country=US&certification=${clasificacion}` +
        `&sort_by=popularity.desc&with_runtime.gte=${
            duracionMinima[opciones.duracion]
        }` +
        `&with_genres=${generos[opciones.sentimiento]}` +
        `&vote_count.gte=1000`;

    let totalResults = 0;
    let totalPages = 0;
    const peliculas = [];

    // Mostrar GIF de carga
    cargando.classList.remove("oculto");

    // Función para realizar la búsqueda paginada de películas
    const buscarPeliculas = (page) => {
        fetch(`${url}&page=${page}`)
            .then((response) => response.json())
            .then((data) => {
                totalResults = data.total_results;
                totalPages = data.total_pages;

                // Agregar las películas de esta página al array de resultados
                peliculas.push(...data.results);

                // Si hay más páginas, buscar las siguientes
                if (page < totalPages) {
                    buscarPeliculas(page + 1);
                } else {
                    // Si se han obtenido todas las películas, seleccionar aleatoriamente 5
                    const peliculasAleatorias = [];
                    while (
                        peliculasAleatorias.length < 5 &&
                        peliculas.length > 0
                    ) {
                        const indiceAleatorio = Math.floor(
                            Math.random() * peliculas.length
                        );
                        peliculasAleatorias.push(peliculas[indiceAleatorio]);
                        peliculas.splice(indiceAleatorio, 1);
                    }

                    setTimeout(() => {
                        cargando.style.display = "none";
                        // Limpiar lista de resultados
                        listaResultados.innerHTML = "";

                        // Mostrar cada película seleccionada aleatoriamente en la lista de resultados
                        peliculasAleatorias.forEach((pelicula) => {
                            const peliculaItem = document.createElement("li");

                            // Crear elemento de imagen de película
                            const peliculaImagen =
                                document.createElement("img");
                            peliculaImagen.src = `https://image.tmdb.org/t/p/w200${pelicula.poster_path}`;
                            peliculaImagen.alt = pelicula.title;
                            peliculaItem.appendChild(peliculaImagen);

                            //Función seleccionar la película y abrir detalles
                            peliculaItem.addEventListener("click", function () {
                             console.log("hool")
                             console.log(pelicula.trailer)

                             // Crear elementos para la información de la película
              const cajaDetalles = document.createElement("div");
              const peliculaTitulo = document.createElement("h2");
              const p = document.createElement("p");
              const votoTexto = document.createElement("p");
              const verTrailerBtn = document.createElement("button");
            
              // Agregar texto y clases a los elementos
              cajaDetalles.classList.add("detalles");
              peliculaTitulo.textContent = pelicula.title;
              p.textContent = pelicula.overview;
              votoTexto.textContent = "Vote average: " + pelicula.vote_average;
              verTrailerBtn.textContent = "Ver trailer";
              verTrailerBtn.classList.add("ver-trailer-btn");
            
              // Agregar elementos al contenedor de detalles
              cajaDetalles.appendChild(peliculaTitulo);
              cajaDetalles.appendChild(p);
              cajaDetalles.appendChild(votoTexto);
              cajaDetalles.appendChild(verTrailerBtn);
            
              // Agregar el contenedor de detalles al contenedor principal
              detalles.appendChild(cajaDetalles);
              const modal = document.createElement("div");
                                // Agregar evento de clic al botón "Ver trailer"
                                verTrailerBtn.addEventListener("click", function () {
                                    // Realizar la solicitud a la API de TMDb para obtener los videos de la película
                                    fetch(`https://api.themoviedb.org/3/movie/${pelicula.id}/videos?api_key=0202074c6fd19918f230acfa46a461d5`)
                                      .then(response => response.json())
                                      .then(data => {
                                        // Obtener el primer video de la lista de resultados
                                        const video = data.results[0];

                                        if (video) {
                                         
                                          modal.classList.add("modal");

                                          // Generar el código del iframe del video de YouTube
                                          const iframeSrc = `https://www.youtube.com/embed/${video.key}`;
                                          const iframe = document.createElement("iframe");
                                          iframe.src = iframeSrc;
                                          iframe.frameBorder = "0";
                                          iframe.allowFullscreen = true;

                                          const modalContent = document.createElement("div");
                                          modalContent.classList.add("modal-content");
                                          modalContent.appendChild(iframe);

                                          modal.appendChild(modalContent);

                                          // Agregar el modal al DOM
                                          document.body.appendChild(modal);

                                          // Agregar evento de clic al botón de cerrar el modal
                                          const closeBtn = modal.querySelector(".close");
                                          closeBtn.addEventListener("click", function () {
                                            modal.remove();
                                          });
                                        } else {
                                          console.log("No se encontraron videos para la película");
                                        }
                                      })
                                      .catch(error => {
                                        console.log("Error al obtener los videos de la película", error);
                                      });
                                  });
                            });



                            // Crear elemento de título de película
                            const peliculaTitulo = document.createElement('h2');
                            peliculaTitulo.textContent = pelicula.title;
                            peliculaItem.appendChild(peliculaTitulo);

                            // Agregar película a la lista de resultados

                            listaResultados.appendChild(peliculaItem);

                        });
                    }, 5000);
                    

                }
            })
            .catch(error => console.log(error));
    };

    // Iniciar la búsqueda en la página 1
    buscarPeliculas(1);
});

var checkboxes = document.getElementById("checkboxes");
var selectBox = document.getElementById("selectBox");

function showCheckboxes() {
    checkboxes.style.display =
        checkboxes.style.display === "block" ? "none" : "block";
}

function getSelectedOptions() {
    var selectedOptions = [];
    var checkboxes = document.getElementsByName("sentimiento");

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            selectedOptions.push(checkboxes[i].value);
        }
    }

    return selectedOptions;
}

document.getElementById("sentimiento").addEventListener("change", function () {
    var selectedOptions = getSelectedOptions();

    if (selectedOptions.length > 3) {
        // Deselecciona las opciones excedentes
        for (var i = 0; i < checkboxes.length; i++) {
            if (!checkboxes[i].checked) {
                checkboxes[i].disabled = true;
            }
        }
    } else {
        // Habilita todas las opciones
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].disabled = false;
        }
    }
});

// Obtén los valores seleccionados cuando se envíe el formulario
document
    .getElementById("movie-form")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío del formulario para este ejemplo

        var selectedOptions = getSelectedOptions();

        // Realiza las acciones que desees con los valores seleccionados
        console.log(selectedOptions);
    });

document
    .getElementById("movie-form")
    .addEventListener("submit", function (event) {
        var checkboxes = document.querySelectorAll(
            "#checkboxes input[type='checkbox']"
        );
        var isChecked = false;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }

        if (!isChecked) {
            // Muestra la alerta si no se ha seleccionado ninguna opción
            alert("Debes seleccionar al menos una opción");
        }
    });
