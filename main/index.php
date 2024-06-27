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
    <link href="./styles/styles.css"></link>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            background-color: rgba(27, 72, 90, 0.93);  
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
                            <input type="text" name="username" class="form-control" placeholder="Ingresa un nombre"><br>
                            <input type="password" name="password" class="form-control" placeholder="Ingresa una contraseña" id="myInput"><br>
                            <input type="submit" value="Login" class="btn btn-success" >
                        </form>
                    </div>
            </div>
    </div>
</body>
</html>