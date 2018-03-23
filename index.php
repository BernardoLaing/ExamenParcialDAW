<?php
session_start();
$_SESSION["active"] = 1;
$_SESSION["start"] = time();
require_once('Model/utils.php');
include('Templates/partials/_header.html');

$List=getFullList();

/*
$estados=getEstados();
$estadosForm=getEstados();
$estadosEdit=getEstados();*/
$reporte=reporte();
/*foreach($List as $key => $value){
    foreach($value as $row => $field)
    echo "--" . $row . "--" .$field . "<br>";
}*/
include('Templates/index.html');

include('Templates/partials/_footer.html');
?>