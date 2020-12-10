<?php 
function redirection($lien){
    header('Location:'.$lien);
    exit();
}

//CONSTANTES
$GLOBALS['RACINE'] = '';
$GLOBALS['HOME'] = '/index.php';