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
        case "1":
            affichage_formulaire('#checkbox_culture');
            break;
    
        default:
            disparition_formulaire('#checkbox_culture');
            break;
    }
}
changements_categories();