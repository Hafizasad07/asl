<?php
// Start the session
session_start();
include "Connessione.php";


$host = "localhost";
$username = "root";
$db_ID = "asl";

// Connessione al database
$connessione = new mysqli($host, $username, '', $db_ID);
if ($connessione->connect_error) {
    echo "Connessione fallita: " . $connessione->connect_error . ".";
    exit();
}


if (isset($_POST['ID']) && isset($_POST['Password'])) {

    $ID = mysqli_real_escape_string($connessione, strip_tags(substr($_POST['ID'], 0, 32)));
    $Password = mysqli_real_escape_string($connessione, strip_tags(substr($_POST['Password'], 0, 32)));

    echo "ID: " . $ID . "<br>";
    echo "Password: " . $Password . "<br>";

    // Query per utenti generici
    $queryUtente = "SELECT * FROM centralinista WHERE ID='$ID' AND Password='$Password';";
    $risultatoUtente = $connessione->query($queryUtente);

    // Query per funzionari di poliziaPassword
    $queryFunzPolizia = "SELECT * FROM funzionariopolizia WHERE ID='$ID' AND Password='$Password';";
    $risultatoFunzPolizia = $connessione->query($queryFunzPolizia);

    // Query per funzionari asl
    $queryFunzasl = "SELECT * FROM asl WHERE ID='$ID' AND Password='$Password';";
    $risultatoFunzasl = $connessione->query($queryFunzasl);

    if ($risultatoUtente->num_rows > 0) {
        $riga = $risultatoUtente->fetch_array(MYSQLI_ASSOC);
        // Utente generico
        $_SESSION['ruolo'] = 'centralinista';
        $_SESSION['login'] = "ok";
        $_SESSION['ID'] = $ID;
        $_SESSION['Password'] = $riga['Password'];
        header("Location:  /ASL/VisualizzaCen.php");
    } elseif ($risultatoFunzPolizia->num_rows > 0) {
        $riga = $risultatoFunzPolizia->fetch_array(MYSQLI_ASSOC);
        // Funzionario di polizia
        $_SESSION['ruolo'] = 'Polizia';
        $_SESSION['login'] = "ok";
        $_SESSION['ID'] = $ID;
        $_SESSION['Password'] = $riga['Password'];
        header("Location: /ASL/Visualizza.php");
    } elseif ($risultatoFunzasl->num_rows > 0) {
        $riga = $risultatoFunzasl->fetch_array(MYSQLI_ASSOC);
        // Funzionario asl
        $_SESSION['ruolo'] = 'asl';
        $_SESSION['login'] = "ok";
        $_SESSION['ID'] = $ID;
        $_SESSION['Password'] = $riga['Password'];
        header("Location: /ASL/VisualizzaASL.php");
    } else {
        // Nessun utente trovato, mostra un messaggio di errore
        echo '<script>alert("L\'utente inserito non esiste o la password è sbagliata."); window.location.href = "Homepage.php";</script>';
        
        
    }
}

// Chiusura della connessione
$connessione->close();
?>
