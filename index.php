<?php
//Désolé TWFyaW5lIEJhdGFpbGxl, vraiment :)
session_start();
require_once('./models/general.php');

if(!empty($_GET['action']))
{
    $action = filter_input(INPUT_GET, 'action');

    if($action == 'home')
    {
        require_once './views/home.php';
    }
    
    if($action == 'resultats')
    {
        if(count($_POST) == 0)
        {
            header('Location:index.php');
        }
        require './models/formulaire.php';
        if(count($resultats) == 0)
        {
            $resultats = false;
        }
        else
        {
            
            $t_1 = "<table class='mt-5 mw-100 table w-100'>
            <thead>
            <tr>
            <th>ID</th>
            <th>Espèce</th>
            <th>Nom latin</th>
            <th>Stock (unités)</th>
            <th>Famille</th>
            <th>Cycle</th>
            <th>Couleur</th>
            <th>Floraison</th>
            <th>Hauteur (cm)</th>
            <th>Semis</th>
            <th>Culture godets</th>
            <th>Technique</th>
            <th>Exposition</th>
            <th>Pollinisateur</th>
            </tr>
            </thead>
            <tbody>";

            foreach($resultats as $ligne)
            {
                $t_2 = "<tr>
                <th scope='row'>".$ligne['id']."</th>
                <td>".$ligne['espece']."</td>
                <td>".$ligne['latin']."</td>
                <td>".$ligne['stock']."</td>
                <td>".$ligne['famille']."</td>      
                <td>".$ligne['cycle']."</td>
                <td>".$ligne['couleur']."</td>
                <td>".$ligne['debut_floraison']." - ".$ligne['fin_floraison']."</td>
                <td>".$ligne['hauteur']."</td>
                <td>".$ligne['debut_semis']." - ".$ligne['fin_semis']."</td>
                <td>".$ligne['culture']."</td>
                <td>".$ligne['technique']."</td>
                <td>".$ligne['exposition']."</td>
                <td>".$ligne['pollinisateur']."</td>
                </tr>";
            }       
        }

        require_once './views/resultats.php';
    }
}

else
{
    require_once './views/home.php';
}