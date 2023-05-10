<?php
include 'header-json.php';

$json = file_get_contents('php://input');
$donneesFormulaire = json_decode($json, TRUE);

var_dump($donneesFormulaire);