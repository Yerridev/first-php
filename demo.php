<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Incizalizar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);

//Indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/** Ejecutar la peticio
 * y guardamos el resutaldo
 */
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>


<head>
    <meta charset="utf-8">
    <title>Marvel php</title>
    <meta name="description" content="Proxima pelicula de Marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
</head>


<main>


    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"]; ?> días.</h3>
        <p>Fecha de extreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>

    </hgroup>


    <section>
        <img src="<?= $data["poster_url"]?>" width="350" alt="Porter de <?= $data["title"]?>" style="border-radius: 16px">
    </section>

</main>



<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    hgroup {
        text-align: center;
    }

</style>
