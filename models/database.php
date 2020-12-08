<?php
require_once 'general.php';
require_once 'traitement_donnees.php';

/**
 * Classe BDD basée sur PDO
 */
class BDD extends PDO
{
    private $params;
    private $sql;

    public function __construct()
    {
        try 
        {
            PDO::__construct('mysql:host=localhost;dbname=grainotheque','root','');
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //Prod
            $this->exec('SET CHARACTER SET utf8');
        }

        catch(PDOException $e)
        {
            print_r("Erreur !: " . $e->getMessage() . "<br/>");
            die();
        }
    }

    /**
     * Fonction construisant la requête SQL à partir des données du formulaire
     *
     * @param [DICT] $params, 
     * @return void
     */
    private function construction_sql($params)
    {
        //TABLE
        if(!isset($params['categorie']))
        {
            header('Location:/');
            exit();
        }

        //SELECT
        $sql_1 = 'SELECT * from graines INNER JOIN ';
        
        //JOINTURE
        switch($params['categorie'])
        {
                
            case 1:
                $sql_2 = 'fleurs_sauvages_locales ON graines.id_graine = fleurs_sauvages_locales.id';
                break;

            case 2:
                $sql_2 = 'fleurs_horticoles ON graines.id_graine = fleurs_horticoles.id';
                break;
            
            case 3:
                $sql_2 = 'legumes ON graines.id_graine = legumes.id';
                break;

            case 4:
                $sql_2 = 'aromatiques ON graines.id_graine = aromatiques.id';
                break;

            default:
                header('Location:/');
                exit();
        }

        $sql = $sql_1.$sql_2; //Construction de la requête, étape 1

        //CLAUSES CONDITIONNELLES
        if(count($params) == 0)
        {
            print_r($sql);
            $this->sql = $sql;
            return 0;
        }

        else
        {
            $sql_3 = ' WHERE ';

            $i = 1;
            $fin = count($params);

            foreach($params as $key => $value)
            {
                $sql_3 = $sql_3.$key;
                
                if($key == 'stock' || $key == 'hauteur')
                {
                    $sql_3 = $sql_3.' >= :';
                }
                else
                {
                    $sql_3 = $sql_3.' = :';
                }
                
                $sql_3 = $sql_3.$key;

                if (!($i == $fin))
                {
                    $sql_3 = $sql_3.' AND ';
                }
                $i++;   
            }

            $sql = $sql.$sql_3;


            // print_r($sql);
            $this->sql = $sql;
            $this->params = $params;
            return 0;
        }
        

    }

    /**
     * Fonction exécutant et renvoyant les résultations de la requête
     *
     * @param [DICT] $params, construit par la méthode `getdonnees()`de `FormsDatas`
     * @param [DICT] $resultats, liste de résultats, vide par défaut
     * @return void
     */
    private function requete_selection($params,$resultats=[])
    {
        $this->construction_sql($params);

        $req = $this->prepare($this->sql);
        $req->execute($this->params);

        while($ligne = $req->fetch())
            {
                array_push($resultats,$ligne);
            }
        
        
        //print_r($this->sql);
        $req->closeCursor();
        return $resultats;
    }

    public function recherche($params)
    {

        if($params['categorie'] == 0) //Affichage de l'ensemble de la table
        {
            for($i=1;$i<=4;$i++)
            {
                $params['categorie'] = $i;
                $ensemble[$i] = $this->requete_selection($params);
            }
        }

        else 
        {
            $ensemble[$params['categorie']] = $this->requete_selection($params);
        }
        
        
        foreach($ensemble as $key=>$value)
        {
            if (count($ensemble[$key]) == 0)
            {
                unset($ensemble[$key]);
            }
        }
        return $ensemble;
    }
}

function familles_requetes()
{
    //Recup JSON
    $file = fopen('./public/familles.json','r');
    $json = fread($file,filesize('./public/familles.json'));

    $json_decode = json_decode($json);

    //Traitement
    $familles = $json_decode->familles;

    return $familles;
}
