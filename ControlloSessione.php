<?php
//le 2 istruzioni seguenti terminano la sessione dopo 60 secondi
//ini_set("session.gc_maxlifetime","60");
//ini_set("session.cookie_lifetime","60");
//ricordati di cambiare il nome di accesso con l'id 

session_start();
if ($_SESSION['Login'] != "ok") {
 header("Location: Visualizza.php");
}
//Per modificare la durata di una sessione, modificare i seguenti parametri
// nel file php.ini:
//session.gc_maxlifetime=1440  (impostazione di default 24 minuti)
//session.cookie_lifetime=0  (impostazione di default. Il cookie nel client 
//durerà fino alla chiusura del browser)
?>


