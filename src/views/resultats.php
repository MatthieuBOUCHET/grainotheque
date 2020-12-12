<?php
ob_start();
require_once './models/traitement_donnees.php';

?>

<div class='cont-table ml-2 mr-2'>
    <h2 class="d-block pb-2 pl-auto pt-2 text-center">Résultats de la recherche</h2>


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
                            affichage_tableau($ligne,$key);
                        }
                        break;

                    case 3:
                        echo($t_legumes);
                        foreach($resultats[$key] as $ligne)
                        {
                            affichage_tableau($ligne,$key);
                        }
                        break;
                    
                    default:
                        echo($t_other);
                        foreach($resultats[$key] as $ligne)
                        {
                            affichage_tableau($ligne,$key);
                        }
                        break;

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
</div>

<?php $content = ob_get_clean();?>
<?php require_once 'template.php';