function affichage_formulaire(champ)
{
    $(champ).show();
}
function disparition_formulaire(champ) {
    $(champ).hide();
}

function changements_categories()
{
    switch ($('#categorie').val()) {
        case "1": //Fleurs sauvages locales
            affichage_formulaire('#checkbox_culture');
            disparition_formulaire('#ecartement_entre_lignes');
            disparition_formulaire('#ecartement_sur_lignes');
            break;

        case "3": //
            affichage_formulaire('#ecartement_entre_lignes');
            affichage_formulaire('#ecartement_sur_lignes');
            disparition_formulaire('#checkbox_culture');
            break;
    
        default:
            disparition_formulaire('#checkbox_culture');
            disparition_formulaire('#ecartement_entre_lignes');
            disparition_formulaire('#ecartement_sur_lignes');
            break;
    }
}
changements_categories();