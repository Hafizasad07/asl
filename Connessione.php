<?php
//ricordati di cambiare il nome di accesso con l'id 


 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = ""; 
 $db = "asl";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

 //Il Problema era la password, deve restare aperta

 return $conn;
 

 $conn -> close();
 
   
?>