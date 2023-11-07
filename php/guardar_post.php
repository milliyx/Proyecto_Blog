<?php
// Conéctate a tu base de datos (ajusta las credenciales)
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta para obtener los posts de la base de datos
$sql = "SELECT titulo, contenido, imagen FROM posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Posts</title>
</head>
<body>
    <h1>Posts Recientes</h1>
    
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p>" . $row["contenido"] . "</p>";
            echo '<img src="' . $row["imagen"] . '" alt="Imagen del post" width="300"><br>';
        }
    } else {
        echo "No hay posts disponibles.";
    }

    $conn->close();
    ?>
</body>
</html>
