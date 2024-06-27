<?php
  session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Traer datos de formulario
    $username = $_POST['username'];
    $password = $_POST['password'];


    $host = "190.104.140.200";
    $dbusername = "root";
    $dbpassword = "root*2020";
    $dbname = "colorcitypro";

    $conn =  new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Conection failed: ". $conn->connect_error);
    }
    // Validadcion de login

    $pass = md5($password);  // encriptacion con md5 
    
    
    $query = "SELECT * FROM User WHERE Code='$username' AND Password = '$pass'";
    
    echo $query;
    $result = $conn->query($query);

    if($result->num_rows == 1){
        // Login aceptado

        $_SESSION['username'] = $username;

        header("Location: buscarProduct.php");
        exit();
    }else{
        // Login rechazado
        echo $query;
        header("Location: error.php");
        exit();
    }
    $conn->close();
}?>