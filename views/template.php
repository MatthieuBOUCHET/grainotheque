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
        <!-- STYLES PERSOS -->
        <link href="./public/css/style.css" rel="stylesheet">
        <script>/* Pinegrow Interactions, NE PAS ENLEVER */ (function(){try{if(!document.documentElement.hasAttribute('data-pg-ia-disabled')) { window.pgia_small_mq=typeof pgia_small_mq=='string'?pgia_small_mq:'(max-width:767px)';window.pgia_large_mq=typeof pgia_large_mq=='string'?pgia_large_mq:'(min-width:768px)';var style = document.createElement('style');var pgcss='html:not(.pg-ia-no-preview) [data-pg-ia-hide=""] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show=""] {opacity:1;visibility:visible;display:block;}';if(document.documentElement.hasAttribute('data-pg-id') && document.documentElement.hasAttribute('data-pg-mobile')) {pgia_small_mq='(min-width:0)';pgia_large_mq='(min-width:99999px)'} pgcss+='@media ' + pgia_small_mq + '{ html:not(.pg-ia-no-preview) [data-pg-ia-hide="mobile"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="mobile"] {opacity:1;visibility:visible;display:block;}}';pgcss+='@media ' + pgia_large_mq + '{html:not(.pg-ia-no-preview) [data-pg-ia-hide="desktop"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="desktop"] {opacity:1;visibility:visible;display:block;}}';style.innerHTML=pgcss;document.querySelector('head').appendChild(style);}}catch(e){console&&console.log(e);}})()</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placé à la fin du document, chargement plus rapide -->
        <header>
            <h1 class="d-block pb-2 pl-auto pt-2 text-center" data-toggle="popover" data-pg-ia-show="desktop" data-pg-ia='{"l":[{"name":"Title apparition","trg":"now","a":"zoomInUp"}]}'>Management de Grainothèque</h1>
        </header>
        
        <?=$content?>;

    </body>
    <!-- Bootstrap JavaScript CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../public/pgia/lib/pgia.js"></script>
    <script type='text/javascript' src='../public/scripts/form.js'></script>
</html>