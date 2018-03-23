<?php
    include("../Model/utils.php");
    if(count($_GET)>0 && isset($_GET["estado"])){
        //set User
        
        $results = searchByEstado($_GET["estado"]);
        if($results != NULL){
            $json = json_encode($results);
            echo $json;
        }else{ echo "error"; }
    }
?>