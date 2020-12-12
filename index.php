<?php
//Désolé TWFyaW5lIEJhdGFpbGxl, vraiment désolé:)

session_start();
require_once('./models/general.php');
require_once('./models/database.php');
require_once('./models/formulaire.php');
require_once('./models/traitement_donnees.php');



if(!empty($_GET['action']))
{
    $action = filter_input(INPUT_GET, 'action');

    switch($action)
    {
        //Page d'accueil
        case 'home':
            accueil();
            break;

        //Formulaires
        case 'recherche':
            $familles = familles_requetes(); //Pour le formulaire, champ famille
            require_once './views/recherche.php';
            break;
        
        case 'insertion_formulaire':
            $familles = familles_requetes(); //Pour le formulaire, champ famille
            require_once './views/insertion.php';
            break;
        
        //Pages de résultats
        case 'resultats':
            $datas = new Formsdatas;
            $resultats = recherche($datas->getdonnees());
                
            if(count($_POST) == 0)
            {
                redirection();
            }
            require_once './views/resultats.php';
            break;
            
        //Voir tout
        case 'voir_tout':
            $resultats = recherche(['categorie'=>0]);
            //print_r($resultats);

            if(count($resultats) == 0)
            {
                $resultats = false;
            }

            require_once './views/resultats.php';
            break;
        
        //Traitement du formulaire d'insertion
        case 'insertion':
            print_r($_POST);
            //ajout();
            break;

        //Traitement du formulaire de modification
        case 'modification':
            $familles = familles_requetes();
            $categorie = filter_input(INPUT_GET,'categorie');
            $id = filter_input(INPUT_GET,'id');

            $resultats = recherche(['categorie'=>$categorie,'id'=>$id]);
            $resultats = $resultats[$categorie][0];

            if(count($resultats) == 0)
            {
                $resultats = false;
                require_once './views/resultats.php'; //Pas de résultats
                break;
            }
            else
            {
                require_once './views/modification_form.php';
                break;
            }
        
        case 'modification_bdd':
            update();
            break;
        
        default:
            accueil();
            break;
            
    }
}

else
{
    accueil();
}