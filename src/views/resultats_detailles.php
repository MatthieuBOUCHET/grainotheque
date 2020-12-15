<?php
ob_start();
//print_r($resultats);
$resultats = decode_donnees($resultats);
?>

<div class="container">
    <h1 class="display-4 text-center">Espèce</h1>
    <figure class="d-block figure ml-auto mr-auto mt-4 w-25 text-center">
        <img src="../public/img/unavailable.jpg" class="figure-img img-fluid rounded"> 
        <figcaption class="figure-caption text-center"><?=$resultats['espece']?></figcaption>
    </figure>
    <div class="mt-4 table-responsive">
        <table class="mt-3 table table-striped"> 
            <tbody>                     
                <?php
                switch($categorie)
                {
                    case 1:
                        foreach ($fleurs_sauvages_locales as $key=>$value)
                        {
                            echo("<tr><th scope='row'>".$value."</th>");
                            echo("<td>".$resultats[$key]."</td></tr>");
                        }
                        break;

                    case 3:
                        foreach ($legumes as $key=>$value)
                        {
                            echo("<tr><th scope='row'>".$value."</th>");
                            echo("<td>".$resultats[$key]."</td></tr>");
                        }
                        break;

                    default:
                        foreach ($legumes as $key=>$value)
                            {
                                echo("<tr><th scope='row'>".$value."</th>");
                                echo("<td>".$resultats[$key]."</td></tr>");
                            }
                            break;
                }
                
                ?>   
            </tbody>                     
        </table>
    </div>

    <img src=<?="../models/qr_code_gen.php?id=".$id."&categorie=".$categorie;?> class="d-block ml-auto mr-auto w-25"> 
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';