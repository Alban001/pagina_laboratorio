<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/formulario.css?v=<?php echo time(); ?>">
  <title>Simple HTML Table</title>
</head>
<body>
  <div class="tbl-container">
  <h2>Dato Clientes</h2>
  <table class="tabla-clientes" border="1">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Ruc</th>
        <th>Celular</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>item</td>
        <td>item</td>
        <td>item</td>
      </tr>
    </tbody>
  </table>
  <h2>Dato Artículos</h2>
  <table class="tabla-articulos" border="1">
    <thead>
      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
        <th>Eliminar Item</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>item</td>
        <td>item</td>
        <td></td>
        <td>item</td>
        <th><img src='trash.png' height=30 width=30 ></img></th>
      </tr>
    </tbody>
  </table>
  <div class="buttons">
  <button>Seguir Cargando</button>
      <h1>TOTAL</h1>
  <button id="enviar">Enviar orden</button>
  </div>
  <a href="buscarProduct.php"><button>Ir a Productos</button></a>
  <a href="buscarCliente.php"><button>Ir a Clientes</button></a>
  </div>
  
</body>
</html>