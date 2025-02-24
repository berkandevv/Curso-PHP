<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <main>
        <section>
            <h1>La próxima película de Marvel</h1>
            <img src="<?= $data["poster_url"] ?>" alt="Póster de <?= htmlspecialchars($data["title"]) ?>" />
        </section>

        <section>
            <h2><?= htmlspecialchars($data["title"]) ?> - <?= $until_message ?></h2>
            <p>Fecha de estreno: <?= htmlspecialchars($data["release_date"]) ?></p>
            <p>La siguiente película es: <?= htmlspecialchars($following_production) ?></p>
            <a href="https://www.marvel.com" class="boton" target="_blank">Descubre más sobre Marvel</a>
        </section>
    </main>
</body>

</html>