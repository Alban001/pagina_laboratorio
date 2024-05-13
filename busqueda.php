<link rel="stylesheet" href="styles.css">
<?php
// Establecer coneccion
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Checkea coneccion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proceso de solicitud de busqueda
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM item WHERE Name LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1 style='margin-top:3rem;'>LISTADO DE BUSQUEDA <h1>";
        echo "<table border='5'>";
        while ($row = $result->fetch_assoc()) {
           echo "<tr>";
                    echo "<th>NOMBRE PRODUCTO: </th>";
                    echo "<th>" . $row['Name'] . "</th>";
                    echo "<th>CODIGO: </th>";
                    echo "<th>" . $row['Code'] . "</th>";
                    echo "<th>PRECIO: </th>";
                    echo "<th>" . $row['Precio'] . "</th>";

            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontró.";
    }
}

$conn->close();
?>
