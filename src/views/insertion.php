<?php

$html_1 = "<div class='container mb-4 mt-4 pb-1 pl-auto pt-1'>
<h2>Ajout</h2>
<form role='form'class='mt-2' action='index.php?action=insertion' method='POST'>

    <div class='form-group'>
        <label for='categorie'>Catégorie</label>
        <select name='categorie' class='form-control categorie' id='categorie' onchange='changements_categories();'> 
            <option value='1'>Fleurs sauvages locales</option>
            <option value='2'>Fleurs horticoles</option>
            <option value='3'>Légumes</option>                         
            <option value='4'>Aromatiques</option> 
        </select>
    </div>

    <div class='form-group'>
        <label for='espece'>Espèce</label>
        <input type='text' class='form-control espece' name='espece' placeholder='Achillée Millefeuille' required>
    </div>

    <div class='form-group'>
        <label for='latin'>Latin</label>
        <input type='text' class='form-control espece' name='latin' placeholder='Agremonia eupatoria'>
    </div> 

    <div class='form-group'>
        <label for='famille'>Famille</label>
        <select name='famille' class='form-control famille' data-pg-name='famille'>
            <option value=''>Famille inconnue</option>
        ";
            foreach($familles as $ligne)
            {
                $html_1 = $html_1."<option value='".$ligne."'>".$ligne."</option>";
            }

        $html_2 = "</select>
    </div>

    <div class='form-group'>
        <label for='cycle'>Cycle</label>
        <select name='cycle' class='form-control cycle' data-pg-name='cycle'> 
            <option value=''>Cycle inconnu</option>
            <option value='1'>Annuel</option>
            <option value='2'>Bisannuel</option>
            <option value='3'>Vivace</option>                         
        </select>
    </div>

    <div class='form-group'>
        <label for='couleur'>Couleur</label>
        <select name='couleur'class='form-control couleur' data-pg-name='famille'> 
            <option value=''>Pas de couleurs</option>
            <option value='1'>Blanc</option>
            <option value='2'>Jaune</option>
            <option value='3'>Rose</option>
            <option value='4'>Rouge</option>
            <option value='5'>Bleu</option>
            <option value='6'>Orange</option>
            <option value='7'>Violet</option>
            <option value='8'>Vert</option>
        </select>
    </div>

    <div class='d-flex flex-row form-row justify-content-center text-left'>";
        $html_1 = $html_1.$html_2;
        $id=['debut_floraison'=>'Début de floraison/récolte',
        'fin_floraison'=>'Fin de floraison/récolte','debut_semis'=>'Début semis','fin_semis'=>'Fin semis'];
        
        foreach($id as $key => $value)
        {
            $html_2 = "<div class='form-group ml-4 mr-4'>
                <label for=".$key.">".$value."</label>
                <select name=".$key." id=".$key." class='form-control'> 
                    <option value=''>Inconnu</option>
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
            <option value=''>Inconnu</option>
            <option value='1'>Soleil</option>
            <option value='2'>Mi-ombre</option>
            <option value='3'>Ombre</option>
            <option value='4'>Soleil + Mi-Ombre</option>                          
        </select>
    </div>

    <div class='form-group'>
        <label for='type_semis'>Type de semis</label>
        <textarea class='form-control' name='type_semis'></textarea>
    </div>

    <div class='form-group'>
        <label for='technique'>Technique</label>
        <textarea class='form-control' name='technique'></textarea>
    </div>

    <div class='form-group'>
        <label for='infos'>Informations complémentaires</label>
        <textarea class='form-control' name='infos'></textarea>
    </div>

    <div class='form-group'> 
        <label for='stock'>Stock (unités)</label>                     
        <input type='number' class='form-control user-select-all numeral stock' name='stock' min='0' max='100'> 
    </div>

    <div class='form-group'> 
        <label for='hauteur'>Hauteur(cm)</label>                     
        <input type='number' class='form-control user-select-all numeral hauteur' name='hauteur' min='0' max='10000'> 
    </div>

    <div class='form-group' id='ecartement_entre_lignes'> 
        <label for='ecartement_entre_lignes'>Ecartement entre lignes (cm)</label>                     
        <input type='number' class='form-control user-select-all numeral hauteur' name='hauteur' min='0' max='10000'> 
    </div>

    <div class='form-group' id='ecartement_sur_lignes'> 
        <label for='ecartement_sur_lignes'>Ecartement sur lignes (cm)</label>                     
        <input type='number' class='form-control user-select-all numeral' name='ecartement_entre_lignes' min='0' max='10000'> 
    </div>

    <div class='btn-group' data-toggle='buttons'> 
        <label class='btn btn-light' id='checkbox_culture'> 
            <input type='checkbox' name='culture'> Culture godets/caissette               
        </label>                     
        <label class='btn btn-light'> 
            <input type='checkbox' name='pollinisateur'> Utile pollinisateur                
        </label>                                         
    </div>

    <button type='submit' class='align-content-center btn btn-primary d-block ml-auto mr-auto mt-4'>
        <i class='fas fa-plus-circle mr-2'></i>Ajouter
    </button>                 
</form>
</div>
";

$html_1 = $html_1.$html_3;


$content = $html_1;
require_once 'template.php';