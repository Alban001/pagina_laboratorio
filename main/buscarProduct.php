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
    <link rel="stylesheet" href="../styles/styles.css?v=<?php echo time(); ?>">
    
    <title>Buscar productos</title>
</head>
<body>
    <header>
        <nav>
        <div class="container-nav">
             <a href="buscarCliente.php"><input type='submit' name='cliente' value='cliente' placeholder='Buscar Cliente' /></a>
   
             <a href="buscarProduct.php"><input type='submit' name='producto' value='producto' placeholder='Buscar Producto' /></a>
     
            <a href="formulario.php" ><input type='submit' name='orden' value='orden' placeholder='Ver Orden' /></a>
        </div>
        <li><a href="cerrar_session.php">Cerrar Sesión</a></li></nav>
    </header>
    
    <div class="container-buscarproducto">
    <h1 style='color:white;'>Buscar Productos/Servicios</h1>
    <form action="" method="GET">
        <input type="text" name="keyword" placeholder="Ingresa el producto...">
        <button type="submit" >Buscar</button>
    </form>
    </div>

        <!--MODAL-->

        <div class="modal"  id="myModal" >
             <div class="modal-content">
             <span class="close">&times;</span>
             <p>Ingresa cantidad</p> 
            <input type="number" value='numero' > <button>enviar</button> 
             </div>
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
    $sql = "SELECT it.*, SUM(st.Qty) Stock FROM Item it 
        LEFT JOIN Stock st ON st.ArtCode = it.Code
    WHERE it.Name LIKE '%$keyword%' OR it.Code LIKE  '%$keyword%'
    GROUP BY it.Code";
    $result = $conn->query($sql);


    if ($result->num_rows> 0) {

        
        echo "<table class='table-class' border='8'>";
        echo "<thead>";
                echo"<tr>";
                     echo "<th scope='col'>Cart</th>";
                     echo "<th scope='col'>Codigo</th>";
                     echo "<th scope='col'>Nombre</th>";
                     echo "<th scope='col'>Precio</th>";
                     echo "<th scope='col'>Qty</th>";
                 echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {       
           echo "<tr>";
                    echo "<th class='openModalBtn'><img src='../img/cart.png' height=40 width=40 ></img></th>";
                    echo "<th>" . $row['Code'] . "</th>";
                    echo "<th>" . $row['Name'] . "</th>";
                    echo "<th>" . $row['Price'] . "</th>";
                    echo "<th>" . $row['Stock'] . "</th>";
            echo "</tr>";
            
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        header("Location: notfound.php");
        exit();
    }
}

$conn->close();
?>
<script src="../scripts/scripts.js"></script>
</body>
</html>
