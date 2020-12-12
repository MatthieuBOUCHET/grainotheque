<?php
/**
 * Condition mois
 *
 * @param [Element] $champ
 * @return $champ ligne modifiée
 */
function mois_cond($champ)
{
    switch($champ)
    {
        case 1:
            $champ = 'Janvier';
            break;
        case 2:
            $champ = 'Février';
            break;
        case 3:
            $champ = 'Mars';
            break;
        case 4:
            $champ = 'Avril';
            break;
        case 5:
            $champ = 'Mai';
            break;
        case 6:
            $champ = 'Juin';
            break;
        case 7:
            $champ = 'Juillet';
            break;
        case 8:
            $champ = 'Août';
            break;
        case 9:
            $champ = 'Septembre';
            break;
        case 10:
            $champ = 'Octobre';
            break;
        case 11:
            $champ = 'Novembre';
            break;
        case 12:
            $champ = 'Décembre';          
            break;
    }
    
    return $champ;
}

function checkbox($champ)
{
if($champ == 1){
    return 'Oui';
}
else{
    return 'Non';
}
}

/**
 * Décode les données
 *
 * @param [DICT] $resultats
 * @return [DICT] $ensemble
 */
function decode_donnees($ensemble)
{
    
    if(!count($ensemble) == 0){

        
        switch($ensemble['cycle'])
        {
            case 1:
                $ensemble['cycle'] = 'Annuel';
                break;
            case 2:
                $ensemble['cycle'] = 'Bisannuel';
                break;
            case 3:
                $ensemble['cycle'] = 'Vivace';
                break;
        }

        
        switch($ensemble['couleur'])
        {
            case 1:
                $ensemble['couleur'] = 'Blanc';
                break;
            case 2:
                $ensemble['couleur'] = 'Jaune';
                break;
            case 3:
                $ensemble['couleur'] = 'Rose';
                break;
            case 4:
                $ensemble['couleur'] = 'Rouge';
                break;
            case 5:
                $ensemble['couleur'] = 'Bleu';
                break;
            case 6:
                $ensemble['couleur'] = 'Orange';
                break;
            case 7:
                $ensemble['couleur'] = 'Violet';
                break;
            case 8:
                $ensemble['couleur']='Vert';
            
        }

        $ensemble['debut_floraison'] = mois_cond($ensemble['debut_floraison']);
        $ensemble['fin_floraison'] = mois_cond($ensemble['fin_floraison']);
        $ensemble['debut_semis'] = mois_cond($ensemble['debut_semis']);
        $ensemble['fin_semis'] = mois_cond($ensemble['fin_semis']);

        switch($ensemble['exposition'])
        {
            case 1:
                $ensemble['exposition'] = 'Soleil';
                break;
            case 2:
                $ensemble['exposition'] = 'Mi-Ombre';
                break;
            case 3:
                $ensemble['exposition'] = 'Ombre';
                break;
            case 4:
                $ensemble['exposition'] = 'Soleil + Mi-Ombre';
                break;
        }

        $ensemble['pollinisateur'] = checkbox($ensemble['pollinisateur']);

        if(isset($ensemble['culture']))
        {
            $ensemble['culture'] = checkbox($ensemble['culture']);
        }
        else
        {
            $ensemble['culture'] = 'Non';
        }

        foreach($ensemble as $key=>$value){
            if(is_int($key)){
                unset($ensemble[$key]);
            }
        }
            
            
        
    }
    //print_r($ensemble);
    return $ensemble;
}