<?php
/**
 * Redirection vers l'accueil
 *
 * @return void
 */
function redirection(){
    header('Location:/');
    exit();
}

/**
 * Fonctions accueil
 *
 * @return void
 */
function accueil(){
    stats_repartition();
    stats_stock();
    require_once './views/home.php';

}


/**
 * Affichage du tableau de résultats
 *
 * @param [DICT] $ligne, Ligne de données
 * @param [INT] $categorie, catégorie 1<=4
 * @return void
 */
function affichage_tableau($ligne,$categorie){
    $ligne = decode_donnees($ligne);
    //<a href='index.php?action=modification&categorie=".$categorie."&id=".$ligne['id']."
    switch($categorie){
        case 1:
            $t1 = 
            "<tr>
            <th><a class='btn btn-dark' href='index.php?action=modification&categorie=".$categorie."&id=".$ligne['id']."'>Modifier</a></th>
            <th>".$ligne['espece']."</th>
            <td><i>".$ligne['latin']."</i></td>
            <td>".$ligne['stock']."</td>
            <td>".$ligne['famille']."</td>      
            <td>".$ligne['cycle']."</td>
            <td>".$ligne['couleur']."</td>
            <td>".$ligne['debut_floraison']." - ".$ligne['fin_floraison']."</td>
            <td>".$ligne['hauteur']."</td>
            <td>".$ligne['debut_semis']." - ".$ligne['fin_semis']."</td>
            <td>".$ligne['type_semis']."
            <td>".$ligne['culture']."</td>
            <td>".$ligne['technique']."</td>
            <td>".$ligne['exposition']."</td>
            <td>".$ligne['pollinisateur']."</td>
            <td>".$ligne['infos']."</td>
            </tr>";

            echo($t1);
            break;

        case 3:
            $t3 = 
            "<tr>
            <th><a class='btn btn-dark' href='index.php?action=modification&categorie=".$categorie."&id=".$ligne['id']."'>Modifier</a></th>
            <th>".$ligne['espece']."</th>
            <th>".$ligne['variete']."</th>
            <td><i>".$ligne['latin']."</i></td>
            <td>".$ligne['stock']."</td>
            <td>".$ligne['famille']."</td>      
            <td>".$ligne['cycle']."</td>
            <td>".$ligne['couleur']."</td>
            <td>".$ligne['debut_floraison']." - ".$ligne['fin_floraison']."</td>
            <td>".$ligne['hauteur']."</td>
            <td>".$ligne['debut_semis']." - ".$ligne['fin_semis']."</td>
            <td>".$ligne['type_semis']."</td>
            <td>".$ligne['ecartement_entre_lignes']."</td>
            <td>".$ligne['ecartement_sur_lignes']."</td>
            <td>".$ligne['technique']."</td>
            <td>".$ligne['exposition']."</td>
            <td>".$ligne['pollinisateur']."</td>
            <td>".$ligne['infos']."</td>
            </tr>";

            echo($t3);
            break;
        
        default:
            

            $t_o = "<tr>
            <th><a class='btn btn-dark' href='index.php?action=modification&categorie=".$categorie."&id=".$ligne['id']."'>Modifier</a></th>
            <th>".$ligne['espece']."</th>
            <td><i>".$ligne['latin']."</i></td>
            <td>".$ligne['stock']."</td>
            <td>".$ligne['famille']."</td>      
            <td>".$ligne['cycle']."</td>
            <td>".$ligne['couleur']."</td>
            <td>".$ligne['debut_floraison']." - ".$ligne['fin_floraison']."</td>
            <td>".$ligne['hauteur']."</td>
            <td>".$ligne['debut_semis']." - ".$ligne['fin_semis']."</td>
            <td>".$ligne['type_semis']."</td>
            <td>".$ligne['technique']."</td>
            <td>".$ligne['exposition']."</td>
            <td>".$ligne['pollinisateur']."</td>
            <td>".$ligne['infos']."</td>
            </tr>";

            echo($t_o);
    }
}
//CONSTANTES
$t_1 = "
<table class='mt-1 mw-100 table w-100'>
<thead>
<tr>
<th></th>
<th>Espèce</th>
<th>Nom latin</th>
<th>Stock (unités)</th>
<th>Famille</th>
<th>Cycle</th>
<th>Couleur</th>
<th>Floraison</th>
<th>Hauteur (cm)</th>
<th>Semis</th>
<th>Type semis</th>
<th>Culture godets</th>
<th>Technique</th>
<th>Exposition</th>
<th>Pollinisateur</th>
<th>Infos</th>
</tr>
</thead>
<tbody>";

$t_legumes = "
<table class='mt-1 mw-100 table w-100'>
<thead>
<tr>
<th></th>
<th>Espèce</th>
<th>Variété</th>
<th>Nom latin</th>
<th>Stock (unités)</th>
<th>Famille</th>
<th>Cycle</th>
<th>Couleur</th>
<th>Récolte</th>
<th>Hauteur (cm)</th>
<th>Semis</th>
<th>Type semis</th>
<th>Ecartement entre lignes (cm)</th>
<th>Ecartement sur lignes (cm)</th>
<th>Technique</th>
<th>Exposition</th>
<th>Pollinisateur</th>
<th>Infos</th>
</tr>
</thead>
<tbody>";

$t_other = "<table class='mt-1 mw-100 table w-100'> <!--Changements sur récolte et ajout des champs entre lignes-->
<thead>
<tr>
<th></th>
<th>Espèce</th>
<th>Nom latin</th>
<th>Stock (unités)</th>
<th>Famille</th>
<th>Cycle</th>
<th>Couleur</th>
<th>Floraison</th>
<th>Hauteur (cm)</th>
<th>Semis</th>
<th>Type semis</th>
<th>Technique</th>
<th>Exposition</th>
<th>Pollinisateur</th>
<th>Infos</th>
</tr>
</thead>
<tbody>";