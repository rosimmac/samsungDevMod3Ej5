<!DOCTYPE html>
<html>
<head>
    <title>Formulario PHP</title>
    <link rel="stylesheet" type="text/css" <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">

</head> 
<body class="container" >



    <form method="post" action="" class="caja">
        <h2>Formulario de Registro</h2>

        <div class="form-group">

            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required><br><br>

        </div>
        
        <div class="form-group">

            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" name="apellido" id="apellido" required><br><br>

        </div>
        <div class="form-group">

            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required><br><br>

        </div>

        <input type="submit" class="btn btncolor" name="submit" value="Registrar">

        <div style>
            <?php
                // Verificar si el formulario ha sido enviado
                if ($_POST) {
                    // Recuperar los valores del formulario
                    $nombre = $_POST["nombre"];
                    $apellido = $_POST["apellido"];
                    $email = $_POST["email"];

                    //Conexión con PDO
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cursosql";


                    //Crear conexión

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    //Check connection

                    if($conn->connect_error){
                        die("connection failed: " . $conn->connect_error);
                    }

                    $sql = "INSERT INTO usuario (nombre, apellido, email)
                    VALUES ('$nombre','$apellido', '$email')";
                        

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created succesfully";
                    } else {
                        echo "Error: ". $sql . "<br>" . $conn->error;
                    }

                    $conn->close();


                }
            ?>
        </div>
    

    
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</body>
</html>
