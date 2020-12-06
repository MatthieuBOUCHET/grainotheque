<?php
require_once 'general.php';
require_once 'formulaire.php';

/**
 * Class BDD basée sur POO
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
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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
        if(isset($params['form']))
        {
            $table = $params['form'];
            unset($params['form']);
        }
        else
        {
            header('Location:/');
            exit();
        }
        

        //SELECT
        $sql_1 = 'SELECT * from grainotheque INNER JOIN ';
        
        //JOINTURE
        if($table == 1)
        {
            $sql_2 = 'fleurs_sauvages_locales ON grainotheque.id_graine = fleurs_sauvages_locales.id';
        }

        else
        {
            header('Location:/');
            exit();
        }

        $sql = $sql_1.$sql_2; //Construction de la requête, étape 1

        //CLAUSES CONDITIONNELLES
        if(count($params) == 0)
        {
            //echo $sql;
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
                $sql_3 = $sql_3.' = :';
                $sql_3 = $sql_3.$key;

                if (!($i == $fin))
                {
                    $sql_3 = $sql_3.' AND ';
                }
                $i++;   
            }

            $sql = $sql.$sql_3;

            //VERIF STOCK
            if(isset($sql_4))
            {
                $sql = $sql.$sql_4;
            }

            $sql_5 = ' ORDER BY espece';
            $sql = $sql.$sql_5;

            //echo $sql;
            $this->sql = $sql;
            $this->params = $params;
            return 0;
        }
        

    }

    /**
     * Fonction exécutant et renvoyant les résultations de la requête
     *
     * @param [DICT] $params, construit par la méthode `getdonnees()`de `FormsDatas`
     * @return void
     */
    public function requete_selection($params)
    {
        $this->construction_sql($params);

        $req = $this->prepare($this->sql);
        $donnees = $req->execute($this->params);
        $resultat = $req->fetchAll();

        $req->closeCursor();
        return $resultat;
    }
}

