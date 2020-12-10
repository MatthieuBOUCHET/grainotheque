<?php
ob_start();
require_once './models/traitement_donnees.php';

$t_1 = "
<table class='mt-1 mw-100 table w-100'>
            <thead>
            <tr>
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
            <th>Infos</th>
            </tr>
            </thead>
            <tbody>";

$t_legumes = "
<table class='mt-1 mw-100 table w-100'>
<thead>
<tr>
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

?>

<h2 class="d-block pb-2 pl-auto pt-2 text-center">Résultats de la recherche</h2>

<a class="btn btn-primary btn-lg" href="/index.php">Retour à la page de recherche</a>

        <!--PAS DE RESULTATS-->
        <?php
        if(gettype($resultats) != 'boolean')
        {
            $titres=[1=>'Fleurs sauvages locales',2=>'Fleurs horticoles',3=>'Légumes',4=>'Aromatiques'];
            
            foreach($resultats as $key=>$val)
            {
                switch($key)
                {
                    case 1:
                        echo($t_1);

                        foreach($resultats[$key] as $ligne)
                        {
                            $ligne=decode_donnees($ligne);
                            $t_1_val = "<tr>
                            <th>".$ligne['espece']."</th>
                            <td><i>".$ligne['latin']."</i></td>
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
                            <th>".$ligne['infos']."</th>
                            </tr>";

                            echo($t_1_val);
                        }
                        break;

                    case 3:
                        echo($t_legumes);
                        foreach($resultats[$key] as $ligne)
                        {
                            
                            $ligne=decode_donnees($ligne);
                            $t_val_legumes = "<tr>
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
                                <th>".$ligne['infos']."</th>
                                </tr>";

                            echo($t_val_legumes);
                        }
                        break;
                    

                    default:
                        echo($t_other);
                        foreach($resultats[$key] as $ligne)
                            {
                                $ligne = decode_donnees($ligne);

                                $t_other_val = "<tr>
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
                                <th>".$ligne['infos']."</th>
                                </tr>";
    
                                echo($t_other_val);
                            }
                    }
                    echo("<h3 class='mt-5'>".$titres[$key].'</h3>');
                }
                
            }

        else
        {
            echo('<div class="alert alert-danger mt-5 shadow-none text-center" role="alert" data-toggle="tooltip" data-placement="top" title="Modifier les paramètres de recherches">
            Aucun résultat trouvé !
            </div>');
        }
        
        ?>                                                  
            </tbody>             
        </table>

<?php $content = ob_get_clean();?>
<?php require_once 'template.php';