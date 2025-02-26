<?php
function connect(){
    $host = "192.168.0.140";
    $user = "site";
    $password = "sitepswd";
    $database = "website";

    $connessione = new mysqli($host, $user, $password, $database);

    if ($connessione->connect_error) {
        die("<h1>Errore di connessione: " . $connessione->connect_error . "</h1>");
    }
    return $connessione;
}
?>
