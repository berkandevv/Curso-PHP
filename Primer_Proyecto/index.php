<?php

const  API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una nueva sesión de de cURL; ch = cURL handle
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostarla por pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ejecutas la petición y guardar el resultado
$result = curl_exec($ch);

// Comprobar si hubo errores en la ejecución de cURL
if (curl_errno($ch)) {
    echo "Error en la solicitud " . curl_error($ch);
    exit;
}

// Decoficiar la respuesta JSON
$data = json_decode($result, true);

if (empty($data) || !isset($data["title"], $data["poster_url"], $data["release_date"], $data["days_until"], $data["following_production"]["title"])) {
    echo "Error: los datos de la API no se pudieron obetener!";
    exit;
}

// Cerrar cURL
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <main>
        <section>
            <h1>La próxima película de Marvel</h1>
            <img src="<?= $data["poster_url"]; ?>" alt="Póster de <?= htmlspecialchars($data["title"]); ?>" />
        </section>

        <section>
            <h2><?= htmlspecialchars($data["title"]); ?> se estrena en <?= $data["days_until"]; ?> días</h2>
            <p>Fecha de estreno: <?= htmlspecialchars($data["release_date"]); ?></p>
            <p>La siguiente película es: <?= htmlspecialchars($data["following_production"]["title"]); ?></p>
            <a href="https://www.marvel.com" class="boton" target="_blank">Descubre más sobre Marvel</a>
        </section>
    </main>
</body>

</html>