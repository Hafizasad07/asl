<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controllo Paziente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" class="StyleLog">

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
        .back-button {
            background-color: #2196F3;
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
</head>
<body>
<a href="VisualizzaASl.php" style="float: right;"><img src="back.png" width="50" height="50" alt="Logout Icon"></a>

<figure>

  <img src="Sfondo2.png">
</figure>
<?php
include "Connessione.php";

$codiceFiscale = isset($_GET['codiceFiscale']) ? $_GET['codiceFiscale'] : '';

// Verifica se è stata effettuata una richiesta POST per completare il controllo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Modifica il valore del campo "positivo" nel database
    $updateSql = "UPDATE pazienti SET positivo = NOT positivo WHERE CodiceFiscale = '$codiceFiscale'";
    $updateResult = $conn->query($updateSql);

    if ($updateResult) {
        echo "Il valore di 'Positivo' è stato modificato con successo.";
    } else {
        echo "Errore nell'aggiornamento del database: " . $conn->error;
    }
}

// Query per recuperare i dati del paziente con valore "Positivo"
$selectSql = "SELECT * FROM pazienti WHERE CodiceFiscale = '$codiceFiscale'";
$result = $conn->query($selectSql);

// Verifica se la query ha restituito risultati
if ($result) {
    if ($result->num_rows > 0) {
        $paziente = $result->fetch_assoc();
        // Visualizza i dettagli del paziente
        ?>
        <div class="container">
            <h2>Controllo Paziente</h2>
            <p><strong>Nome:</strong> <?php echo $paziente['Nome']; ?></p>
            <p><strong>Cognome:</strong> <?php echo $paziente['Cognome']; ?></p>
            <p><strong>Codice Fiscale:</strong> <?php echo $paziente['CodiceFiscale']; ?></p>
            <p><strong>Data di Nascita:</strong> <?php echo date('d/m/Y', strtotime($paziente['DataNascita'])); ?></p>
            <p><strong>Indirizzo:</strong> <?php echo $paziente['Indirizzo']; ?></p>
            <p><strong>Email:</strong> <?php echo $paziente['Email']; ?></p>
            <p><strong>Telefono:</strong> <?php echo $paziente['Telefono']; ?></p>
            <p><strong>Positivo: <?php echo $paziente['positivo']; ?></p></strong>
                <?php
                // Mostra un pulsante con etichetta "Modifica" per cambiare il valore di "Positivo"
                echo "<form action='{$_SERVER['PHP_SELF']}?codiceFiscale={$codiceFiscale}' method='POST'>";
                echo "<button type='submit' class='complete-button'>Modifica</button>";
                echo "</form>";
                ?>
            </p>

            <!-- Pulsante per completare il controllo -->
            <form action="VisualizzaASL.php" method="GET">
                <button type="submit" class="back-button">Torna a Visualizza ASL</button>
            </form>
        </div>
        <?php
    } else {
        echo "Nessun paziente con il codice fiscale fornito.";
    }
} else {
    echo "Errore nella query: " . $conn->error;
}

// Chiudi la connessione al database alla fine del file
$conn->close();
?>

</body>
</html>
