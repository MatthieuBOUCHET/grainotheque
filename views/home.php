<?php

$liste_formulaires = [
    1=>'Fleurs sauvages locales',
    2=>'Fleurs horticoles',
    3=>'Légumes',
    4=>'Aromatiques'];
$id_form = [
    1=>'fleurs_sauvages_locales',
    2=>'fleurs_horticoles',
    3=>'legumes',
    4=>'aromatiques'
];
$html="<div class='card'><ul class='list-group list-group-flush'>";

foreach($liste_formulaires as $key => $value)
{
    $menu = "
    <!--MENU-->
        <a href='#".$id_form[$key]."' class='link text-body'><li class='link list-group-item'>".$liste_formulaires[$key]."</li></a>
    <!--RECHERCHE-->
    ";

    $html = $html.$menu;
}
$html = $html."</ul></div>
<div class='container mb-4 mt-4 pb-1 pl-auto pt-1' id='all'>
    <input type='hidden' name='form'/>
    <form role='form' id='form_all' method='POST' action='index.php?action=resultats'>                  
        <button type='submit' class='align-content-center btn btn-primary d-block justify-content-center ml-auto mr-auto mt-auto'>Afficher l'ensemble du catalogue</button>                 
    </form>
</div>
";

foreach($liste_formulaires as $key => $value)
{
    $html_1 = "<div class='border border-dark container mb-4 mt-4 pb-1 pl-auto pt-1' id='".$id_form[$key]."'>
    <h2>".$liste_formulaires[$key]."</h2>
    <form role='form'class='mt-2' action='index.php?action=resultats' method='POST'>
    <input type='hidden' value=".$key." name='form'/>  
        <div class='form-group'>
            <label for='espece'>Espèce</label>
            <input type='text' class='form-control espece' name='espece' placeholder='Achillée Millefeuille' data-pg-name='espece'>
        </div>

        <div class='form-group'>
            <label for='latin'>Nom latin</label>
            <input type='text' class='form-control latin' name='latin' placeholder='ex : Achillea millefolium' data-pg-name='latin'>
        </div>  

        <div class='form-group'>
            <label for='famille'>Famille</label>
            <select name='famille' class='form-control famille' data-pg-name='famille'> 
                <option value='0'>Pas de filtres de famille</option>
                <option value='Astéracées'>Astéracées</option>                         
            </select>
        </div>

        <div class='form-group'>
            <label for='cycle'>Cycle</label>
            <select name='cycle' class='form-control cycle' data-pg-name='cycle'> 
                <option value='0'>Pas de filtre de cycle</option>
                <option value='1'>Annuel</option>
                <option value='2'>Bisannuel</option>
                <option value='3'>Vivace</option>                         
            </select>
        </div>

        <div class='form-group'>
            <label for='couleur'>Couleur</label>
            <select name='couleur'class='form-control couleur' data-pg-name='famille'> 
                <option value='0'>Pas de filtre de couleur</option>
                <option value='1'>Blanc</option>
                <option value='2'>Jaune</option>
                <option value='3'>Rose</option>
                <option value='4'>Magenta</option>
                <option value='5'>Bleu</option>
            </select>
        </div>

        <div class='d-flex flex-row form-row justify-content-center text-left'>";
            
            $id=['debut_floraison'=>'Début de floraison',
            'fin_floraison'=>'Fin de floraison','debut_semis'=>'Début semis','fin_semis'=>'Fin semis'];
            
            foreach($id as $key => $value)
            {
                $html_2 = "<div class='form-group ml-4 mr-4'>
                    <label for=".$key.">".$value."</label>
                    <select name=".$key." id=".$key." class='form-control'> 
                        <option value='0'>Pas de filtre</option>
                        <option value='1'>Janvier</option>
                        <option value='2'>Février</option>
                        <option value='3'>Mars</option>
                        <option value='4'>Avril</option>
                        <option value='5'>Mai</option>
                        <option value='6'>Juin</option>
                        <option value='7'>Juillet</option>
                        <option value='8'>Août</option>
                        <option value='9'>Septembre</option>
                        <option value='10'>Octobre</option>
                        <option value='11'>Novembre</option>
                        <option value='12'>Décembre</option>
                    </select>
                </div>";
                $html_1 = $html_1.$html_2;
            }
        
        $html_3 = "</div>
        <div class='form-group'>
            <label for='exposition'>Exposition</label>
            <select class='form-control exposition' data-pg-name='exposition' name='exposition'> 
                <option value='0'>Pas de filtre d'exposition</option>
                <option value='1'>Soleil</option>
                <option value='2'>Mi-ombre</option>
                <option value='3'>Ombre</option>                         
            </select>
        </div>

        <div class='form-group'> 
            <label for='stock'>Stock minimum (unités)</label>                     
            <input type='number' class='form-control user-select-all numeral stock' name='stock' min='0' max='100'> 
        </div>

        <div class='form-group'> 
            <label for='hauteur'>Hauteur minimum (cm)</label>                     
            <input type='number' class='form-control user-select-all numeral hauteur' name='hauteur' min='0' max='10000'> 
        </div>

        <div class='btn-group' data-toggle='buttons'> 
            <label class='btn btn-light'> 
                <input type='checkbox' name='culture'> Culture godets/caissette               
            </label>                     
            <label class='btn btn-light'> 
                <input type='checkbox' name='pollinisateur'> Utile pollinisateur                
            </label>                                         
        </div>

        <button type='submit' class='align-content-center btn btn-primary d-block justify-content-center ml-auto mr-auto mt-4'>Rechercher</button>                 
    </form>
</div>";
$html_1 = $html_1.$html_3;
$html = $html.$html_1;
}

$content = $html;
require_once 'template.php';