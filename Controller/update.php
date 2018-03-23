<?php
require_once('../Model/utils.php');
if(isset($_POST['submit'])){
    if(isset($_POST['id']) && isset($_POST['estadoForm'])){
        $zombi = $_POST['id'];
        $estado = $_POST['estadoForm'];
        
        if(updateZombi($zombi, $estado)){
            header('Location: ../index.php');
        }else{
            echo "asdfadf";
        }
    }
}
?>