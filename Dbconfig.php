<?php
    $db_host   = '<HOST-NAME>';
    $db_user   = '<DB-USERNAME>';
    $db_pass   = '<DB-PASSWORD>';
    $db_name   = '<DB-NAME>';
    $table_name = "<DB-TABLE-NAME>";
try
{
     $DB_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $exception)
{
     echo $exception->getMessage();
}
?>