<?php
//Désolé TWFyaW5lIEJhdGFpbGxl, vraiment :)
session_start();
require_once('./models/general.php');
require_once('./models/database.php');
require_once('./models/formulaire.php');
require_once('./models/traitement_donnees.php');



if(!empty($_GET['action']))
{
    $action = filter_input(INPUT_GET, 'action');

    if($action == 'home')
    {
        stats_repartition();
        stats_stock();
        require_once './views/home.php';
    }

    else if($action == 'recherche')
    {
        $familles = familles_requetes(); //Pour le formulaire, champ famille
        require_once './views/recherche.php';
    }
    
    else if($action == 'resultats')
    {
        $resultats = recherche();
        if(count($_POST) == 0)
        {
            header('Location:index.php');
        }


        if(count($resultats) == 0)
        {
            $resultats = false;
        }

        require_once './views/resultats.php';
    }

    else if($action == 'insertion_formulaire')
    {
        $familles = familles_requetes(); //Pour le formulaire, champ famille
        require_once './views/insertion.php';
    }

    else if($action == 'insertion')
    {
        ajout();
    }

    else
    {
        stats_repartition();
        stats_stock();
        require_once './views/home.php';
    }
}

else
{
    stats_repartition();
    stats_stock();
    require_once './views/home.php';
}