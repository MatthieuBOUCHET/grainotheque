<?php
ob_start();
?>

<h2 class="d-block pb-2 pl-auto pt-2 text-center">Résultats de la recherche</h2>

<a class="btn btn-primary btn-lg" href="/index.php">Retour à la page de recherche</a>

        <!--PAS DE RESULTATS-->
        <?php
        if(!$resultats){
            echo("<div class='alert alert-danger mt-5 shadow-none text-center'>Aucun résultat trouvé !</div>");
        }

        //Resultats

        else{
            echo($t_1);
            echo($t_2);  
        }
        ?>                                                  
            </tbody>             
        </table>

<?php $content = ob_get_clean();?>
<?php require_once 'template.php';