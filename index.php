<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Al Shifa Hospital</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main">
        <div class="logo">
            <img src="images/hospital-logo.jpg">
            <h2>مستشفي الشفاء</h2>
        </div>

        <div class="book">
            <p>اهلا بك في مستشفي الشفاء , للحجز اكتب بياتاتك في الاستماره ادناه</p>
            <form method="post" action="">
                <input type="text" name="name" id="" value="" placeholder="ادخل الأسم">
                <input type="text" name="email" id="" value="" placeholder="ادخل البريد الالكتروني">
                <input type="date" name="date" id="" value="">
                <input type="submit" value="احجز الان" name="send">
            </form>

<?php
    // php insert data to mysql database using PDO
    if(isset($_POST['send']))
    {
        try {

            // connect to mysql

            $pdoConnect   = new PDO("mysql:host=localhost;dbname=php-hospital","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            exit();
        }

        // get values form input text and number
        $email            = $_POST['email'];
        $date             = $_POST['date'];
        
        // mysql query to insert data

        $pdoQuery         = "INSERT INTO `patient`(`name`, `email`, `date`) VALUES (:name,:email,:date)";
        
        $pdoResult        = $pdoConnect->prepare($pdoQuery);
        
        $pdoExec          = $pdoResult->execute(array(":name"=>$name,":email"=>$email,":date"=>$date));
        
            // check if mysql insert query successful
        if($pdoExec)
        {
            echo 'تم الحجز بنجاح';
        }else{
            echo 'عفوا حدث خطا ما , حاول مره اخري';
        }
    }
 ?>

        </div>
    </div>

    <script src="" async defer></script>

</body>

</html>