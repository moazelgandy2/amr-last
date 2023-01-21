<?php
	require_once 'connect.php';

session_start();
                
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../index.php");
    die();
}
$link = mysqli_connect("localhost", "root", "moaz", "u838827957_amr");

$code=$_POST["activeac"];

$query = mysqli_query($conn, "SELECT * FROM `code` WHERE `code` = '$code' && `status` = 'Vaild'") or die(mysqli_error());
$count = mysqli_num_rows($query);
$fetch = mysqli_fetch_array($query);
$array = array();
if($count > 0){
    $sql = "UPDATE `code` SET `status`='invalid' WHERE code='$code'";
    $sql2 = "UPDATE `users` SET `status`='Yes' WHERE email='{$_SESSION['SESSION_EMAIL']}'";
    if(mysqli_query($link, $sql)){
        $ms= "Your Account Has Been Sucessfully Activated";
        $Color = "#22c55e";

        // echo '<div style="Color:'.$Color.'">' .'<h1>'.$ms.'</h1>'.'</div>';
    } 
    if(mysqli_query($conn, $sql2)){
        // $ms2="Has Been Sucessfully Activated";
        // $Color = "#22c55e";

        // echo '<div style="Color:'.$Color.'">'.$ms2.'</div>';
        
    } 
}else {
    $ms= "Invalid Code";
//    die();



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="1;URL='../index.php'">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/framework.css"/>
    <link rel="stylesheet" href="../profile/css/master.css"/>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/logo3.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;5O0&display=swap" rel="stylesheet"/>
</head>
<body>
    <h1 style="    text-align: center;
    postion:fixed; bottom:0;"> <?php echo $ms ?></h1>
</body>
</html>