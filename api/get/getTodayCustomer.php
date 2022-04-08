<?php
    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');
    include "../model/database.php";
    
    //SQL lekérdezés elkészítése
    $sql = "SELECT COUNT(*) AS Ossz FROM `vetitites` INNER JOIN foglalas ON foglalas.vetitesid = vetitites.vetitesid WHERE datum = DATE(NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    if(count($result)> 0){
        echo json_encode($result);
    }
    else{
        $tmp = array();
        $tmp['message'] = "Nincs adat vagy hiba történt";
        echo json_encode($tmp);
    }
    $conn = null;
?>