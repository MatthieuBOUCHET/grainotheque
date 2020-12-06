<?php
ob_start();
?>

<!--MENU-->
<div class="card">
            <ul class="list-group list-group-flush">
                <a href="#fleurs_sauvages_locales_div" class="link text-body" id="fleurs_sauvages_locales"><li class="link list-group-item">Fleurs sauvages locales</li></a>
            </ul>
        </div>
        <!--RECHERCHE 1-->
        <div class="border border-dark container mb-4 mt-4 pb-1 pl-auto pt-1" id="fleurs_sauvages_locales_div">
            <h2>Fleurs sauvages locales</h2>
            <form role="form" id="form_fleurs_sauvages_locales" class="mt-2" action="index.php?action=resultats" method="POST">
            <input type='hidden' value='1' name='form'/>  
                <div class="form-group">
                    <label for="espece">Espèce</label>
                    <input type="text" class="form-control" id="espece" name="espece" placeholder="Entrez le nom de l'espèce recherchée (Achillée Millefeuille)" data-pg-name="espece">
                </div>
                <div class="form-group">
                    <label for="latin">Nom latin</label>
                    <input type="text" class="form-control" id="latin" name='latin' placeholder="Entrez le nom latin de l'espèce recherchée (ex : Achillea millefolium)" data-pg-name="latin">
                </div>                
                <div class="form-group">
                    <label for="famille">Famille</label>
                    <select name="famille" id="famille" class="form-control" data-pg-name="famille"> 
                        <option value="0">Pas de filtres de famille</option>
                        <option value="Astéracées">Astéracées</option>                         
                    </select>
                </div>
                <div class="form-group">
                    <label for="cycle">Cycle</label>
                    <select name="cycle" id="cycle" class="form-control" data-pg-name="cycle"> 
                        <option value="0">Pas de filtre de cycle</option>
                        <option value="1">Annuel</option>
                        <option value="2">Bisannuel</option>
                        <option value="3">Vivace</option>                         
                    </select>
                </div>
                <div class="form-group">
                    <label for="couleur">Couleur</label>
                    <select name="couleur" id="couleur" class="form-control" data-pg-name="famille"> 
                        <option value="0">Pas de filtre de couleur</option>
                        <option value="1">Blanc</option>
                        <option value="2">Jaune</option>
                        <option value="3">Rose</option>
                        <option value="4">Magenta</option>
                        <option value="5">Bleu</option>
                    </select>
                </div>
                <div class="d-flex flex-row form-row justify-content-center text-left">
                    <div class="form-group ml-4 mr-4">
                        <label for="debut_floraison">Début de floraison</label>
                        <select name="debut_floraison" id="debut_floraison" class="form-control" data-pg-name="debut_floraison"> 
                            <option value="0">Pas de filtre</option>
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                    </div>
                    <div class="form-group ml-4 mr-4">
                        <label for="fin_floraison">Fin de floraison</label>
                        <select name="fin_floraison" id="fin_floraison" class="form-control" data-pg-name="fin_floraison"> 
                            <option value="0">Pas de filtre</option>
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-row form-row justify-content-center text-left">
                    <div class="form-group ml-4 mr-4">
                        <label for="debut_semis">Début de semis</label>
                        <select id="debut_semis" class="form-control" data-pg-name="fin_semis" name="debut_semis"> 
                            <option value="0">Pas de filtre</option>
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                    </div>
                    <div class="form-group ml-4 mr-4">
                        <label for="fin_semis">Fin de semis</label>
                        <select id="fin_semis" class="form-control" data-pg-name="fin_semis" name="fin_semis"> 
                            <option value="0">Pas de filtre</option>
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exposition">Exposition</label>
                    <select id="exposition" class="form-control" data-pg-name="exposition" name="exposition"> 
                        <option value="0">Pas de filtre d'exposition</option>
                        <option value="1">Soleil</option>
                        <option value="2">Mi-ombre</option>
                        <option value="3">Ombre</option>                         
                    </select>
                </div>
                <div class="btn-group" data-toggle="buttons"> 
                    <label class="btn btn-light"> 
                        <input type="checkbox" name="culture"> Culture godets/caissette               
                    </label>                     
                    <label class="btn btn-light"> 
                        <input type="checkbox" name="pollinisateur"> Utile pollinisateur                
                    </label>                                         
                </div>
                <button type="submit" class="align-content-center btn btn-primary d-block justify-content-center ml-auto mr-auto mt-4">Rechercher</button>                 
            </form>
        </div>

<?php $content = ob_get_clean();?>
<?php require_once 'template.php';