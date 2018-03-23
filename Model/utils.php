<?php
function connect() {
    $mysql = mysqli_connect("localhost","root","","dharma");
    $mysql->set_charset("utf8");
    return $mysql;
}

function disconnect($mysql) {
    mysqli_close($mysql);
}

function getFullList(){
    $db = connect();
        if($db != NULL){
            $query="SELECT *
                    FROM registros
                    ORDER BY datetime DESC";
            // Preparing the statement 
            if (!($stmt = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
             // Executing the statement
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
             } 
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('error');
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $table[$i]['id'] = $row['id'];
                $table[$i]['date'] = $row['datetime'];
                $table[$i]['entrada'] = $row['entrada'];
                $table[$i]['status'] = $row['STATUS'];
                $i += 1;
            }
            disconnect($db);
            return $table; 
        }
    return false;
}
/*
function getById($id){
    $db = connect();
    if($db != NULL){
        $query="SELECT zombi.id, zombi.nombre,  estado.id as `idEstado`, estado.nombre as `estado`
                FROM zombi, estado_zombi R, estado
                WHERE zombi.id=R.idZombi AND estado.id=R.idEstado
                AND zombi.id=?";
        // Preparing the statement 
        if (!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$stmt->bind_param("i", $id)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error); 
        }
         // Executing the statement
        if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
         } 
        $stmt->store_result();
        if($stmt->num_rows !== 0){
            $stmt->bind_result($id, $zombi, $idEstado, $estado);
            $stmt->fetch();
            $result["id"] = $id;
            $result["zombi"] = $zombi;
            $result["idEstado"] = $idEstado;
            $result["estado"] = $estado;
            disconnect($db);
            return $result;
        }else{
            disconnect($db);
        }
    }
    return false;
}

function getEstados(){
    $db = connect();
    if($db != NULL){
        $query="SELECT *
                FROM estado";
        $results = $db->query($query);
        disconnect($db);
        return $results;
    }
    return false;
}
*/
function searchByEstado($id){
    if($id !== "0"){
        $db = connect();
        if($db != NULL){
            $query="SELECT *
                    FROM registros
                    WHERE STATUS=?
                    ORDER BY datetime DESC";
            // Preparing the statement 
            if (!($stmt = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$stmt->bind_param("s", $id)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error); 
            }
             // Executing the statement
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
             } 
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('error');
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $table[$i]['id'] = $row['id'];
                $table[$i]['date'] = $row['datetime'];
                $table[$i]['entrada'] = $row['entrada'];
                $table[$i]['status'] = $row['STATUS'];
                $i += 1;
            }
            disconnect($db);
            return $table; 
        }
        return false;
    }else{
        return getFullList();
    }
}

function insert($entrada, $status){
    $db = connect();
    if($db != NULL){
        $query='INSERT INTO registros (entrada, STATUS) VALUES (?, ?) ';
        if (!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$stmt->bind_param("ss", $entrada, $status)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error); 
        }   
         // Executing the statement
        if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        
        disconnect($db);
        return true;
    }
    return false;
}
function reporte(){
    $db = connect();
    if($db != NULL){
        $query="SELECT STATUS, COUNT(*) as 'cantidad'
                FROM registros
                GROUP BY STATUS";
        if (!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        } 
         // Executing the statement
        if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $result = $stmt->get_result();
        if($result->num_rows === 0) $table[0]="No hay zombis";
        while($row = $result->fetch_assoc()) {
            $table[$row['STATUS']] = $row['cantidad'];
        }
        disconnect($db);
        return $table; 
    }
    return false;
}
/*
function updateZombi($zombi, $estado){
    $db = connect();
    if($db != NULL){
        $query="UPDATE estado_zombi SET idEstado = ?, datetime = CURRENT_TIMESTAMP WHERE idZombi = ?";
        // Preparing the statement 
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$stmt->bind_param("ii", $estado, $zombi)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error); 
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        } 
        return true;
    }
    return false;
}*/
?>