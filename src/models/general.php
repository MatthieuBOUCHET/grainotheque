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
 * Fonctions d'accueil
 *
 * @return void
 */
function accueil(){
    stats_repartition();
    stats_stock();
    require_once './views/home.php';

}

/**
 * Redirection en cas d'erreur
 *
 * @return void
 */
function red_erreur()
{
    header('Location:/index.php?action=erreur?mess_err=DB002');
    exit();
}


/**
 * Affichage du tableau de résultats et décodage des données
 *
 * @param [DICT] $ligne, Ligne de données
 * @param [INT] $categorie, catégorie 1<=4
 * @return void
 */
function affichage_tableau($ligne,$categorie){
    $ligne = decode_donnees($ligne);

    $t1 = 
    "<tr>
    <th><a class='btn btn-dark' href='index.php?action=modification&categorie=".$categorie."&id=".$ligne['id']."'><i class='far fa-edit mr-1'></i>Modifier</a>
    <a class='btn btn-info' href='index.php?action=details&categorie=".$categorie."&id=".$ligne['id']."'><i class='far fa-question-circle mr-1'></i>Infos</a>
    <a class='btn btn-light' href='./models/qr_code_gen.php?categorie=".$categorie."&id=".$ligne['id']."' target=_blank'><i class='fas fa-qrcode mr-1'></i>Infos</a>
    </th>

    <th>".$ligne['espece']."</th>
    <td>".$ligne['stock']."</td>
    <td>".$ligne['famille']."</td>      
    <td>".$ligne['cycle']."</td>
    <td>".$ligne['couleur']."</td>
    </tr>";

    echo($t1);
}


//SNIPPETS HTML
$fleurs_sauvages_locales = ['espece'=>'Espèce','latin'=>'Nom latin','stock' => 'Stock', 'famille'=>'Famille', 'cycle'=>'Cycle','couleur'=>'Couleur',
'debut_floraison'=>'Début floraison','fin_floraison'=>'Fin floraison','hauteur'=>'Hauteur',
'debut_semis'=>'Début semis','fin_semis'=>'Fin semis','type_semis'=>'Type semis','culture'=>'Culture',
'technique'=>'Technique','exposition'=>'Exposition',
'pollinisateur'=>'Pollinisateur','infos'=>'Infos'];

$legumes = $fleurs_sauvages_locales;
unset($legumes['culture']);
$legumes['ecartement_entre_lignes'] = 'Ecartement entre lignes (cm)';
$legumes['ecartement_sur_lignes'] = 'Ecartement sur lignes (cm)';

$autres = $fleurs_sauvages_locales;
unset($autres['culture']);

$table = "
<div class='cont_table table-responsive'>
<table class='mt-1 mw-100 table w-100 table-striped'>
<thead>
<tr>
<th></th>
<th>Espèce</th>
<th>Stock (unités)</th>
<th>Famille</th>
<th>Cycle</th>
<th>Couleur</th>
</tr>
</thead>
<tbody>";