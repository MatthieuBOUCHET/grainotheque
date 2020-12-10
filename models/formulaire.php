<?php
require_once 'database.php';

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
                if($key != 'categorie')
                {
                    unset($this->donnees[$key]);
                }
                
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

function recherche()
{
    $datas = new Formsdatas;
    $db = new BDD;
    $utilisateur = $datas->getdonnees();

    $resultats = $db->recherche($utilisateur);

    return $resultats;
}