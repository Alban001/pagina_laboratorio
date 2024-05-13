<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Traer datos de formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // conexion con la base de datos

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "tienda";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Conection failed: ". $conn->connect_error);
    }
    // Validadcion de login

    $pass = md5($password);  // encriptacion con md5 
    
    
    $query = "SELECT * FROM users WHERE Code='$username' AND password = '$pass'";
    echo $query;
    $result = $conn->query($query);

    if($result->num_rows == 1){
        // Login aceptado
       
        header("Location: buscarProduct.php");
        exit();
    }else{
        // Login rechazado
        header("Location: error.html");
        exit();
    }
    $conn->close();
}

?>