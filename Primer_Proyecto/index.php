<?php

// Incluir archivos necesarios con constantes y funciones
require_once "consts.php";
require_once "functions.php";
require_once "classes/NextMovie.php";

$next_movie = NextMovie::fetch_create_movie(API_URL);
$next_movie_data = $next_movie->get_data();

// Renderizar la plantilla "estructura" pasando los datos obtenidos y el mensaje generado
render_template("estructura", array_merge(
    $next_movie_data, // Datos obtenidos desde la API
    ["until_message" => $next_movie->get_until_message()] // Agregar mensaje de días restantes
));
