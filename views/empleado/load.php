<?php

function getConnection() {
    $dbhost = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "recursoshumanos";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

$sql = "select id_emp as memberId,
    jefe_directo as parentId ,nombre as otherInfo, imagen 
    from empleado 
    WHERE jefe_directo IS NOT NULL

";
try {
    $db = getConnection();
    $stmt = $db->query($sql);
    $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    echo json_encode($wines);
} catch (PDOException $e) {
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}
?>
