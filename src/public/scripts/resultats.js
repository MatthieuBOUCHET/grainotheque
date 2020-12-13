function surlignage_inconnu(){
    let liste = $('td');
    liste.each(function(){

        if($(this).text().includes('Inconnu'))
        {
            $(this).addClass('text-danger');
        }
    })
}
surlignage_inconnu();