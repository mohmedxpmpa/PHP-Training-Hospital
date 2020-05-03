<?php
    require "include/header.php";

?>

<table>
    <th>الرقم</th>
    <th>اسم المريض</th>
    <th>البريد الاكتروني</th>
    <th>التاريخ</th>
</table>



<?php
$servername   = "localhost";
$username     = "root";
$password     = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=php-hospital", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

// Insert patient information 

$data = [
    'name' => $name,
    'surname' => $surname,
    'sex' => $sex,
];
$sql = "INSERT INTO patient (name, surname, sex) VALUES (:name, :surname, :sex)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);

// Get patient information from Database

/* $stmt = $conn->query("SELECT * FROM patient");
while ($row = $stmt->fetch()) {
    echo $row['name']."<br />\n";
} */

$data = $conn->query("SELECT * FROM patient")->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    echo $row['name']."<br />\n";
}

?>