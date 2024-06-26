<?php
 session_start();
 if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css?v=<?php echo time(); ?>">
    
    <title>Buscar productos</title>
</head>
<body>
    <header>
        <nav>
        <div class="container-nav">
        <form method="post">
        <button type="submit" name="cliente">Buscar Cliente</button>
        <button type="submit" name="producto">Busqueda Producto</button>
        <button type="submit" name="orden">Ver Orden</button>
       
    </form>
        </div>
        <li><a href="cerrar_session.php">Cerrar Sesión</a></li></nav>
    </header>
    
    <div class="container-buscarproducto">
    <h1 style='color:white;'>Buscar Clientes</h1>
    <form action="" method="GET">
        <input type="text" name="keyword" placeholder="Ingresa ruc del cliente...">
        <button type="submit" >Buscar</button>
    </form>
    </div>
    <?php
    
// Establecer coneccion
$host = "190.104.140.200";
$dbusername = "root";
$dbpassword = "root*2020";
$dbname = "colorcitypro";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Checkea coneccion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proceso de solicitud de busqueda
if (isset($_GET['keyword'])) {

    


    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM Customer
    WHERE TaxRegNr LIKE '%$keyword%' OR Name LIKE  '%$keyword%'
    GROUP BY Code";
    echo $result;
    $result = $conn->query($sql);


    if ($result->num_rows> 0) {

        
        echo "<table class='table-class' border='8'>";
        echo "<thead>";
                echo"<tr>";
                     echo "<th scope='col'>Código</th>";
                     echo "<th scope='col'>Nombre</th>";
                     echo "<th scope='col'>Ruc</th>";
                 echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {       
           echo "<tr>";
                    echo "<th>" . $row['Code'] . "</th>";
                    echo "<th>" . $row['Name'] . "</th>";
                    echo "<th>" . $row['TaxRegNr'] . "</th>";
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