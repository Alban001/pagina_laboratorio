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
    $query = "SELECT * FROM users WHERE username='$username' AND password = '$password'";
    $result = $conn->query($query);

    if($result->num_rows == 1){
        // Login aceptado
        header("Location: aceptado.html");
        exit();
    }else{
        // Login rechazado
        header("Location: error.html");
        exit();
    }
    $conn->close();
}

?>