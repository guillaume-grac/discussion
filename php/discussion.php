<?php

    session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location: connexion.php');
        exit();
    }
    
    $db = mysqli_connect ('localhost', 'root', '', 'discussion'); 

    $nbr_ligne = mysqli_num_rows(mysqli_query($db,"SELECT * FROM messages"));

    if($nbr_ligne == 0){
        mysqli_query($db,"ALTER TABLE messages AUTO_INCREMENT = 1");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Polar Chat | Discussion</title>
    <link rel="stylesheet" href="../css/discussion.css">
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
                    <li class="nav-item"><a class="nav-link" href="profil.php">| <i class="fas fa-users"></i> Pofil</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['login'])){ echo '<li><form method="POST" action="discussion.php"><button type="submit" class="btn btn-info" name="logout" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></button></form></li>';}?>
                </ul>
            </section>
        </nav>
    </header>
    <main>
        <section class="chat-scroll scrollbar-dusty-grass">
            <?php 
                if (isset($_SESSION['login'])){ 
                    date_default_timezone_set('UTC');

                    $check_chats = mysqli_query($db,"SELECT m.message, u.login, m.date FROM utilisateurs AS u INNER JOIN messages AS m WHERE m.id_utilisateur = u.id ORDER BY m.message ASC");

                    while($chats_list = mysqli_fetch_assoc($check_chats)){
                        echo 
                        "<table>
                            <tr>
                                <td>Posté le<b> " . htmlspecialchars($chats_list['date']) . " </b>par <i><b><span class='nom-com'>" . htmlspecialchars($chats_list['login']) . "</b></i></td>
                            </tr><br />
                            <tr>
                                <td>" . htmlspecialchars($chats_list['message']) . "</td>
                            </tr>
                        </table>";
                    }
                }
                else{
                    echo '<img class="seal" src="../images/seal.gif" alt="Seal">';
                }
            ?>
        </section>
        <section class="chat">
            <?php
                if (isset($_SESSION['login'])){ 
                    echo 
                    '<section>
                        <form method="post" action="discussion.php"> 
                            <section class="form-group">
                                <textarea maxlenght="150" class="form-control" name="chat" rows="3">Discutez ici. (150 caractères max.)</textarea> 
                            </section>
                            <button type="submit" name="envoyer" class="bouton btn btn-dark">Envoyer <i class="fas fa-paper-plane"></i></button>
                        </form>
                    </section>';
                }       
                
                else{
                    echo '<section class=" alert alert-danger text-center" role="alert">Vous devez être connecté pour discuter sur le Polar Chat : <a href="connexion.php" class="alert-link">Se connecter</a>.</section>';
                }

                date_default_timezone_set('UTC');

                if (isset($_POST['envoyer'])){
                    $chats = mysqli_real_escape_string($db,htmlspecialchars(trim($_POST['chat'], ENT_QUOTES)));
                    $id_user = $_SESSION['id'];
                    $date_chat = date("Y-m-j H:i:s");
                    $create_chat = mysqli_query($db,"INSERT INTO messages(message, id_utilisateur, date) VALUES ('" . $chats . "', '" . $id_user . "', '" . $date_chat . "')");

                    echo mysqli_error($db);
                }
            ?>
        </section>
    </main>
    <footer >
        <section class="text-center py-3">
            <p><b>© 2020 Copyright : Guillaume G.</b></p>
        </section>
    </footer>
</body>
</html>
