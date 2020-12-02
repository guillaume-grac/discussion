<?php
    session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location: connexion.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Polar Chat | Profil</title>
    <link rel="stylesheet" href="../css/profil.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
<header>
        <nav class="mb-1 navbar navbar-expand-lg lighten-1">
            <a class="navbar-brand" href="../index.php"><b>POLAR CHAT</b></a>
            <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav">
                <?php if (isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link">| Bonjour <i class="fas fa-hiking"></i> ' . $_SESSION['login'] . '</a></li>';}?>
                    <li class="nav-item"><a class="nav-link" href="../index.php">| <i class="fas fa-igloo"></i> Accueil</a></li>
                    <?php if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href="connexion.php">| <i class="fab fa-connectdevelop"></i> Connexion </a></li>';}?>
                    <?php if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href="inscription.php">| <i class="far fa-plus-square"></i> Inscription </a></li>';}?>
                    <li class="nav-item"><a class="nav-link" href="discussion.php">| <i class="fas fa-users"></i> Discussion</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['login'])){ echo '<li><form method="POST" action="profil.php"><button type="submit" class="btn btn-info" name="logout" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></button></form></li>';}?>
                </ul>
            </section>
        </nav>
    </header>
    <main>
        <?php 

            $db = mysqli_connect('localhost', 'root', '', 'discussion');
            if (isset($_SESSION['login'])){ 
                if(isset($_POST['update'])){
                    if(isset($_POST['Nlogin']) && $_POST['Npassword'] === $_POST['NCpassword']){

                        
                        $login=$_POST['Nlogin'];
                        $password=$_POST['Npassword'];
                        $confirmpassword=$_POST['NCpassword'];
                        $id=$_SESSION['id'];
                        
                        $hash = password_hash($password, PASSWORD_DEFAULT);


                        $update = mysqli_query($db, "UPDATE utilisateurs SET login = '$login', password = '$hash' WHERE id = $id");

                        $_SESSION['login']=$login;
                        $_SESSION['password']=$password;
                        $_SESSION['id']=$id;
                        $modif = '<p class="alert alert-success text-center" role="alert"><b>Modification réussie</b></p>';

                        if($update){
                            echo $modif;
                        }
                    }

                    if($_POST['Npassword'] != $_POST['NCpassword']){
                        echo '<p class="alert alert-danger text-center" role="alert"><b>Echec</b> Mauvais mot de passe</p>';
                    }
                }
            }
            if (isset($_SESSION['login'])){ 
                echo 
                '<section class="container-fluid">
                <section class="loginBox">
                    <h1>Vous pouvez modifier votre profil :</h1>
                    <form method="post">
                        <section class="inputBox">
                            <label id="label-style" for="Nlogin">Entrez votre nouveau login :</label>
                            <input type="text" name="Nlogin" value="'.$_SESSION['login'].'" required>
                        </section>
                        <section class="inputBox">
                        <label id="label-style" for="Npassword">Entrez votre nouveau mot de passe :</label>
                            <input type="password" name="Npassword" placeholder="Votre nouveau Mot de Passe" required>
                        </section>
                        <section class="inputBox">
                        <label id="label-style" for="NCpassword">Retapez votre nouveau login :</label>
                            <input type="password" name="NCpassword" placeholder="Retapez votre nouveau Mot de Passe" required>
                        </section>
                        <input type="submit" name="update" value="C\'est parti !">
                    </form>
                </section>
            </section>';
            }
            else{
                echo '<section class="alert alert-danger text-center" role="alert">Vous devez être connecté pour voir votre Profil : <a href="connexion.php" class="alert-link">Se connecter</a>.<img class="seal" src="../images/seal.gif" alt="Seal"></section>';
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
