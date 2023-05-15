const menuItems = document.querySelectorAll('.menu-item');

menuItems.forEach(item => {
  const submenu = item.querySelector('.submenu');
  const link = item.querySelector('a');

  link.addEventListener('click', e => {
    e.preventDefault();
    menuItems.forEach(otherItem => otherItem.classList.remove('show-submenu'));
    item.classList.toggle('show-submenu');
  });

  submenu.addEventListener('click', e => {
    e.stopPropagation();
  });

  document.addEventListener('click', e => {
    menuItems.forEach(otherItem => otherItem.classList.remove('show-submenu'));
  });
});


document.addEventListener("DOMContentLoaded", function (event) {
    const apiKey = "0202074c6fd19918f230acfa46a461d5";
    const url_pelisPopulares = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=es`;
    const url_estreno = `https://api.themoviedb.org/3/movie/upcoming?api_key=${apiKey}&language=es`;
    const url_seriesPopulares = `https://api.themoviedb.org/3/tv/popular?api_key=${apiKey}&language=es`;
    const url_seriesMejorV = `https://api.themoviedb.org/3/tv/top_rated?api_key=${apiKey}&language=es`;
    const url_pelisMejorV = `https://api.themoviedb.org/3/movie/top_rated?api_key=${apiKey}&language=es`;

    var currentUrl = window.location.href;

    let url_seleccionada = "";

    if (currentUrl.indexOf("estrenos") !== -1) {
        console.log("tiene estrenos");
        url_seleccionada = url_estreno;
    } else if (currentUrl.indexOf("pelisMejorV") !== -1) {
        url_seleccionada = url_pelisMejorV;
    } else if (currentUrl.indexOf("seriesMejorV") !== -1) {
        url_seleccionada = url_seriesMejorV;
    } else if (currentUrl.indexOf("seriesPopulares") !== -1) {
        url_seleccionada = url_seriesPopulares;
    } else if (currentUrl.indexOf("pelisPopulares") !== -1) {
        url_seleccionada = url_pelisPopulares;
    }

    window.onload = function () {
        getPelis(url_seleccionada);
    };

    function getPelis(url_seleccionada) {
        fetch(
            `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=es`
        )
            .then((res) => res.json())
            .then((data) => {
                buildHTML(data);
            });
    }

    function buildHTML(data) {
        //RECOJO EN VARIABLE CONT DE LAS CARDS
        let contenedorCards = document.getElementById("contenedorCards");
        contenedorCards.innerHTML = "";
        //CREO ROW DONDE IRAN TODAS LAS CARDS
        let row = document.createElement("div");
        row.classList.add("row");

        for (let i = 0; i < data.results.length; i++) {
            //ESPACIO DE LA CARD
            let col = document.createElement("div");
            col.classList.add("col-lg-3");
            col.classList.add("col-md-4");
            col.classList.add("col-sm-6");

            //CREO LA CARD
            let card = document.createElement("div");
            card.classList.add("card");

            //CREO CARD-BODY
            let cuerpoCard = document.createElement("div");
            cuerpoCard.classList.add("card-body");

            //AÑADIR LA IMAGEN
            let imagen = new Image();
            imagen.src =
                "https://image.tmdb.org/t/p/w500/" +
                data.results[i].poster_path;
            imagen.alt = "Cartel de la película";
            imagen.classList.add("card-img-top");


            let timeoutId;
            //AÑADIR EL EVENTO PARA MOSTRAR LA SINOPSIS AL PASAR EL RATÓN POR ENCIMA DE LA IMAGEN

            imagen.addEventListener("mouseover", () => {
                // Empieza el temporizador para mostrar la sinopsis después de 3 segundos
                timeoutId = setTimeout(() => {
                    sinopsis.style.display = "block";
                }, 500);
            });
            //AÑADIR EL EVENTO PARA OCULTAR LA SINOPSIS AL SACAR EL RATÓN DE ENCIMA DE LA IMAGEN

            imagen.addEventListener("mouseout", () => {
                // Cancela el temporizador si se sale antes de los 3 segundos
                clearTimeout(timeoutId);

                // Oculta la sinopsis
                sinopsis.style.display = "none";
            });

            //AÑADIR EL TÍTULO
            let titulo = document.createElement("h1");
            titulo.classList.add("card-title");
            titulo.innerText = data.results[i].title;

            //SINOPSIS
            let sinopsis = document.createElement("p");
            sinopsis.classList.add("card-text");
            sinopsis.innerText = data.results[i].overview;
            sinopsis.style.display = "none";

            //PUNTUACIÓN
            const puntuacion = data.results[i].vote_average.toFixed(1);
            let punt = document.createElement("div");
            punt.classList.add(getColorPuntuacion(puntuacion));
            punt.setAttribute("id", "puntuacion");
            punt.setAttribute("aria-label", "Nota: ");
            punt.innerText = puntuacion;

            cuerpoCard.appendChild(imagen);
            cuerpoCard.appendChild(punt);
            cuerpoCard.appendChild(titulo);
            cuerpoCard.appendChild(sinopsis);

            card.appendChild(cuerpoCard);

            col.appendChild(card);
            row.appendChild(col);

            cuerpoCard.addEventListener("click", verDetalles);

            function verDetalles(event) {
                let id = data.results[i].id;

                window.location.href = "/detalles?id=/" + id;
            }
        }

        contenedorCards.appendChild(row);
    }

    function getColorPuntuacion(puntuacion) {
        if (puntuacion >= 8) {
            return "green";
        } else if (puntuacion >= 5) {
            return "orange";
        } else {
            return "red";
        }
    }

    let buscador = document.getElementById("buscador");
    let form = document.getElementById("form");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        let searchTerm = buscador.value;
        if (searchTerm && searchTerm !== "") {
            let url_buscador = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&language=es&query=${searchTerm}`;
            fetch(url_buscador)
                .then((res) => res.json())
                .then((data) => {
                    buildHTML(data);

                    if (data.results.length === 0) {
                        titulo = document.getElementsByClassName("section")[0];
                        titulo.innerText =
                            "No se han encontrado resultados para : " +
                            searchTerm;
                    } else {
                        titulo.innerText =
                            "Resultados de búsqueda: " + searchTerm;

                        buscador.value = "";
                    }
                });
        } else {
            getPelis(url_seleccionada);
        }
    });
});
