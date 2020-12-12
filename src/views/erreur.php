<?php
ob_start();?>

<div class="alert alert-danger mt-5 shadow-none text-center" role="alert">
    Snif, une erreur est survenue
    Code d'erreur : <strong><?=filter_input(INPUT_GET,'err_msg')?></strong><br>
    Vous pouvez contacter le <a href='mailto:matthieu.bouchet@outlook.com'>support</a>
</div>

<img class='ml-auto mr-auto d-block' src='./public/img/error_image.jpg' />

<?php
$content = ob_get_clean();
require_once 'template.php';