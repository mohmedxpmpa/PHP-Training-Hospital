<?php
    require "include/header.php";

?>

<table>
    <th>الرقم</th>
    <th>اسم المريض</th>
    <th>البريد الاكتروني</th>
    <th>التاريخ</th>



<?php

try {

    // connect to mysql

    $pdoConnect   = new PDO("mysql:host=localhost;dbname=php-hospital","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
} catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
}

// Get patient information from Database

$data = $pdoConnect ->query("SELECT * FROM patient")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $row) {
  //  echo $row['name']."<br />\n";
     echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['date'] . "</td></tr>";
}
echo "</table>";


?>