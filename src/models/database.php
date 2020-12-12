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
            header('Location:/index.php?action=erreur&err_msg=DB001');
            exit();
        }
    }

    //RECHERCHE
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
                
                $key_superieures = ['stock','hauteur','ecartement_entre_lignes','ecartement_sur_lignes'];

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
     * @param [DICT] $params, construit par la méthode `getdonnees()`de `FormsDatas`
     * @param [DICT] $resultats, liste de résultats, vide par défaut
     * @return void
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
            redirection();
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

    public function ajout($params)
    {
        $this->construction_sql_insert($params);
        //print_r($this->sql);

        $req = $this->prepare($this->sql);

        try {
            $req->execute($this->params);
            redirection();
        }

        catch(Exception $e)
        {
            redirection();
        }
    }

    //UPDATE
    private function construction_sql_update($params)
    {
        //VERIFICATION
        if(!isset($params['categorie']))
        {
            redirection();
        }

        if(!isset($params['id']))
        {
            redirection();
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
    
    public function update($params)
    {
        //print_r($params);
        $this->construction_sql_update($params);
        //print_r($this->sql);

        $req = $this->prepare($this->sql);

        try {
            $req->execute($this->params);
            //redirection();
        }

        catch(Exception $e)
        {
            redirection();
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

function recherche($utilisateur)
{
    $db = new BDD;

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
