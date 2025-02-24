<?php

declare(strict_types=1); // Habilitar el modo estricto de tipos

function render_template(string $template, array $data = [])
{
    extract($data);
    require "templates/$template.php";
}
