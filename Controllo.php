<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controllo Paziente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" class="StyleLog">
</head>
<body>
<!-- <a href="Visualizza.php" style="float: right;"><img src="back.png" width="50" height="50" alt="Logout Icon"></a> -->
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
    <div>
    <?php
include "Connessione.php";
$codiceFiscale = isset($_GET['codiceFiscale']) ? $_GET['codiceFiscale'] : '';

// Verifica se è stata effettuata una richiesta POST per completare il controllo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aggiornamento dei valori nel database
    $esitoControllo = $_POST['Esito_Controllo'];
    $dataControllo = $_POST['data_controllo'];
    $modalitaControllo = $_POST['Modalita_controllo'];

    $updateSql = "UPDATE pazienti SET controllo = 1, Esito_Controllo = '$esitoControllo', data_controllo = '$dataControllo', Modalita_controllo = '$modalitaControllo' WHERE CodiceFiscale = '$codiceFiscale'";
    $updateResult = $conn->query($updateSql);

    if ($updateResult) {
        echo "Il controllo è stato completato con successo.";
    } else {
        echo "Errore nell'aggiornamento del database: " . $conn->error;
    }
}

// Query per recuperare i dati del paziente
$selectSql = "SELECT * FROM pazienti WHERE CodiceFiscale = '$codiceFiscale'";
$result = $conn->query($selectSql);

// Verifica se la query ha restituito risultati
if ($result) {
    if ($result->num_rows > 0) {
        $paziente = $result->fetch_assoc();
        // Visualizza i dettagli del paziente
        ?>
        <div class="container">
            <div class="controllo">
                <h2>Controllo Paziente</h2>
                <p><strong>Nome:</strong> <?php echo $paziente['Nome']; ?></p>
                <!-- Aggiunta del modulo per l'inserimento di valori -->
            
                <!-- Fine del modulo di inserimento dei valori -->
                <p><strong>Cognome:</strong> <?php echo $paziente['Cognome']; ?></p>
                <p><strong>Codice Fiscale:</strong> <?php echo $paziente['CodiceFiscale']; ?></p>
                <p><strong>Data di Nascita:</strong> <?php echo date('d/m/Y', strtotime($paziente['DataNascita'])); ?></p>
                <p><strong>Indirizzo:</strong> <?php echo $paziente['Indirizzo']; ?></p>
                <p><strong>Email:</strong> <?php echo $paziente['Email']; ?></p>
                <p><strong>Telefono:</strong> <?php echo $paziente['Telefono']; ?></p>
                <p><strong>Positivo:</strong> <?php echo $paziente['positivo']; ?></p>
                <p><strong>Controllo:</strong> <?php echo $paziente['controllo']; ?></p>

                <form action="<?php echo $_SERVER['PHP_SELF'] . '?codiceFiscale=' . $codiceFiscale; ?>" method="POST">
                    <label for="Esito_Controllo">Esito controllo:</label>
                    <input type="text" id="" name="Esito_Controllo" required><br>

                    <label for="data_controllo">Data del controllo:</label>
                    <input type="date" id="data_controllo" name="data_controllo" required><br>

                    <label for="Modalita_controllo">Modalità del controllo:</label>
                    <input type="text" id="Modalita_controllo" name="Modalita_controllo" required><br>

                    <!-- Unione dei due pulsanti -->
                    <button type="submit" class="complete-button">Fine del controllo</button>
                </form>
            </div>
        </div>
        <?php
    } else {
        echo "Nessun paziente trovato con il codice fiscale fornito.";
    }
} else {
    echo "Errore nella query: " . $conn->error;
}

// Chiudi la connessione al database alla fine del file
$conn->close();
?>
</header>

<style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
        }
        .complete-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</body>
</html>
