<!DOCTYPE html>
<!--EDITION HTML/CSS/JS/BOOTSRAP à l'aide de Pinegrom-->
<!-- BOOTSTRAP & RESSOURCES MAJORITAIREMENT IMPORTES EN CDN -->
<html lang="fr-fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Lucca HOOGENBOSCH">
        <meta name="author" content="Matthieu BOUCHET">
        <title>Grainothèque</title>
        <!-- BOOTSRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <!--FONT AWESOME (icônes)-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <!--CHARTS JS (graphes) -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="../public/scripts/charts.js"></script>
        <!-- JQUERY Bibliothèque JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../public/scripts/js.cookie.js"></script>
        <!-- STYLES PERSOS -->
        <link href="./public/css/style.css" rel="stylesheet">
        <script>/* Pinegrow Interactions, NE PAS ENLEVER */ (function(){try{if(!document.documentElement.hasAttribute('data-pg-ia-disabled')) { window.pgia_small_mq=typeof pgia_small_mq=='string'?pgia_small_mq:'(max-width:767px)';window.pgia_large_mq=typeof pgia_large_mq=='string'?pgia_large_mq:'(min-width:768px)';var style = document.createElement('style');var pgcss='html:not(.pg-ia-no-preview) [data-pg-ia-hide=""] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show=""] {opacity:1;visibility:visible;display:block;}';if(document.documentElement.hasAttribute('data-pg-id') && document.documentElement.hasAttribute('data-pg-mobile')) {pgia_small_mq='(min-width:0)';pgia_large_mq='(min-width:99999px)'} pgcss+='@media ' + pgia_small_mq + '{ html:not(.pg-ia-no-preview) [data-pg-ia-hide="mobile"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="mobile"] {opacity:1;visibility:visible;display:block;}}';pgcss+='@media ' + pgia_large_mq + '{html:not(.pg-ia-no-preview) [data-pg-ia-hide="desktop"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="desktop"] {opacity:1;visibility:visible;display:block;}}';style.innerHTML=pgcss;document.querySelector('head').appendChild(style);}}catch(e){console&&console.log(e);}})()</script>
        
        
    </head>
    <body>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placé à la fin du document, chargement plus rapide -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Grainothèque</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="align-items-center d-flex mr-2 nav-item">
                        <a class="nav-link" href="/index.php"><i class="fa-house-user fa mr-1"></i>Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?action=recherche"><i class="fa-search fa mr-1"></i>Recherche & Modification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?action=insertion_formulaire"><i class="fa-plus-circle fa mr-1"></i>Ajout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?action=voir_tout"><i class="fa-stream fa mr-1"></i>Voir tout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php#cont-stats"><i class="fa-chart-pie fa mr-1"></i>Statistiques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://grainesdebiodiverscite.fr/" target="_blank"><i class="fa-external-link-alt fa mr-1"></i>Graines de Bio-Divers-Cités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://fr.wikipedia.org/wiki/Grainoth%C3%A8que" target="_blank"><i class="fab fa-wikipedia-w mr-1"></i>En savoir plus sur les grainothèques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mailto:matthieu.bouchet@outlook.com;lucca.hoogenbosch@auxlazaristeslasalle.fr?subject=Contact sur la grainothèque" target="_blank"><i class="far fa-address-card mr-1"></i>Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/MatthieuBOUCHET/grainotheque" target="_blank"><i class="fab fa-github mr-1"></i>Voir le projet sur GitHub</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        
        <?=$content?>

    </body>
    <!-- Bootstrap JavaScript CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../public/pgia/lib/pgia.js"></script>

    <!-- SCRIPTS PERSOS -->
    <script type='text/javascript' src='../public/scripts/form.js'></script>
    <script type='text/javascript' src='../public/scripts/resultats.js'></script>
</html>