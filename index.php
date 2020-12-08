<?php
//Désolé TWFyaW5lIEJhdGFpbGxl, vraiment :)
session_start();

if(!empty($_GET['action']))
{
    $action = filter_input(INPUT_GET, 'action');

    if($action == 'home')
    {
        require_once './views/home.php';
    }
    
    if($action == 'resultats')
    {
        require_once './models/formulaire.php';
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
}

else
{
    require_once './views/home.php';
}