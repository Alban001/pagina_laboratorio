<link rel="stylesheet" href="table.css">
<?php
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

    
    echo "<h1 class='title'>LISTADO DE BUSQUEDA <h1>";
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
        header("Location: notfound.html");
        exit();
    }
}

$conn->close();
?>
