<?php 

session_start();
if(isset($_SESSION['username'])){
    header("Location: buscarProduct.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="styles/styles.css"></link>
    <title>Login</title>

    <script>
        var entrada = document.getElementById("myInput");
        var text = document.getElementById("may");
        entrada.addEventListener("keyup", function(event) {

        if (event.getModifierState("CapsLock")) {
        text.style.display = "block";
        } else {
        text.style.display = "none";
        }
        });
    </script>

    <style>
        
        body{
            background-color: rgba(39, 109, 136, 0.93);
        }
        .container-login{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:10%;
        }
        input{
            max-width: 300px;
            min-width: 300px;
        }
        #may{
            display:none;
            color:red;
            padding:2px;
        }
    </style>
    
</head>
<body>
<p id="may">Botón Mayúscula presionada!</p>
    <div class="container-login">
            <div class="row justify-content-center">
                <form action="login.php" method="POST">
                            <input type="text" name="username" class="form-control" placeholder="Ingresa un nombre" ><br>
                            <input type="password" name="password" class="form-control" placeholder="Ingresa una contraseña" id="myInput"><br>
                            <input type="submit" value="Login" class="btn btn-success" >
                        </form>
                    </div>
            </div>
    </div>
   
</body>
</html>