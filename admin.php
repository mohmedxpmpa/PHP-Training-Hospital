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

<?php
$servername   = "localhost";
$username     = "root";
$password     = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=php-hospital", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

?>