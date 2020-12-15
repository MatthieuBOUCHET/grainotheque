<?php
include('../include/phpqrcode.php');

$id = filter_input(INPUT_GET,'id');
$categorie = filter_input(INPUT_GET,'categorie');
$url_qr = ('http://grainotheque/index.php?action=details&categorie='.$categorie.'&id='.$id);

QRcode::png($url_qr);