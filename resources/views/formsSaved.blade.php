<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Películas Recomendadas</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Anek Gurmukhi:wght@400;600;800&display=swap"
    />
    <style>
        body {
            background-color: #121212;
            color: #FFFFFF;
            font-family: "Anek Gurmukhi";
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00c030;
            color: #FFFFFF;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #009020;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccddee;

        }

        th {
            background-color: #ccddee;
            color: #121212;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Películas Recomendadas</h1>
        <a href="{{ url()->previous() }}" class="back-button">Atrás</a>


        <table>
            <thead>
                <tr>
                    <th>Nombre Película</th>
                    <th>Foto Película</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->nombre_pelicula }}</td>
                        <td><img src="{{ $form->foto_pelicula }}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
