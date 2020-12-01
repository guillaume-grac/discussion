<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Polar Chat | Connexion</title>
    <link rel="stylesheet" href="../css/profil.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="mb-1 navbar navbar-expand-lg lighten-1">
            <a class="navbar-brand" href="index.php"><b>POLAR CHAT</b></a>
            <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../index.php">| <i class="fas fa-igloo"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="connexion.php">| <i class="fab fa-connectdevelop"></i> Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription.php">| <i class="far fa-plus-square"></i> Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="discussion.php">| <i class="fas fa-users"></i> Discussion</a></li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item avatar"><a class="nav-link p-0" href="../index.php"><img title="Accueil" src="../images/fly.png" class="rounded-circle z-depth-0" alt="avatar image" height="50"></a></li>
                </ul>
            </section>
        </nav>
    </header>
    <main>
        <section class="container-fluid">
            <section class="loginBox">
                <h1>Vous pouvez modifier votre profil :</h1>
                <form method="post">
                    <section class="inputBox">
                        <label id="label-style" for="login">Entrez votre nouveau login :</label>
                        <input type="text" name="login" required>
                    </section>
                    <section class="inputBox">
                    <label id="label-style" for="password">Entrez votre nouveau mot de passe :</label>
                        <input type="password" name="password" placeholder="Votre nouveau Mot de Passe" required>
                    </section>
                    <section class="inputBox">
                    <label id="label-style" for="password">Retapez votre nouveau login :</label>
                        <input type="password" name="password" placeholder="Retapez votre nouveau Mot de Passe" required>
                    </section>
                    <input type="submit" name="inscription" value="C'est parti !">
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
