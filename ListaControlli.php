<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Controlli</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" class="StyleLog">
</head>
<body>
<!-- <a href="Visualizza.php" style="float: left;"><img src="back.png" width="50" height="50" alt="Logout Icon"></a> -->
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
    <div class="container visual-heading"><strong>soggetti controllati</strong></div>
    <main>
    <?php
// Connessione al database (Assicurati di inserire le tue credenziali)
include "Connessione.php";

// Query per recuperare i dati dei pazienti con controllo completato
$selectSql = "SELECT Nome, Cognome, CodiceFiscale, Esito_Controllo, data_Controllo, Modalita_Controllo FROM pazienti WHERE controllo = 1";
$result = $conn->query($selectSql);

// Verifica se la query ha restituito risultati
if ($result) {
    ?>
    <!-- Tabella Controlli -->
    <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Codice Fiscale</th>
            <th>Esito Controllo</th>
            <th>Data Controllo</th>
            <th>Modalità Controllo</th>
        </tr>
        <?php
        // Loop attraverso i risultati della query
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Nome']}</td>
                    <td>{$row['Cognome']}</td>
                    <td>{$row['CodiceFiscale']}</td>
                    <td>{$row['Esito_Controllo']}</td>
                    <td>{$row['data_Controllo']}</td>
                    <td>{$row['Modalita_Controllo']}</td>
                  </tr>";
        }
        ?>
    </table>
    <?php
} else {
    echo "Errore nella query: " . $conn->error;
}

// Chiudi la connessione al database alla fine del file
$conn->close();
?>
    </main>
</header>

<style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        .visual-heading{
            padding-left: 100px;
            font-weight: 500;
            font-size: 18px;
            text-transform: uppercase;
            padding-top: 50px;
            padding-bottom: 30px;
        }
</style>
</body>
</html>
