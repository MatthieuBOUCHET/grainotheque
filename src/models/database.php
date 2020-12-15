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

    /**
     * COnstructeur
     */
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
            header('Location:/index.php?action=erreur&err_msg=DB001');
            exit();
        }
    }

    //RECHERCHE
    /**
     * Fonction construisant la requête SQL de recherche à partir des données du formulaire
     *
     * @param array $params, 
     * @return void
     */
    private function construction_sql($params)
    {
        //VERIFICATION
        if(!isset($params['categorie']))
        {
            red_erreur();
        }
        

        //SELECT
        $sql_1 = 'SELECT * from ';
        
        //SELECTION TABLE
        $sql_2 = $this->switch_table($params['categorie']);

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

            $key_superieures = ['stock','hauteur','ecartement_entre_lignes','ecartement_sur_lignes'];

            foreach($params as $key => $value)
            {
                $sql_3 = $sql_3.$key;
                
                

                if(in_array($key,$key_superieures))
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


            //print_r($sql);
            //print_r($params);
            $this->sql = $sql;
            $this->params = $params;
            return 0;
        }
        

    }

    /**
     * Fonction exécutant et renvoyant les résultations de la requête
     *
     * @param array $params, construit par la méthode `getdonnees()`de `FormsDatas`
     * @param array $resultats, liste de résultats, vide par défaut
     * @return $resultats, résultats des requêtes
     */
    private function requete_selection($params,$resultats=[])
    {
        $this->construction_sql($params);

        //print_r($this->params);
        $req = $this->prepare($this->sql);
        $req->execute($this->params);

        while($ligne = $req->fetch())
            {
                array_push($resultats,$ligne);
            }
        
        
        $req->closeCursor();
        return $resultats;
    }

    /**
     * Fonction recherchant dans la base de données en fonction de la catégorie de la recherhce
     *
     * @param array $params, liste des paramètres
     * @return array $ensemble, liste de liste de l'ensemble des résultats
     */
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
    /**
     * Requpete construisant par concaténation la requête SQL pour l'insertion et modifiant le
     * dictionnaire de paramètres
     *
     * @param array $params, paramètres de l'utilisateurs
     * @return void, passe les résultats en attribut
     */
    private function construction_sql_insert($params)
    {
        //VERIFICATION
        if(!isset($params['categorie']))
        {
            red_erreur();
        }
        
        $sql_2 = $this->switch_table($params['categorie']);

        unset($params['categorie']);

        if (count($params) == 0){
            redirection();
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

    /**
     * FOnction publique reprenant la construction de requête et l'exécutant
     * selon les paramètres
     *
     * @param array $params, liste des paramètres
     * @return void, exécute la requête
     */
    public function ajout($params)
    {
        $this->construction_sql_insert($params);
        //print_r($this->sql);

        $req = $this->prepare($this->sql);

        try {
            $req->execute($this->params);
            //redirection();
        }

        catch(Exception $e)
        {
            red_erreur();
        }
    }

    //UPDATE
    /**
     * Fonction privée construisant par concaténation la requête de MAJ
     * de la BDD et modifiant les paramètres en conséquence
     *
     * @param array $params, dictionnaire des paramètres utilisateurs
     * @return void, passe en attributs
     */
    private function construction_sql_update($params)
    {
        //VERIFICATION
        if(!isset($params['categorie']))
        {
            red_erreur();
        }

        if(!isset($params['id']))
        {
            red_erreur();
        }

        $sql = 'UPDATE ';
        $id = $params['id'];
        $categorie = $params['categorie'];

        unset($params['categorie']);
        unset($params['id']);

        switch($categorie)
        {
            case 1:
                $champs = ['espece','stock','latin',
                'famille','cycle','couleur','debut_floraison','fin_floraison',
                'hauteur','debut_semis','fin_semis','type_semis','culture',
                'technique','exposition','pollinisateur','infos'];
                break;
            
            case 3:
                $champs = ['espece','stock','latin',
                'famille','cycle','couleur','debut_floraison','fin_floraison',
                'hauteur','debut_semis','fin_semis','type_semis','ecartement_entre_lignes',
                'ecartement_sur_lignes','technique','exposition','pollinisateur','infos'];
                break;

            default: //Aromatiques et horticoles
                $champs = ['espece','stock','latin',
                'famille','cycle','couleur','debut_floraison','fin_floraison',
                'hauteur','debut_semis','fin_semis','type_semis',
                'technique','exposition','pollinisateur','infos'];
                break;
        }

        $sql = $sql.$this->switch_table($categorie);
        $sql = $sql.(' SET ');

        foreach($champs as $champ)
        {
            if(!array_key_exists($champ,$params))
            {
                $params[$champ] = NULL;
            }
        }

        $fin = count($champs);
        $i = 1;
        foreach($champs as $champ)
        {
            $sql = $sql.$champ;
            $sql = $sql.' = :';
            $sql = $sql.$champ;

            if($i != $fin)
            {
                $sql = $sql.',';
            }

            $i++;
        }

        $sql = $sql.' WHERE id = :id';
        $params['id'] = $id;

        $this->sql = $sql;
        $this->params = $params;
    }
    
    /**
     * Fonction exécutant la requête SQL de modification en fonction
     * des paramètres utilisateurs
     *
     * @param array $params
     * @return void
     */
    public function update($params)
    {
        //print_r($params);
        $this->construction_sql_update($params);
        //print_r($this->sql);

        $req = $this->prepare($this->sql);

        try {
            $req->execute($this->params);
        }

        catch(Exception $e)
        {
            redirection();
        }
    }

    //SUPPRESSION
    /**
     * Fonction construisant la requête SQL de suppression
     *
     * @param INT $id
     * @param INT $categorie
     * @return void
     */
    private function construction_sql_suppression($id,$categorie)
    {
        $sql = 'DELETE FROM ';
        $sql = $sql.$this->switch_table($categorie);
        $sql = $sql.' WHERE id=:id';

        $this->sql = $sql;
        $this->params = ['id'=>$id];
    }

    /**
     * Fonction executant la requête de suppression
     *
     * @param INT $id
     * @param INT $categorie
     * @return void
     */
    public function suppression($id,$categorie)
    {
        $this->construction_sql_suppression($id,$categorie);
        $req = $this->prepare($this->sql);
        $req->execute($this->params);
    }

    //STATS
    /**
     * Fonction d'optimisation de choix de table
     *
     * @param INT $table
     * @return void
     */
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

    /**
     * Fonction construisant les requêtes SQL de stats
     *
     * @param INT $champ
     * @param INT $table, 1 <= 4
     * @return void
     */
    private function construction_sql_stats($champ,$table)
    {
        $sql = 'SELECT COUNT('.$champ.') FROM ';
        //SELECTION TABLE
        $sql = $sql.$this->switch_table($table);
        //print_r($sql);
        $this->sql = $sql;
    }
    

    /**
     * Exportation des stats. Création des cookies
     *
     * @return array $resultats
     */
    public function stats_repartition()
    {
        $resultats=[];
        for($i=1;$i<=4;$i++)
        {
            $this->construction_sql_stats('*',$i);
            $req = $this->prepare($this->sql);
            $req->execute();
            array_push($resultats,$req->fetch()[0]);
        }
        //print_r($resultats);
        return $resultats;
    }

    /**
     * Fonction construisant les requêtes SQL de stats
     *
     * @param INT $table, 1 <= 4
     * @return void
     */
    private function construction_sql_stats_stock($table)
    {
        $sql = 'SELECT COUNT(*) FROM ';
        //SELECTION TABLE
        $sql = $sql.$this->switch_table($table);
        $sql = $sql.' WHERE stock = 0';
        //print_r($sql);
        $this->sql = $sql;
    }

    /**
     * Exportation des stats. Création des cookies
     *
     * @return ARRAY $resultats
     */
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

/**
 * Fonction de recherche envoyée au contrôleur
 *
 * @param array $utilisateur, données utilisateur
 * @return array $resultats
 */
function recherche($utilisateur)
{
    $db = new BDD;

    $resultats = $db->recherche($utilisateur);
    $db = null;

    return $resultats;
}

/**
 * Fonction d'ajout envoyée au contrôleur
 *
 * @param array $utilisateur, données utilisateur
 * @return void
 */
function ajout()
{
    $datas = new Formsdatas();
    $db = new BDD;
    $entrees = $datas->getdonnees();
    $db->ajout($entrees);
    $db = null;
    header('Location:/index.php?action=voir_tout');
    exit();

}

/**
 * Fonction de MAJ envoyée au contrôleur
 *
 * @param array $utilisateur, données utilisateur
 * @return void
 */
function update()
{
    $datas = new Formsdatas();
    $db = new BDD;
    $entrees = $datas->getdonnees();

    $db->update($entrees);
    $db = null;
    header('Location:/index.php?action=voir_tout');
    exit();
}

/**
 * Fonction de suppression envoyée au contrôleur
 *
 * @param array $utilisateur, données utilisateur
 * @return void
 */
function suppression()
{
    $db = new BDD;

    $db->suppression(filter_input(INPUT_GET,'id'),filter_input(INPUT_GET,'categorie'));
    $db = null;
    header('Location:/index.php?action=voir_tout');
    exit();
}

/**
 * Fonction de stats, instance un cookie pour lecture JS
 *
 * @return void
 */
function stats_repartition()
{
    $db = new BDD;
    $repartition = $db->stats_repartition();
    $cookie=implode(',',$repartition);
    setcookie('repartition',$cookie); 
    $db = null; 
}

/**
 * Fonction de stats, instance un cookie pour lecture JS
 *
 * @return void
 */
function stats_stock()
{
    $db = new BDD;
    $stock = $db->stats_stock();
    $cookie=implode(',',$stock);
    setcookie('stock',$cookie);  
}

/**
 * Fonction implémentée avec le module JSON
 * Parse et transforme en liste pour affichage HTML
 *
 * @return array $familles
 */
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