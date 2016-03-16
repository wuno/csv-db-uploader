<?php
require_once('Dbconfig.php');

$limit  = (intval($_GET['limit']) != 0) ? (int) $_GET['limit'] : 15;
$offset = (intval($_GET['offset']) != 0) ? (int) $_GET['offset'] : 0;


try {
    $stmt = $DB_con->prepare("SELECT * FROM $table_name LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll();
}
catch (Exception $ex) {
    echo $ex->getMessage();
}
if (count($results) > 0) {
    foreach ($results as $res) {
        echo '<tr class="invent">';
        echo '<td>' . $res['wuno_product'] . '</td>';
        echo '<td>' . $res['wuno_alternates'] . '</td>';
        echo '<td>' . $res['wuno_description'] . '</td>';
        echo '<td>' . $res['wuno_onhand'] . '</td>';
        echo '<td>' . $res['wuno_condition'] . '</td>';
        echo '</tr>';
    }
}
?> 