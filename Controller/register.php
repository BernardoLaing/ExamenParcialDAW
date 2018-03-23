<?php  
session_start();
require_once('../Model/utils.php');
$valid = "4 8 15 16 23 42";
$timeout= 6480;
if(isset($_POST['submit'])){
    $entrada="";
    $status="";
    echo $_SESSION['start'] . "<br />";
    echo $timeout . "<br />";
    echo time() . "<br />";
    if(isset($_SESSION["active"]) &&
        ($_SESSION['start'] + $timeout) > time()){
        echo "active<br />" . $_SESSION["id"] . "<br />" . session_id() . "<br />";
        if(isset($_POST['codigo'])){
            echo "entrada<br />";
            $entrada = htmlspecialchars($_POST['codigo']);
            if($entrada === $valid){
                echo "succes<br />";
                $status="SUCCESS";
            }else{
                echo "failure<br />";
                $status="SYSTEM FAILURE";
            }
        }else{
            $entrada = "";
            $status="SYSTEM FAILURE";
        }
    }else{
        echo "not active<br />";
        $entrada = "";
        $status="SYSTEM FAILURE";
    }
    if(insert($entrada, $status)){
        echo $entrada . " <br /> " . $status;
        header('Location: ../index.php');
    }
}
?>