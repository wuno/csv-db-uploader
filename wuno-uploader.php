<?php
require_once('Dbconfig.php');

    $csv_file = "inventory.csv";
    
    try {
        $sql = "DROP TABLE IF EXISTS " . $table_name;
        $DB_con->query($sql);
        
        $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
	  id int(8) NOT NULL AUTO_INCREMENT,
	  wuno_product varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	  wuno_description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	  wuno_alternates varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	  wuno_onhand varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	  wuno_condition varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	  PRIMARY KEY  (id)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
        $DB_con->query($sql);
        
        file_put_contents($csv_file, preg_replace("@(\r\n),@", ',', file_get_contents($csv_file)));
        if (($handle = fopen($csv_file, "r")) !== FALSE) {
            fgetcsv($handle);
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                $num = count($data);
                for ($c = 0; $c < $num; $c++) {
                    $col[$c] = $data[$c];
                }
                
                $col1 = $col[0];
                $col2 = $col[1];
                $col3 = $col[2];
                $col4 = $col[3];
                $col5 = $col[4];
                
                $sql = $DB_con->prepare("INSERT INTO " . $table_name . "(wuno_product, wuno_description, wuno_alternates, wuno_onhand, wuno_condition) VALUES (:col1, :col2, :col3, :col4, :col5)");
                $sql->bindParam(':col1', $col1);
                $sql->bindParam(':col2', $col2);
                $sql->bindParam(':col3', $col3);
                $sql->bindParam(':col4', $col4);
                $sql->bindParam(':col5', $col5);
                $sql->execute();
            }
            fclose($handle);
        }
        if ($sql->execute()) {
            echo "<script type= 'text/javascript'>alert('New Inventory Was Inserted Successfully');</script>";
        } else {
            echo "<script type= 'text/javascript'>alert('Data was not successfully Inserted.');</script>";
        }
        $dbh = null;
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
header("Location: index.php");  
?>