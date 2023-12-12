<?php
// Connessione al database
include "Connessione.php";

// Inizializza le variabili
$Nome = $Cognome = $CodiceFiscale = $DataNascita = $Indirizzo = $Email = $Telefono = $positivo = $controllo = $PasswordHash = "";

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $Nome = $_POST['Nome'];
    $Cognome = $_POST['Cognome'];
    $CodiceFiscale = $_POST['CodiceFiscale'];
    $DataNascita = $_POST['DataNascita'];
    $Indirizzo = $_POST['Indirizzo'];
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];
    $positivo = isset($_POST['positivo']) ? 1 : 0;  // Verifica se la checkbox è selezionata
    $controllo = isset($_POST['controllo']) ? 1 : 0;  // Verifica se la checkbox è selezionata

    
    // Prepara l'inserimento nel database
    $sql = "INSERT INTO pazienti (Nome, Cognome, CodiceFiscale, DataNascita, Indirizzo, Email, Telefono, positivo, controllo) 
            VALUES ('$Nome', '$Cognome', '$CodiceFiscale', '$DataNascita', '$Indirizzo', '$Email', '$Telefono', '$positivo', '$controllo')";

    // Esegui l'inserimento
    if (mysqli_query($conn, $sql)) {
        echo "Paziente inserito correttamente";
    } else {
        echo "Errore durante l'inserimento del paziente: " . mysqli_error($conn);
    }

    // Chiudi la connessione
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Paziente</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" class="StyleLog">
</head>
<body>
<header>
    <div class="mainheader">
        <div class="logo">
            <img src="SafeTrace.png">
        </div>
        <nav>
            <a href="@">Home</a>
            <a href="@">Contatti</a>
            <a href="login.php">cerca</a>
        </nav>
        <div class="menubtn">
            <a href="Login.php"> 
                <div class="UserLog"><img src="user.png" width="50" height="50">
            </a>
        </div>
    </div>
    </div>
    <main>
        <div class="container pt-3">
            <div class="aggiungi-page">
                <h2 class="heading">Inserisci Dati</h2>
                <div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="aggiungi-form">
                        <div class="row mx-auto w-100">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="pb-4">
                                    <label for="Nome">Nome</label> <br>
                                    <input type="text" id="Nome" name="Nome" required>
                                </div>
                                <div class="pb-4">
                                    <label for="CodiceFiscale">Codice Fiscale</label><br>
                                    <input type="text" id="CodiceFiscale" name="CodiceFiscale" required>
                                </div>
                                <div class="pb-4">
                                    <label for="Email">Email</label><br>
                                    <input type="email" id="Email" name="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="pb-4">
                                    <label for="Cognome">Cognome</label><br>
                                    <input type="text" id="Cognome" name="Cognome" required>
                                </div>
                                <div class="pb-4">
                                    <label for="DataNascita">Data di Nascita</label><br>
                                    <input type="date" id="DataNascita" name="DataNascita" required>
                                </div>
                                <div class="pb-4">
                                    <label for="Telefono">Telefono</label><br>
                                    <input type="tel" id="Telefono" name="Telefono" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="positivo">il paziente e' Positivo?</label><br>
                            <!-- <input type="checkbox" id="positivo" name="positivo" value="1"> -->
                            <div class="aggiungi-button text-center">
                                <input type="button" class="btn" id="positivo" name="positivo" value="SI">
                                <input type="button" class="btn" id="positivo" name="positivo" value="NO">
                            </div>
                            <div class="submit-btn text-center pt-4">
                                <button type="submit" class="text-uppercase">aggiungi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</header>
<style>
    input::placeholder{
        color: #000 !important;
    }

    input{
        width: 100%;
        height: 35px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
