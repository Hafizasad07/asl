<?php 
include "Connessione.php";
// Start the session
//ricordati di cambiare il ID di accesso con l'id 

?>

<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>index</title>
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="UserLog text-center pb-2"><img src="user.png" width="50" height="50"></div>
                        <h2 class="card-title text-center">Login</h2>
                        <form id="form1" action="ControlloUtente.php" method="post" onsubmit="return validazione()">
                            <div class="form-group">
                                <label for="ID">ID</label>
                                <input type="text" class="form-control" name="ID" id="ID" placeholder="Inserisci l' ID Utente" required>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="Password" class="form-control" name="Password" id="Password" placeholder="Inserisci la Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <br><br><br>
                        <a href="New_User.php">Registrati</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</main>
</header> 
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>