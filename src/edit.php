<?php
include_once("config.php");

if(isset($_POST['modifica'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($mysqli, $_POST['apellido']);
    $tantos_marcados = mysqli_real_escape_string($mysqli, $_POST['tantos_marcados']);
    $puesto = mysqli_real_escape_string($mysqli, $_POST['puesto']);
    $clase = mysqli_real_escape_string($mysqli, $_POST['clase']);

    if(empty($nombre) || empty($apellido) || empty($tantos_marcados) || empty($puesto) || empty($clase)) {
        echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
    } else {
        $stmt = mysqli_prepare($mysqli, "UPDATE jugadores SET nombre=?, apellido=?, tantos_marcados=?, puesto=?, clase=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssiiis", $nombre, $apellido, $tantos_marcados, $puesto, $clase, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);

        header("Location: index.php");
    }
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($mysqli, $id);

$stmt = mysqli_prepare($mysqli, "SELECT nombre, apellido, tantos_marcados, puesto, clase FROM jugadores WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nombre, $apellido, $tantos_marcados, $puesto, $clase);
mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Modificación Jugador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-table {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>

<body>
<div class="container container-table">
    <header>
        <h1>Panel de Control</h1>
    </header>
    
    <main>                
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="add.html">Alta</a></li>
    </ul>
    <h2>Modificación Jugador</h2>
    <form action="edit.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre;?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $apellido;?>" required>
        </div>

        <div class="form-group">
            <label for="tantos_marcados">Tantos Marcados</label>
            <input type="number" class="form-control" name="tantos_marcados" id="tantos_marcados" value="<?php echo $tantos_marcados;?>" required>
        </div>

        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="number" class="form-control" name="puesto" id="puesto" value="<?php echo $puesto;?>" required>
        </div>

        <div class="form-group">
            <label for="clase">Clase</label>
            <input type="text" class="form-control" name="clase" id="clase" value="<?php echo $clase;?>" required>
        </div>

        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="submit" name="modifica" class="btn btn-primary" value="Guardar">
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
    </main>    
    <footer>
        Created by the IES Miguel Herrero team © 2024
    </footer>
</div>
</body>
</html>
