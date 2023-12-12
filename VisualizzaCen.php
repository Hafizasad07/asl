<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella Pazienti</title>
    <link rel="stylesheet" href="css/style.css" class="StyleLog">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
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
            cursor: pointer;
        }

        input[type=text] {
            padding: 8px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        .edit-button {
            background-color: transparent;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
        }

        .edit-button[style*="red"] {
            background-color: #FF0000;
        }

        .edit-button[style*="green"] {
            background-color: #00FF00;
        }

        .edit-form {
            display: none;
        }

        /* Aggiunta di una media query per la responsività */
        @media only screen and (max-width: 600px) {
            table {
                font-size: 12px; /* Riduci la dimensione del testo per adattarti a schermi più piccoli */
            }

            th, td {
                padding: 8px; /* Riduci lo spazio intorno ai contenuti delle celle */
            }
        }
    </style>
</head>
<body>

<?php
// Connessione al database (Assicurati di inserire le tue credenziali)
include "Connessione.php";

// Funzione per eseguire la query e restituire i risultati ordinati
function searchPazienti($conn, $searchTerm, $sortColumn, $sortDirection) {
    $sql = "SELECT * FROM pazienti WHERE 
            Nome LIKE '%$searchTerm%' OR 
            Cognome LIKE '%$searchTerm%' OR 
            CodiceFiscale LIKE '%$searchTerm%'
            ORDER BY $sortColumn $sortDirection";
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'Nome';
$sortDirection = isset($_GET['dir']) ? $_GET['dir'] : 'ASC';

$pazienti = searchPazienti($conn, $searchTerm, $sortColumn, $sortDirection);
?>

<!-- Barra di ricerca -->
<form action="" method="GET">
    <input type="text" name="search" placeholder="Cerca per Nome, Cognome, Codice Fiscale" value="<?php echo $searchTerm; ?>">
    <input type="submit" value="Cerca">
</form>
<a href="login.php"><img src="home-page.png" alt="Descrizione dell'immagine" style="max-width: 40px;"></a>
<a href="Aggiungi.php"><img src="add.png" alt="Descrizione dell'immagine" style="max-width: 40px;"></a>

<!-- Tabella Pazienti -->
<table>
<tr>
        <th onclick="sortTable('Nome')">Nome</th>
        <th onclick="sortTable('Cognome')">Cognome</th>
        <th onclick="sortTable('CodiceFiscale')">Codice Fiscale</th>
        <th>Data di Nascita</th>
        <th>Indirizzo</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>positivo</th>
        <th>controllo</th>
       

    </tr>
    <?php
    foreach ($pazienti as $paziente) {
        
        $linkControlloPositivi = 'ControlloASL.php?CodiceFiscale=' . $paziente['CodiceFiscale'];
        $positivoText = $paziente['positivo'] == 1 ? 'positivo' : 'non positivo';
        $buttonColorPositivo = $paziente['positivo'] == 1 ? 'red' : 'green';
        $buttonColorControllo = $paziente['controllo'] == 0 ? 'red' : 'green';
        $controlloText = $paziente['controllo'] == 1 ? 'controllato' : 'da controllare';

        echo "<tr>
        <td>{$paziente['Nome']}</td>
        <td>{$paziente['Cognome']}</td>
        <td>{$paziente['CodiceFiscale']}</td>
        <td>{$paziente['DataNascita']}</td>
        <td>{$paziente['Indirizzo']}</td>
        <td>{$paziente['Email']}</td>
        <td>{$paziente['Telefono']}</td>
       
        <td>
            <a href='$linkControlloPositivi'>
                <button class='edit-button' style='background-color: $buttonColorPositivo;' onclick='showAlert()'>{$positivoText}</button>
            </a>
        </td>
    
        <td>
            <button class='edit-button' style='background-color: $buttonColorControllo;' onclick='showAlert()'>{$controlloText}</button>
        </td>
        
      </tr>";
    }
    ?>
</table>
<script>
    function showAlert() {
        alert('Questo è un messaggio di esempio. Puoi personalizzarlo con la logica desiderata.');
    }
</script>


<!-- Script JavaScript per ordinare e gestire la modifica -->
<script>
    function sortTable(columnName) {
        var urlParams = new URLSearchParams(window.location.search);
        var currentSortColumn = urlParams.get('sort');
        var currentSortDirection = urlParams.get('dir');

        var newSortDirection = 'ASC';

        if (currentSortColumn === columnName) {
            newSortDirection = currentSortDirection === 'ASC' ? 'DESC' : 'ASC';
        }

        window.location.href = window.location.pathname + '?sort=' + columnName + '&dir=' + newSortDirection + '&search=' + urlParams.get('search');
    }

    // Funzione per aprire il modulo di modifica
    function openEditForm(codiceFiscale) {
        // Recupera i dati del paziente per pre-compilare il modulo di modifica
        // Aggiungi qui la logica per recuperare i dati dal server, se necessario
        document.getElementById("editForm").style.display = "block";
    }

    // Funzione per mostrare l'alert
    function showAlert() {
        alert("Non hai i permessi per fare questa azione");
    }
</script>

</body>
</html>

<?php
// Chiudi la connessione al database alla fine del file
$conn->close();
?>
