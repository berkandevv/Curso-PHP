<?php

declare(strict_types=1);

class NextMovie
{
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview
    ) {}

    public function get_until_message(): string
    {
        $days = $this->days_until;

        return match (true) {
            $days == 0  => "¡Hoy se estrena!",
            $days == 1  => "Mañana se estena!",
            $days < 7   => "Esta semana se estrena!",
            default     => "$days días hasta el estreno!"
        };
    }

    public static function fetch_create_movie(string $api_url): NextMovie
    {
        $result = file_get_contents($api_url); // Si solo queremos hacer un GET de una API

        // Comprobar si hubo errores en la ejecución de cURL
        if ($result == false) {
            echo "Error en la solicitud ";
            exit;
        }

        // Decoficiar la respuesta JSON
        $data = json_decode($result, true);

        if (empty($data) || !isset($data["title"], $data["poster_url"], $data["release_date"], $data["days_until"], $data["following_production"]["title"])) {
            echo "Error: los datos de la API no se pudieron obetener!";
            exit;
        }

        return new self(
            $data["title"],
            $data["days_until"],
            $data["following_production"]["title"] ?? "Desconocido", // Si no hay próxima película, saldrá "Desconocido"
            $data["release_date"],
            $data["poster_url"],
            $data["overview"]
        );
    }

    public function get_data()
    {
        return get_object_vars($this);
    }
}
