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

$sql = "select 
	1 as memberId, 1 as parentId  ,'DEISTER' as otherInfo 
from departamento
WHERE id_dep = 2
UNION ALL
select 
	id_dep as memberId, id_comp as parentId  ,nombre as otherInfo 
from departamento

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
