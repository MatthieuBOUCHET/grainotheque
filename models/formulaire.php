<?php
require_once 'database.php';
require_once 'general.php';

/**
 * Représente les données du formulaires
 * 
 * Attributs :
 * ------------
 * - $donnees(public)
 */
class Formsdatas
{
    public $donnees;

    public function __construct()
    {
        $this->donnees = $this->securisationPOST();
        $this->transformation();

    }

    /**
    * Fonction privée, sécurise les entrées
    * @return $sPOST[array]
    */

    private function securisationPOST()
    {
    foreach ($_POST as $key => $value) {
        $sPOST[$key]=htmlspecialchars($value);
        $sPOST[$key]=stripslashes($sPOST[$key]);
        $sPOST[$key]=trim($sPOST[$key]);
        

    }

    return($sPOST);
    }

    /**
     * Traite les données entrées.
     * 
     * L'ensemble de la procédure est décrite ici : https://test/
     *
     * @return void
     */

    private function transformation()
    {
        foreach ($this->donnees as $key => $value) {
            //Checkbox
            if($value == 'on'){
                $this->donnees[$key] = 1;
            }

            else if($value == 'off'){
                unset($this->donnees[$key]);
            }

            //Autres
            else if($value == "0"){
                unset($this->donnees[$key]);
            }

            else if($value == ""){
                unset($this->donnees[$key]);
            }
        }
    }
    
    /**
     * Getter donnees
     *
     * @return $this->donnees[DICT]
     */
    public function getdonnees()
    {
        return $this->donnees;
    }

}


/**
 * Décode les données
 *
 * @param [DICT] $resultats
 * @return void
 */
function decode_donnees($ensemble)
{
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
                $champ = 'Jullet';
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

    for($i=0;$i < count($ensemble); $i++)
    {
        switch($ensemble[$i]['cycle'])
        {
            case 1:
                $ensemble[$i]['cycle'] = 'Annuel';
                break;
            case 2:
                $ensemble[$i]['cycle'] = 'Bisannuel';
                break;
            case 3:
                $ensemble[$i]['cycle'] = 'Vivace';
                break;
        }

        
        switch($ensemble[$i]['couleur'])
        {
            case 1:
                $ensemble[$i]['couleur'] = 'Blanc';
                break;
            case 2:
                $ensemble[$i]['couleur'] = 'Jaune';
                break;
            case 3:
                $ensemble[$i]['couleur'] = 'Rose';
                break;
            case 4:
                $ensemble[$i]['couleur'] = 'Magenta';
                break;
            case 5:
                $ensemble[$i]['couleur'] = 'Bleu';
                break;
        }

        $ensemble[$i]['debut_floraison'] = mois_cond($ensemble[$i]['debut_floraison']);
        $ensemble[$i]['fin_floraison'] = mois_cond($ensemble[$i]['fin_floraison']);
        $ensemble[$i]['debut_semis'] = mois_cond($ensemble[$i]['debut_semis']);
        $ensemble[$i]['fin_semis'] = mois_cond($ensemble[$i]['fin_semis']);

        switch($ensemble[$i]['exposition'])
        {
            case 1:
                $ensemble[$i]['exposition'] = 'Soleil';
                break;
            case 2:
                $ensemble[$i]['exposition'] = 'Mi-Ombre';
                break;
            case 3:
                $ensemble[$i]['exposition'] = 'Ombre';
                break;
            case 4:
                $ensemble[$i]['exposition'] = 'Mi-Ombre + Soleil';
                break;
        }

        $ensemble[$i]['pollinisateur'] = checkbox($ensemble[$i]['pollinisateur']);
        $ensemble[$i]['culture'] = checkbox($ensemble[$i]['culture']);
    }
    return $ensemble;
}

$datas = new Formsdatas;
$db = new BDD;
$resultats = $db->requete_selection($datas->getdonnees());
$resultats = decode_donnees($resultats);