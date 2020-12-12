function getCookie(name) {
    var cookie = Cookies.get(name);
    var liste = cookie.split(',');
    
    return liste;
  }

function repartition_graph(ctx,datas_bdd)
{
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{data: datas_bdd,backgroundColor:[
                '#264478',
                '#264478',
                '#A5A5A5',
                '#4472C4'
            ]},
        ],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Fleurs sauvages locales',
                'Fleurs horticoles exotiques',
                'Légumes',
                'Aromatiques'
            ]
        },
    });

    return chart
}

function stock_graph(ctx,datas_bdd)
{
    var sum_stock_epuise = 0;
    for(var i = 0; i < datas_bdd.length;i++){
        sum_stock_epuise += parseInt(datas_bdd[i]);
    }

    stock_dispo = getCookie('repartition');
    var sum_stock_dispo = 0;
    for(var i = 0; i < stock_dispo.length;i++){
        sum_stock_dispo += parseInt(stock_dispo[i]);
    }
    sum_stock_dispo -= sum_stock_epuise;
    console.log(sum_stock_dispo);

    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{data: [sum_stock_epuise,sum_stock_dispo],
                backgroundColor:[
                '#f21b1b',
                '#1bf26d'
            ]},
        ],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Stock épuisé',
                'Stock disponible'
            ]
        },
    });

    return chart
}