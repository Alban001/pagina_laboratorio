<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="styles/busqueda.css"></link>
    <title>Login</title>
    <style>
        body{
            background-color: rgba(39, 109, 136, 0.93);
        }
        .container{
            margin-top: 150px;
            padding-left:32%;
        }
        input{
            max-width: 300px;
            min-width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="row justify-content-center">
                <form action="login.php" method="POST">
                            <input type="text" name="username" class="form-control" placeholder="Ingresa un nombre"><br>
                            <input type="password" name="password" class="form-control" placeholder="Ingresa una contraseña"><br>
                            <input type="submit" value="Login" class="btn btn-success">
                        </form>
                    </div>
            </div>
    </div>
</body>
</html>