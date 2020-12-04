<?php
    session_start();

     if (isset($_POST['logout'])){

        session_destroy();
        header('location: php/connexion.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Polar Chat | Accueil</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body class="scrollbar-dusty-grass">
    <header>
        <nav class="mb-1 navbar navbar-expand-lg lighten-1">
            <a class="navbar-brand" href="index.php"><b>POLAR CHAT</b></a>
            <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav">
                <?php if (isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link">| Bonjour <i class="fas fa-hiking"></i> ' . $_SESSION['login'] . '</a></li>';}?>
                    <?php if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href="php/connexion.php">| <i class="fab fa-connectdevelop"></i> Connexion </a></li>';}?>
                    <?php if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href="php/inscription.php">| <i class="far fa-plus-square"></i> Inscription </a></li>';}?>
                    <li class="nav-item"><a class="nav-link" href="php/profil.php">| <i class="far fa-address-card"></i> Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="php/discussion.php">| <i class="fas fa-users"></i> Discussion</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['login'])){ echo '<li><form method="POST" action="index.php"><button type="submit" class="btn btn-info" name="logout" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></button></form></li>';}?>
                </ul>
            </section>
        </nav>
    </header>
    <main>
        <section class="main-acc container-fluid">
            <h1><b>Bienvenue sur POLAR CHAT</b></h1>
            <p>Le chat pour les aventuriers qui n'ont pas pas peur du froid.<br>
            Rencontrez des milliers d'explorateurs qui ont la même passion que vous :<br>
            un gout prononcé pour les voyages extrêmes dans les coins les plus froids de la planète !<br><br>
            Inscrivez vous dès maintenant !</p><br>
            <p>Ou connectez vous pour rejoindre directement le salon de discussion</p>
            <section class="fleche">
                <a class="down" href="#main-cont"><i class="fas fa-angle-down arrow levitate"></i></a> 
            </section>
        </section>
        <section id="main-cont" class="main-content container-fluid">
            <section class="card" style="width: 18rem;">
                <section class="card-body">
                    <h2 class="card-title"><span class="title">Polar Chat</span></h2>
                    <h3 class="card-subtitle mb-2 text-muted">C'est quoi ?</h3>
                    <p class="card-text">Polar chat est un site qui permet de partager ses expèriences de voyages extrêmes, ses aventures et ses roads trips dans les pays les plus froids au monde.</p>
                    <img id="boussole" src="images/icon.jpg" alt="boussole">
                </section>
            </section>
            <section class="card" style="width: 18rem;">
                <section class="card-body">
                    <h2 class="card-title"><span class="title">Notre activité ?</span></h2>
                    <h3 class="card-subtitle mb-2 text-muted">Que faisons nous ?</h3>
                    <p class="card-text">Nous mettons a disposition un chat visant uniquement les aventuriers et explorateurs du globe.</p>
                    <img id="jum" src="images/jumelles.png" alt="jumelles">
                </section>
            </section>
            <section class="card" style="width: 18rem;">
                <section class="card-body">
                    <h2 class="card-title"><span class="title">Notre but</span></h2>
                    <h3 class="card-subtitle mb-2 text-muted">Lequel ?</h3>
                    <p class="card-text">Tout simplement l'échange et le partage sur une passion commune, ainsi que l'uinion et l'entraide.</p>
                    <img id="map" src="images/map.webp" alt="map">
                </section>
            </section>
            <section class="card" style="width: 18rem;">
                <section class="card-body">
                    <h2 class="card-title"><span class="title">La sauvegarde</span></h2>
                    <h3 class="card-subtitle mb-2 text-muted">Protégeons !</h3>
                    <p class="card-text">Nous accordons énormément d'importance à la sauvegarde de la faune et la flore, nous en faisons une de nos prioritées. Polar Chat encourage les échanges et entraides vis a vis de la protection de la nature. </p>
                    <img id="bear" src="images/bear.png" alt="bear">
                </section>
            </section>
        </section>
    </main>
    <footer>
        <section class="footer-copyright text-center py-3">
            <p><b>© 2020 Copyright : Guillaume G.</b></p>
        </section>
    </footer>
</body>
</html>

