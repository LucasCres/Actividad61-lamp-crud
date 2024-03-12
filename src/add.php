<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Alta de jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <header>
        <h1 class="mt-5">Panel de Control</h1>
    </header>

    <main class="mt-4">                
        <?php
        include_once("config.php");

        if(isset($_POST['inserta'])) 
        {
            $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
            $apellido = mysqli_real_escape_string($mysqli, $_POST['apellido']);
            $tantos_marcados = mysqli_real_escape_string($mysqli, $_POST['tantos_marcados']);
            $puesto = mysqli_real_escape_string($mysqli, $_POST['puesto']);
            $clase = mysqli_real_escape_string($mysqli, $_POST['clase']);

            if(empty($nombre) || empty($apellido) || empty($tantos_marcados) || empty($puesto) || empty($clase)) 
            {
                echo "<div class='alert alert-danger' role='alert'>Por favor, complete todos los campos.</div>";
            } else {
                $stmt = mysqli_prepare($mysqli, "INSERT INTO jugadores (nombre, apellido, tantos_marcados, puesto, clase) VALUES (?, ?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt, "ssdis", $nombre, $apellido, $tantos_marcados, $puesto, $clase);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_free_result($stmt);
                mysqli_stmt_close($stmt);

                echo "<div class='alert alert-success' role='alert'>Datos añadidos correctamente</div>";
                echo "<a href='index.php' class='btn btn-primary'>Ver resultado</a>";
            }
        }

        mysqli_close($mysqli);
        ?>
    </main>
    <footer class="mt-5">
        <p>Created by the IES Miguel Herrero team &copy; 2024</p>
    </footer>
</div>
</body>
</html>
