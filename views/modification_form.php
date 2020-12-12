<?php

$html = "
<div class='container mb-4 mt-4 pb-1 pl-auto pt-1'>
<h2>Ajout</h2>
<form role='form'class='mt-2' action='index.php?action=modification_bdd' method='POST'>

    <div class='form-group'>
        <input type='hidden' name='categorie' id='categorie' value='".$categorie."'/>
    </div>

    <div class='form-group'>
        <input type='hidden' name='id' id='id' value='".$id."'/>
    </div>

    <div class='form-group'>
        <label for='espece'>Espèce</label>
        <input type='text' class='form-control espece' name='espece' placeholder='Achillée Millefeuille' value='".$resultats['espece']."'>
    </div>

    <div class='form-group'>
        <label for='latin'>Latin</label>
        <input type='text' class='form-control espece' name='latin' placeholder='Agremonia eupatoria' value='".$resultats['latin']."'>
    </div> 

    <div class='form-group'>
        <label for='famille'>Famille</label>
        <select name='famille' class='form-control famille'>
            <option value=''>Famille inconnue</option>
        ";
            $html = $html.("<option selected value=".$resultats['famille'].">".$resultats['famille']."</option>");
            foreach($familles as $ligne)
            {
                $html = $html.("<option value='".$ligne."'>".$ligne."</option>");
            }

        $html = $html.("</select>
    </div>

    <div class='form-group'>
        <label for='cycle'>Cycle</label>
        <select name='cycle' class='form-control cycle'>");
        
        switch($resultats['cycle'])
        {
            case 1:
                $html = $html.("<option value='1' selected>Annuel</option>");
                break;
            case 2:
                $html = $html.("<option value='2' selected>Bisannuel</option>");
                break;
            case 3:
                $html = $html.("<option value='3' selected>Vivace</option>");
                break;
            default:
                $html = $html.("<option value='' selected>Cycle inconnnu</option>");
                break;
        }
            
        $html = $html.("<option value=''>Cycle inconnu</option>
            <option value='1'>Annuel</option>
            <option value='2'>Bisannuel</option>
            <option value='3'>Vivace</option>                         
        </select>
    </div>
    <div class='form-group'>
        <label for='couleur'>Couleur</label>
        <select name='couleur'class='form-control couleur' data-pg-name='famille'>
    ");

    switch($resultats['couleur'])
        {
            case 1:
                $html = $html.("<option value='1' selected>Blanc</option>");
                break;
            case 2:
                $html = $html.("<option value='2' selected>Jaune</option>");
                break;
            case 3:
                $html = $html.("<option value='3' selected>Rose</option>");
                break;
            case 4:
                $html = $html.("<option value='4' selected>Rouge</option>");
                break;
            case 5:
                $html = $html.("<option value='5' selected>Bleu</option>");
                break;
            case 6:
                $html = $html.("<option value='6' selected>Orange</option>");
                break;
            case 7:
                $html = $html.("<option value='7' selected>Violet</option>");
                break;
            case 8:
                $html = $html.("<option value='8' selected>Vert</option>");
                break;
            default:
                $html = $html.("<option value='' selected>Pas de couleur</option>");
                break;
        }

    $html = $html.(" 
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

    <div class='d-flex flex-row form-row justify-content-center text-left'>");

        $id=['debut_floraison'=>'Début de floraison/récolte',
        'fin_floraison'=>'Fin de floraison/récolte','debut_semis'=>'Début semis','fin_semis'=>'Fin semis'];
        
        foreach($id as $key => $value)
        {
            $html = $html.("<div class='form-group ml-4 mr-4'>
                <label for=".$key.">".$value."</label>
                <select name=".$key." id=".$key." class='form-control'>");
                switch($resultats[$key])
            {
                case 1:
                    $html = $html.("<option value='1' selected>Janvier</option>");
                    break;
                case 2:
                    $html = $html.("<option value='2' selected>Février</option>");
                    break;
                case 3:
                    $html = $html.("<option value='3' selected>Mars</option>");
                    break;
                case 4:
                    $html = $html.("<option value='4' selected>Avril</option>");
                    break;
                case 5:
                    $html = $html.("<option value='5' selected>Mai</option>");
                    break;
                case 6:
                    $html = $html.("<option value='6' selected>Juin</option>");
                    break;
                case 7:
                    $html = $html.("<option value='7' selected>Juillet</option>");
                    break;
                case 8:
                    $html = $html.("<option value='8' selected>Août</option>");
                    break;
                case 9:
                    $html = $html.("<option value='9' selected>Septembre</option>");
                    break;
                case 10:
                    $html = $html.("<option value='10' selected>Octobre</option>");
                    break;
                case 11:
                    $html = $html.("<option value='11' selected>Novembre</option>");
                    break;
                case 12:
                    $html = $html.("<option value='12' selected>Décembre</option>");
                    break;
                default:
                    $html = $html.("<option value='' selected>Mois inconnu</option>");
                    break;
            }
                
                    $html = $html.("<option value=''>Inconnu</option>
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
            </div>");

        }
    
    $html = $html.("
    </div>

    <div class='form-group'>
        <label for='type_semis'>Type de semis</label>
        <textarea class='form-control' name='type_semis'></textarea>
    </div>

    <div class='form-group'>
        <label for='exposition'>Exposition</label>
        <select class='form-control exposition' name='exposition'>");

        switch($resultats['exposition'])
        {
            case 1:
                $html = $html.("<option value='1' selected>Soleil</option>");
                break;
            case 2:
                $html = $html.("<option value='2' selected>Mi-Ombre</option>");
                break;
            case 3:
                $html = $html.("<option value='3' selected>Ombre</option>");
                break;
            case 4:
                $html = $html.("<option value='4' selected>Soleil + Mi-Ombre</option>");
                break;
            default:
                $html = $html.("<option value='' selected>Exposition inconnue</option>");
                break;
        }
        $html = $html.("
            <option value=''>Inconnu</option>
            <option value='1'>Soleil</option>
            <option value='2'>Mi-ombre</option>
            <option value='3'>Ombre</option>
            <option value='4'>Soleil + Mi-Ombre</option>                          
        </select>
    </div>

    <div class='form-group'>
        <label for='technique'>Technique</label>
        <textarea class='form-control' name='technique'>".$resultats['technique']."</textarea>
    </div>

    <div class='form-group'>
        <label for='infos'>Informations complémentaires</label>
        <textarea class='form-control' name='infos'>".$resultats['infos']."</textarea>
    </div>

    <div class='form-group'> 
        <label for='stock'>Stock (unités)</label>                     
        <input type='number' class='form-control user-select-all numeral stock' name='stock' min='0' max='100' value='".$resultats['stock']."'> 
    </div>

    <div class='form-group'> 
        <label for='hauteur'>Hauteur(cm)</label>                     
        <input type='number' class='form-control user-select-all numeral hauteur' name='hauteur' min='0' max='10000' value='".$resultats['hauteur']."'> 
    </div>

    <div class='form-group' id='ecartement_entre_lignes'> 
        <label for='ecartement_entre_lignes'>Ecartement entre lignes (cm)</label>                     
        <input type='number' class='form-control user-select-all numeral' name='ecartement_entre_lignes' min='0' max='10000'"); 
        if(isset($resultats['ecartement_entre_lignes']))
        {$html = $html.("value=".$resultats['ecartement_entre_lignes']);}

    $html = $html.("></div>

    <div class='form-group' id='ecartement_sur_lignes'> 
        <label for='ecartement_sur_lignes'>Ecartement sur lignes (cm)</label>                     
        <input type='number' class='form-control user-select-all numeral' name='ecartement_sur_lignes' min='0' max='10000'"); 
        if(isset($resultats['ecartement_sur_lignes']))
        {$html = $html.("value=".$resultats['ecartement_sur_lignes']);}

    $html = $html.("></div>

    <div class='btn-group' data-toggle='buttons'>");
    if($categorie == 1)
    {
        $html = $html.("<label class='btn btn-light' id='checkbox_culture'>
            <input type='checkbox' name='culture'");
            if($resultats['culture'] == 1)
            {
                $html = $html.('checked');
            }

            $html = $html.("> Culture godets/caissette               
        </label>");
    }
                            
    $html = $html.("<label class='btn btn-light'>
    <input type='checkbox' name='pollinisateur'");
        if($resultats['pollinisateur'] == 1)
        {
            $html = $html.(' checked=true');
        }

        $html = $html.("> Utile pollinisateur </label>");
                                           
    $html = $html.("</div>

    <button type='submit' class='align-content-center btn btn-primary d-block justify-content-center ml-auto mr-auto mt-4'>Mettre à jour</button>                 
</form>
</div>
");


$content = $html;

require_once 'template.php';