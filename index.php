<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Polar Chat | Accueil</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="mb-1 navbar navbar-expand-lg lighten-1">
            <a class="navbar-brand" href="index.php"><b>POLAR CHAT</b></a>
            <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="php/connexion.php">| <i class="fab fa-connectdevelop"></i> Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="php/inscription.php">| <i class="far fa-plus-square"></i> Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="php/profil.php">| <i class="far fa-address-card"></i> Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="php/discussion.php">| <i class="fas fa-users"></i> Discussion</a></li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item avatar"><a class="nav-link p-0" href="index.php"><img title="Accueil" src="images/fly.png" class="rounded-circle z-depth-0" alt="avatar image" height="50"></a></li>
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
            <a class="down" href="#main-cont"><i class="fas fa-angle-down"></i></a> 
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
                    <img id="map" src="images/map.webp" alt="jumelles">
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

