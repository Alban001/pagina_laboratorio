<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/busqueda.css?v=<?php echo time(); ?>">
    
    <title>Buscar productos</title>
</head>
<body>
    <header><nav><li><a href="cerrar_session.php">Cerrar Sesión</a></li></nav></header>
    <div class="container">
    <h1 style='color:white;'>Buscar Productos/Servicios</h1>
    <form action="" method="GET">
        <input type="text" name="keyword" placeholder="Ingresa el producto...">
        <button type="submit" >Buscar</button>
    </form>
    </div>
    <?php
      session_start();
// Establecer coneccion
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "laboratoriodev";

$conn = new mysqli($servername, $username, $password, $dbname);

// Checkea coneccion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proceso de solicitud de busqueda
if (isset($_GET['keyword'])) {

    


    $keyword = $_GET['keyword'];
    $sql = "SELECT it.*, SUM(st.Qty) Stock FROM item it 
        LEFT JOIN Stock st ON st.ArtCode = it.Code
    WHERE it.Name LIKE '%$keyword%' OR it.Code LIKE  '%$keyword%'
    GROUP BY it.Code";
    $result = $conn->query($sql);


    if ($result->num_rows> 0) {

        
        echo "<table class='table-class' border='8'>";
        echo "<thead>";
                echo"<tr>";
                     echo "<th scope='col'>Codigo</th>";
                     echo "<th scope='col'>Nombre</th>";
                     echo "<th scope='col'>Precio</th>";
                     echo "<th scope='col'>Qty</th>";
                 echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {       
           echo "<tr>";
                    echo "<th>" . $row['Code'] . "</th>";
                    echo "<th>" . $row['Name'] . "</th>";
                    echo "<th>" . $row['Price'] . "</th>";
                    echo "<th>" . $row['Stock'] . "</th>";
            echo "</tr>";
            echo "</tbody>";
        }
       
        echo "</table>";
    } else {
        header("Location: notfound.php");
        exit();
    }
}

$conn->close();
?>

</body>
</html>
