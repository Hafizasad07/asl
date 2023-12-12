<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Paziente</title>
    <a href="VisualizzaAsl.php" style="float: right;"><img src="back.png" width="50" height="50" alt="Logout Icon"></a>

    
</head>
<body>

<?php
include "Connessione.php";

if (isset($_GET['CodiceFiscale'])) {
    $CodiceFiscale = $_GET['CodiceFiscale'];

    $query = "SELECT * FROM pazienti WHERE CodiceFiscale = '$CodiceFiscale'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $utente = $result->fetch_assoc();
        // I dati dell'utente sono ora presenti nella variabile $utente
    } else {
        // Utente non trovato, gestisci l'errore o reindirizza come necessario
        echo "Utente non trovato.";
        exit(); // Termina lo script se l'utente non è trovato
    }
} else {
    echo "Parametro 'CodiceFiscale' mancante.";
    exit(); // Termina lo script se il parametro è mancante
}
// Verifica se il modulo di modifica è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processa il modulo di modifica
    $Nome = $_POST['Nome'];
    $Cognome = $_POST['Cognome'];
    $DataNascita = $_POST['DataNascita'];
    $Indirizzo = $_POST['Indirizzo'];
    $Email = $_POST['Email'];

    // Imposta il valore del positivo
    $positivo = isset($_POST['positivo']) ? 1 : 0;

    // Esegui l'aggiornamento nel database
    $updateQuery = "UPDATE pazienti SET 
                    Nome = '$Nome', 
                    Cognome = '$Cognome', 
                    DataNascita = '$DataNascita', 
                    Indirizzo = '$Indirizzo', 
                    Email = '$Email',
                    positivo = '$positivo'
                    WHERE CodiceFiscale = '$CodiceFiscale'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Modifica avvenuta con successo!";
    } else {
        echo "Errore nella modifica: " . $conn->error;
    }
}

?>

<!-- Form di modifica --><!-- Form di modifica -->
<form action="" method="POST">
    <label for="Nome">Nome:</label>
    <input type="text" name="Nome" value="<?php echo $utente['Nome']; ?>" required>

    <label for="Cognome">Cognome:</label>
    <input type="text" name="Cognome" value="<?php echo $utente['Cognome']; ?>" required>

    <label for="DataNascita">Data di nascita :</label>
    <input type="date" name="DataNascita" value="<?php echo $utente['DataNascita']; ?>" required>

    <label for="Indirizzo">Indirizzo:</label>
    <input type="text" name="Indirizzo" value="<?php echo $utente['Indirizzo']; ?>" required>

    <label for="Email">e-mail:</label>
    <input type="email" name="Email" value="<?php echo $utente['Email']; ?>" required>

    <!-- Aggiungi il checkbox per il valore del positivo -->
    <label for="positivo">positivo:</label>
    <input type="checkbox" name="positivo" value="1" <?php echo ($utente['positivo'] == 1) ? 'checked' : ''; ?>>

    <input type="submit" value="Salva Modifiche">
</form>
<?php 
$conn->close();
?>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type=text], input[type=date], input[type=email] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
</body>
</html>
