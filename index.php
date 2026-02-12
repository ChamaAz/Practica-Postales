<?php
session_start(); // Iniciar sesión para almacenar los valores entre peticiones
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Envío de Postales</title>
 <style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #fdf2f8, #eef2ff);
    margin: 0;
    padding: 40px;
    color: #2c3e50;
}

h1, h2 {
    text-align: center;
    color: #4f46e5;
}

form {
    max-width: 700px;
    margin: auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.12);
}

label {
    font-weight: 600;
}

select {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border-radius: 10px;
    border: 1px solid #dcdcdc;
    font-size: 16px;
}

/* Botones */
button {
    width: 100%;
    padding: 14px;
    margin-top: 20px;
    border-radius: 12px;
    border: none;
    background: linear-gradient(135deg, #6366f1, #ec4899);
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Contenedor de imágenes */
.imagenes {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.imagen-container {
    background: #f9fafb;
    border-radius: 12px;
    padding: 10px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: transform 0.2s;
}

.imagen-container:hover {
    transform: scale(1.05);
}

.imagen-container img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
}

.imagen-container input {
    margin-top: 8px;
}

/* Correos */
.lista-correos {
    margin-top: 20px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 10px;
}

.correo-container {
    background: #f3f4f6;
    padding: 10px 12px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

.correo-container label {
    cursor: pointer;
}

/* Imágenes seleccionadas */
.imagenes img {
    border: 3px solid #ec4899;
}

</style>

</head>
<body>
    <h1>Envío de Postales</h1>
    <form method="POST" action="index.php">
        <!-- Paso 1: Selección de Tema -->
        <label for="tema">Selecciona un tema:</label>
        <select name="tema" id="tema" required>
            <option value="">-- Selecciona un tema --</option>
            <option value="navidad" <?php if (isset($_POST['tema']) && $_POST['tema'] == 'navidad') echo 'selected'; ?>>Navidad</option>
            <option value="cumpleaños" <?php if (isset($_POST['tema']) && $_POST['tema'] == 'cumpleaños') echo 'selected'; ?>>Cumpleaños</option>
            <option value="aniversario" <?php if (isset($_POST['tema']) && $_POST['tema'] == 'aniversario') echo 'selected'; ?>>Aniversario</option>
        </select>
        <button type="submit" name="step" value="1">Mostrar imágenes</button>

        <?php
        // Si se seleccionó un tema, mostramos las imágenes
        if (isset($_POST['tema'])) {
            $tema = $_POST['tema'];
            $_SESSION['tema'] = $tema; // Guardamos el tema en la sesión
            $carpetaTemas = 'temas'; // Carpeta donde se almacenan las imágenes
            $carpetaTema = "$carpetaTemas/$tema";

            if (is_dir($carpetaTema)) {
                $imagenes = array_diff(scandir($carpetaTema), array('.', '..'));
                echo '<h2>Imágenes del Tema Seleccionado:</h2>';
                echo '<div class="imagenes">';
                foreach ($imagenes as $imagen) {
                    $rutaimagen = "$carpetaTema/$imagen";
                    echo "<div class='imagen-container'>";
                    echo "<img src='$rutaimagen' alt='$imagen'>";
                    echo "<input type='checkbox' name='selected_imagenes[]' value='$rutaimagen'>"; // Checkboxes para las imágenes
                    echo "</div>";
                }
                echo '</div>';
            } else {
                echo '<p>No hay imágenes para este tema.</p>';
            }
        }

        // Siempre mostrar la selección de correos
        echo '<h2>Selecciona los correos:</h2>';
        echo '<div class="lista-correos">';

        $query = "SELECT email FROM clientes";
        $stmt = $conn->query($query); // devuelve un objeto PDOStatement

        $emails = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene todos los resultados como array asociativo

if (count($emails) > 0) {
    foreach ($emails as $row) {
        $email = $row['email'];
        echo "<div class='correo-container'>";
        echo "<label><input type='checkbox' name='selected_emails[]' value='$email'> $email</label>";
        echo "</div>";
    }
} else {
    echo '<p>No hay correos electrónicos disponibles.</p>';
}

        // Mostrar imágenes seleccionadas antes del envío
        if (isset($_POST['selected_imagenes']) && !empty($_POST['selected_imagenes'])) {
            $_SESSION['selected_imagenes'] = $_POST['selected_imagenes']; // Guardamos las imagenes seleccionadas en la sesion

            echo '<h2>Imágenes Seleccionadas:</h2>';
            echo '<div class="imagenes">';
            foreach ($_POST['selected_imagenes'] as $imagen){
                echo "<img src='$imagen' alt='Imagen seleccionada' style='width: 80px; height: 80px; margin: 2px;'>";
            }
            echo '</div>';
        }

        // Mostrar el boton para enviar los correos
        echo '<button type="submit" name="enviar" formaction="enviarCorreo.php">Enviar Correo</button>';
        ?>
    </form>
</body>
</html>
