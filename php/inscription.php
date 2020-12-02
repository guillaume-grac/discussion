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
                        <label id="label-style" for="confirm-password">Votre mot de passe :</label>
                        <input type="password" name="confirm-password" placeholder="Retapez votre Mot de Passe" required>
                    </section> 
                    <input type="submit" name="register" value="S'inscrire">
                </form>
                <?php

                    if (isset($_POST['register'])) {

                        $login=$_POST['login'];
                        $password=$_POST['password'];
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $confirm_password=$_POST['confirm-password'];
                        $error_log = '<section class=" alert-css text-center alert alert-danger alert-dismissible fade show">
                        <strong>Mauvais mot de passe !</strong> Les mots de passe ne sont pas identiques.</section>';      

                        if($password === $confirm_password){

                            $requete = "INSERT INTO utilisateurs (login, password) VALUES ('$login','$hash')";
                            $verification = mysqli_query($db, "SELECT login FROM utilisateurs WHERE login = '".$_POST['login']."'");

                            if(mysqli_num_rows($verification)) {
                            echo("Login \"". $_POST['login'] . "\" est déjà utilisé, veuillez en choisir un autre :-)");
                            }

                            mysqli_query($db,$requete);

                            header('Location: connexion.php');
                            exit();
                        }
                        else{
                        echo($error_log);
                        }
                    }  
                ?>
            </section>
        </section>     
    </main>
    <footer >
        <section class="text-center py-3">
            <p><b>© 2020 Copyright : Guillaume G.</b></p>
        </section>
    </footer>
</body>
</html>
