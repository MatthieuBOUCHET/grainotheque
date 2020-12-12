<?php
ob_start();
?>
<div class="card mb-3">
    <img src="../public/img/home_load.jpg" class="ml-auto mr-auto home"/>
    <div class="card-body">
    </div>
</div>

<div class="container" id='cont-stats' >
    <h2 class="text-center mt-1">Statistiques</h2>
    <div class="d-flex justify-content-between charts">
        <div class="graph w-50">
            <h4 class="text-center">Répartition</h4>
            <canvas id='repartition'></canvas>
            <script>
                var ctx = $('#repartition');
                var graph_1 = repartition_graph(ctx,getCookie('repartition'));
            </script>
        </div>
        
        <div class="graph w-50">
            <h4 class="text-center">Stocks</h4>
            <canvas id='stock'></canvas>
            <script>
                var ctx = $('#stock');
                var graph_2 = stock_graph(ctx,getCookie('stock'));
            </script>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';