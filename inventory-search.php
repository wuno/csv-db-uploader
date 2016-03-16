<?php
require_once('Dbconfig.php');

$limit  = (intval($_GET['limit']) != 0) ? $_GET['limit'] : 15;
$offset = (intval($_GET['offset']) != 0) ? $_GET['offset'] : 0;

if (!empty($_POST["itemID"])) {
    $sql = " SELECT * FROM $table_name WHERE wuno_product like ? OR wuno_alternates like ? ORDER BY wuno_product ASC LIMIT $limit OFFSET $offset ";
    try {
        $stmt = $DB_con->prepare($sql);
        $stmt->execute(array(
            '%' . $_POST['itemID'] . '%',
            '%' . $_POST['itemID'] . '%'
        ));
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
}
?>

