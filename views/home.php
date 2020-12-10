<?php
ob_start();
?>
<div class="card mb-3">
    <img src="../public/img/home_load.jpg" class="ml-auto mr-auto home"/>
    <div class="card-body">
        <h5 class="card-title">Système de gestion de grainothèque</h5>
        <p class="card-text">Lucca HOOGENBOSCH - Matthieu BOUCHET - 2020</p>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';