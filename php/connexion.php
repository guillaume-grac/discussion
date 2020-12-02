<?php
    $db = mysqli_connect('localhost', 'root', '', 'discussion');

    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Polar Chat | Connexion</title>
    <link rel="stylesheet" href="../css/connexion.css">
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
                    <li class="nav-item"><a class="nav-link" href="inscription.php">| <i class="far fa-plus-square"></i> Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="profil.php">| <i class="far fa-address-card"></i> Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="discussion.php">| <i class="fas fa-users"></i> Discussion</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    
                </ul>
            </section>
        </nav>
    </header>
    <main>
        <?php   
            if (isset($_POST['connexion'])){
                $identifiant = ($_POST['login']);
                $password = ($_POST['password']);
                
                $error_log = '<section class="alert alert-danger text-center" role="alert"><b>Veuillez réessayer !</b> Mot de passe incorrect.</section>';
        
                $verification = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '".$_POST['login']."'");

                $var = mysqli_fetch_assoc($verification);
                       
                if(mysqli_num_rows($verification) == 1){

                    $verification2 = mysqli_query($db, "SELECT password FROM `utilisateurs` WHERE login=\"$identifiant\"");

                    $row = mysqli_fetch_array($verification2);

                    $hash = $row['password'];
                    
                    if(password_verify($password, $hash)){
                        $_SESSION['login'] = $var['login'];
                        $_SESSION['password'] = $var['password'];
                        $_SESSION['id'] = $var['id'];

                        $_SESSION['login'] = $identifiant;
                        $_SESSION['password'] = $password;
                        header('Location: ../index.php');
                    }
                    else{       
                        echo $error_log;
                    }
                }
                else{
                    $error_log2 = '<section class="alert alert-danger text-center" role="alert"><b>Veuillez réessayer !</b> Login ou mot de passe incorrect ou innexistant.</section>';
                    echo $error_log2;
                }
            }
        ?>
        <section class="container-fluid">
            <section class="loginBox">
                <h1>Connexion</h1>
                <form method="post" action="connexion.php">
                    <section class="inputBox">
                        <label id="label-style" for="login">Votre Login :</label>
                        <input type="text" name="login" placeholder="Votre login" required>
                    </section>
                    <section class="inputBox">
                        <label id="label-style" for="password">Votre mot de passe :</label>
                        <input type="password" name="password" placeholder="Votre Mot de Passe" required>
                    </section>
                    <input type="submit" name="connexion" value="C'est parti !">
                </form>
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
