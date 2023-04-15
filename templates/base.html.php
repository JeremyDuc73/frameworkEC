<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style/base.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/mentionsLegales.css">
    <link rel="stylesheet" href="style/partenaires.css">
    <link rel="stylesheet" href="style/contact.css">
    <link rel="stylesheet" href="style/produits.css">
    <link rel="stylesheet" href="style/prestations.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <title><?= $pageTitle ?></title>
</head>
<body>
<div class="bandeInfosTop">
    <div class="container containerBandeInfos">
        <div class="adresseBandeInfos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <a href="https://goo.gl/maps/hKS7K8rKVfs81im26">Centre E.Leclerc, Aime La Plagne</a>
        </div>
        <hr class="hrBandeInfos">
        <div class="horairesBandeInfos">
            <p>lundi au samedi de 8h30 à 19h non-stop</p>
            <p>parking gratuit et salon climatisé</p>
        </div>
        <hr class="hrBandeInfos">
        <div class="numeroBandeInfos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
            <a href="tel:0479097966">04.79.09.79.66</a>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="?type=advanced&action=accueil"><img class="logoNavbar" src="img/logo.jpg" alt="logo emotion coiffure"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?type=static&action=prestations">prestations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?type=advanced&action=categoriesProduits">produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?type=advanced&action=partenaires">partenaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?type=static&action=contact">contact</a>
                </li>
                <?php if (\App\Session::getUser()){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?type=admin&action=signOut">Se déconnecter</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<?php if (!\App\Session::getUser()){ ?>
    <div id="about" class="firstPart">
        <div class="itemsFirstPart">
            <img src="img/logo.jpg" alt="logo emotion coiffure" class="logo">
            <div class="linksFirstPart">
                <a href="tel:0479097966" class="phoneNumber">04.79.09.79.66</a>
                <a target="_blank" href="https://onlinebooking.ikosoft.com/774A27F639997D91EC3100015/FRA/Services/ChooseGender" class="appointement">RDV en ligne</a>
            </div>
        </div>
    </div>
<?php } ?>
<?= $pageContent ?>
<div class="footer">
    <div class="container containerFooter">
        <div class="leftPartFooter">
            <h3 class="text-white">NAVIGATION</h3>
            <a class="btn" href="?type=admin&action=register">Plan du site</a>
            <hr class="separateurFooter">
            <a class="btn mentionsLegales" href="?type=static&action=mentionsLegales">Mentions légales</a>
            <a class="btn seConnecter" href="?type=admin&action=signIn">Se connecter</a>
        </div>
        <hr class="hrMobile">
        <div class="centerPartFooter">
            <h3 class="text-center">HORAIRES</h3>
            <div class="jour">
                <p class="nomJour">lundi, vendredi et samedi</p>
                <p>08:30–19:00</p>
            </div>
            <div class="jour">
                <p class="nomJour">mardi, mercredi et jeudi</p>
                <p>08:30–12:30/13:30-19:00</p>
            </div>
            <div class="jour">
                <p class="nomJour">dimanche</p>
                <p>fermé</p>
            </div>
        </div>
        <hr class="hrMobile">
        <div class="rightPartFooter">
            <a href="https://www.facebook.com/emotioncoiffureaime/" target="_blank" class="linkFacebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
            </a>
            <a class="btn numeroFooter" href="tel:0479097966"><h5>04.79.09.79.66</h5></a>
            <h5>emotioncoiffureaime@gmail.com</h5>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="../public/js/base.js"></script>
</body>
</html>