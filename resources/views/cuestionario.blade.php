@extends('layouts.cuestionarioTpl')
<body>
    <div class="home">
        <div class="home-inner">
            <div class="frame-wrapper">
                <div class="mm-parent">
                    <div class="mm"><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>

                    </div>
                    <button class="image-3-wrapper">
                        <img class="image-3-icon" alt="" src="https://i.postimg.cc/J0wfG2Vg/icons8-men-30.png" />
                    </button>
                </div>
            </div>
        </div>
    <form id="movie-form">
        <label for="sentimiento">¿Cómo te sientes hoy?</label>
        <div class="multiselect">
            <div class="selectBox" onclick="showCheckboxes()">
                <select id="sentimiento" >
                    <option>Seleccionar emociones</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="checkboxes">
                <label for="checkbox1">
                    <input type="checkbox" id="checkbox1" name="sentimiento" value="estresado" />Estresad@ / ansios@
                </label>
                <label for="checkbox2">
                    <input type="checkbox" id="checkbox2" name="sentimiento" value="triste" />Triste / melancólic@
                </label>
                <label for="checkbox3">
                    <input type="checkbox" id="checkbox3" name="sentimiento" value="feliz" />Feliz / animad@
                </label>
                <label for="checkbox4">
                    <input type="checkbox" id="checkbox4" name="sentimiento" value="cansado" />Aburrid@ / indiferente
                </label>
                <label for="checkbox5">
                    <input type="checkbox" id="checkbox5" name="sentimiento" value="emocionado" />Emocionad@ / aventurero
                </label>
            </div>

            <br /><br />

            <label for="apta-para-todo-publico">¿Prefieres una película que sea apta para todo público?</label>
            <select id="apta-para-todo-publico" name="apta-para-todo-publico">
                <option value="si">Sí</option>
                <option value="no">No</option>
                <option value="indiferente">Indiferente</option>
            </select>

            <br /><br />

            <label for="duracion">¿Tienes preferencia por la duración de una película?</label>
            <select id="duracion" name="duracion">
                <option value="corta">Corta (menos de 90 minutos)</option>
                <option value="larga">Larga (más de 120 minutos)</option>
                <option value="indiferente">Indiferente</option>
            </select>

            <br /><br />

            <label for="maraton">¿Te gustaría hacer un maratón de películas?</label>
            <select id="maraton" name="maraton">
                <option value="si">Sí</option>
                <option value="no">No</option>
            </select>
        </div>

        <br /><br />

        <button type="submit" id="search-button">Buscar películas</button>
    </form>

    <style>
        .multiselect {
            width: 200px;
        }

        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
            font-weight: bold;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
            border: 1px #dadada solid;
            max-height: 150px;
            overflow-y: scroll;
        }

        #checkboxes label {
            display: block;
        }

        #checkboxes label:hover {
            background-color: #1e90ff;
        }
    </style>

    <div id="cargando" class="oculto" style="display: none;">
        <img src="https://media.tenor.com/joLYNfFQGDgAAAAC/loading.gif" alt="Cargando...">
    </div>
    <ul id="lista-resultados"></ul>

</body>
<script src="{{ asset('js/cuestionario.js') }}"></script>

</html>
