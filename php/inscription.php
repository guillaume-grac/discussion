<?php
    $db = mysqli_connect ('localhost', 'root', '', 'discussion'); 

    $nbr_ligne = mysqli_num_rows(mysqli_query($db,"SELECT * FROM utilisateurs"));

    if($nbr_ligne == 0){
        mysqli_query($db,"ALTER TABLE utilisateurs AUTO_INCREMENT = 1");
    }
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Polar Chat | Inscription</title>
    <link rel="stylesheet" href="../css/inscription.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="mb-1 navbar navbar-expand-lg lighten-1">
            <a class="navbar-brand" href="../index.php"><b>POLAR CHAT</b></a>
            <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../index.php">| <i class="fas fa-igloo"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="connexion.php">| <i class="fab fa-connectdevelop"></i> Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="profil.php">| <i class="far fa-address-card"></i> Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="discussion.php">| <i class="fas fa-users"></i> Discussion</a></li>
                </ul>
                <ul class="navbar-nav ml-auto ">
                   
                </ul>
            </section>
        </nav>
    </header>
    <main>
        <section class="container-fluid">
            <section class="loginBox">
                <h1>Inscription</h1>
                <form method="post" action="inscription.php">
                    <section class="inputBox">
                        <label id="label-style" for="login">Votre Login :</label>
                        <input type="text" name="login" placeholder="Votre login" required>
                    </section>
                    <section class="inputBox">
                        <label id="label-style" for="password">Votre mot de passe :</label>
                        <input type="password" name="password" placeholder="Votre Mot de Passe" required>
                    </section>
                    <section class="inputBox">
                        <label id="label-style" for="confirm-password">Retapez votre mot de passe :</label>
                        <input type="password" name="confirm-password" placeholder="Retapez votre Mot de Passe" required>
                    </section> 
                    <button type="submit" name="register" class="bouton btn btn-dark">S'inscrire <i class="fas fa-user-plus"></i></button>
                </form>
            </section>
        </section>
        <?php

            if (isset($_POST['register'])) {

                $login= mysqli_real_escape_string($db,htmlspecialchars(trim($_POST['login'])));
                $password= mysqli_real_escape_string($db,htmlspecialchars(trim($_POST['password'])));
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $confirm_password= mysqli_real_escape_string($db,htmlspecialchars(trim($_POST['confirm-password'])));
                $error_log = '<section class="alert alert-danger text-center alert-dismissible fade show">
                <strong>Echec</strong> Mauvais mot de passe ou Login déjà utilisé !</section>';
                $verification = mysqli_query($db, "SELECT login FROM utilisateurs WHERE login = '".$_POST['login']."'");
                
                if(mysqli_num_rows($verification)== $_POST['login']) {

                    if($password === $confirm_password){

                        $requete = "INSERT INTO utilisateurs (login, password) VALUES ('$login','$hash')";

                        mysqli_query($db,$requete);

                        header('Location: connexion.php');
                        exit();
                    }
                    else{
                    echo($error_log);
                    }
                }
                else{
                    echo($error_log);
                }
            }  
        ?>    
    </main>
    <footer >
        <section class="text-center py-3">
            <p><b>© 2020 Copyright : Guillaume G.</b></p>
        </section>
    </footer>
</body>
</html>
