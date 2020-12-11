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

    //SELECT
    /**
     * Fonction construisant la requête SQL à partir des données du formulaire
     *
     * @param [DICT] $params, 
     * @return void
     */
    private function construction_sql($params)
    {
        //VERIFICATION
        if(!isset($params['categorie']))
        {
            redirection($GLOBALS['HOME']);
        }
        

        //SELECT
        $sql_1 = 'SELECT * from ';
        
        //SELECTION TABLE
        switch($params['categorie'])
        {
            case 1:
                $sql_2 = 'fleurs_sauvages_locales';
                break;

            case 2:
                $sql_2 = 'fleurs_horticoles';
                break;
            
            case 3:
                $sql_2 = 'legumes';
                break;

            case 4:
                $sql_2 = 'aromatiques';
                break;

            default:
                redirection($GLOBALS['HOME']);
                exit();
        }
        unset($params['categorie']);

        $sql = $sql_1.$sql_2; //Construction de la requête, étape 1

        //CLAUSES CONDITIONNELLES
        if(count($params) == 0)
        {
            //print_r($sql);
            $this->sql = $sql;
            return 0;
        }

        else
        {
            $sql_3 = ' WHERE ';

            $i = 1; //COMPTEUR FIN
            $fin = count($params);

            foreach($params as $key => $value)
            {
                $sql_3 = $sql_3.$key;
                
                if($key == 'stock' || $key == 'hauteur' || $key=='ecartement_entre_lignes' || $key=='ecartement_sur_lignes')
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

    //INSERTION
    private function construction_sql_insert($params)
    {
        //VERIFICATION
        if(!isset($params['categorie']))
        {
            redirection('/index.php');
        }
        
        switch($params['categorie'])
        {
            case 1:
                $sql_2 = 'fleurs_sauvages_locales';
                break;

            case 2:
                $sql_2 = 'fleurs_horticoles';
                break;
            
            case 3:
                $sql_2 = 'legumes';
                break;

            case 4:
                $sql_2 = 'aromatiques';
                break;

            default:
        }
        unset($params['categorie']);

        if (count($params) == 0){
            redirection('/index.php');
        }

        //INSERT
        $sql = 'INSERT INTO '.$sql_2.' (';

        $i = 1; //COMPTEUR FIN
        $fin = count($params);

        foreach($params as $key => $value)
        {
            $sql = $sql.$key;

            if($i != $fin)
            {
                $sql = $sql.',';
            }
            $i++;
            
        }//Nom des champs

        $sql = $sql.') VALUES (';

        $i = 1;
        foreach($params as $key => $value)
        {
            $sql = $sql.':';
            $sql = $sql.$key;

            if($i != $fin)
            {
                $sql = $sql.',';
            }

            $i++;
            
        }//Valeur des champs

        $sql = $sql.');';

        $this->sql = $sql;
        $this->params = $params;
    }

    public function ajout($params)
    {
        $this->construction_sql_insert($params);
        print_r($this->sql);

        $req = $this->prepare($this->sql);

        try {
            $req->execute($this->params);
            redirection('/index.php');
        }

        catch(Exception $e)
        {
            echo('<div class="alert alert-danger mt-5 shadow-none text-center" role="alert">
            Insertion impossible, redirection vers le formulaire dans 10 secondes ...
            </div>');
            sleep(10);
            redirection('/index.php?action=insertion_formulaire)');
        }
    }

    //STATS
    private function switch_table($table)
    {
        switch($table)
        {
            case 1:
                $sql_2 = 'fleurs_sauvages_locales';
                break;

            case 2:
                $sql_2 = 'fleurs_horticoles';
                break;
            
            case 3:
                $sql_2 = 'legumes';
                break;

            case 4:
                $sql_2 = 'aromatiques';
                break;
            }
            return $sql_2;
    }

    private function construction_sql_stats_repartition($table)
    {
        $sql = 'SELECT COUNT(*) FROM ';
        //SELECTION TABLE
        $sql = $sql.$this->switch_table($table);
        //print_r($sql);
        $this->sql = $sql;
    }
    

    public function stats_repartition()
    {
        $resultats=[];
        for($i=1;$i<=4;$i++)
        {
            $this->construction_sql_stats_repartition($i);
            $req = $this->prepare($this->sql);
            $req->execute();
            array_push($resultats,$req->fetch()[0]);
        }
        return $resultats;
    }

    private function construction_sql_stats_stock($table)
    {
        $sql = 'SELECT COUNT(*) FROM ';
        //SELECTION TABLE
        $sql = $sql.$this->switch_table($table);
        $sql = $sql.' WHERE stock = 0';
        //print_r($sql);
        $this->sql = $sql;
    }

    public function stats_stock()
    {
        $resultats=[];
        for($i=1;$i<=4;$i++)
        {
            $this->construction_sql_stats_stock($i);
            $req = $this->prepare($this->sql);
            $req->execute();
            array_push($resultats,$req->fetch()[0]);
        }
        
        return $resultats;
    }
}

function recherche()
{
    $datas = new Formsdatas;
    $db = new BDD;
    $utilisateur = $datas->getdonnees();

    $resultats = $db->recherche($utilisateur);
    $db = null;

    return $resultats;
}

function ajout()
{
    $datas = new Formsdatas();
    $db = new BDD;
    $entrees = $datas->getdonnees();
    $db->ajout($entrees);
    $db = null;

}

function stats_repartition()
{
    $db = new BDD;
    $repartition = $db->stats_repartition();
    $cookie=implode(',',$repartition);
    setcookie('repartition',$cookie); 
    $db = null; 
}

function stats_stock()
{
    $db = new BDD;
    $stock = $db->stats_stock();
    $cookie=implode(',',$stock);
    setcookie('stock',$cookie);  
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
