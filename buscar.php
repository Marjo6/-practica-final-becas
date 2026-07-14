<?php
// Incluimos la conexión de forma segura
include 'conexion.php';

$aspirante = null;
$mensaje = "";

// Validamos por el método de envío POST, así evitamos buscar llaves que no existen al cargar la página por primera vez
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Si existe el campo de texto lo limpia, si no, lo deja vacío
    $duiBuscar = isset($_POST['txtDuiBuscar']) ? trim($_POST['txtDuiBuscar']) : '';

    if (!empty($duiBuscar)) {
        // Consulta SQL limpia para buscar al alumno uniendo con su tipo de beca
        $sql = "SELECT a.*, b.nombre_beca 
                FROM aspirantes a 
                INNER JOIN tipos_beca b ON a.id_tipo = b.id_tipo 
                WHERE a.dui = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $duiBuscar);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $aspirante = $resultado->fetch_assoc();
            } else {
                $mensaje = "<div style='color:red; margin-top:15px; font-weight:bold;'>No se encontró ningún aspirante con el DUI: " . htmlspecialchars($duiBuscar) . "</div>";
            }
            $stmt->close();
        } else {
            $mensaje = "<div style='color:red; margin-top:15px;'>Error en la consulta de la base de datos.</div>";
        }
    } else {
        $mensaje = "<div style='color:orange; margin-top:15px; font-weight:bold;'>Por favor, digite un número de DUI.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Becas - Alcaldía</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f7f6; }
        .contenedor { max-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); margin: 0 auto; }
        h2 { color: #333; text-align: center; }
        .campo { margin-bottom: 15px; text-align: center; }
        input[type="text"] { width: 60%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; }
        input[type="submit"] { padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background-color: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 25px; }
        table, th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #343a40; color: white; }
        td { background-color: #fff; }
    </style>
</head>
<body>

<div class="contenedor">
    <h2>Sistema de Consulta de Aspirantes</h2>
    <p style="text-align:center; color:#666;">Alcaldía Municipal de San Salvador</p>
    <hr style="border:0; border-top:1px solid #eee; margin-bottom:20px;">

    <form method="POST" action="">
        <div class="campo">
            <label for="txtDuiBuscar" style="font-weight:bold; display:block; margin-bottom:10px;">DUI del Aspirante:</label>
            <input type="text" id="txtDuiBuscar" name="txtDuiBuscar" placeholder="00000000-0" value="<?php echo isset($_POST['txtDuiBuscar']) ? htmlspecialchars($_POST['txtDuiBuscar']) : ''; ?>">
            <input type="submit" value="Buscar">
        </div>
    </form>

    <?php echo $mensaje; ?>

    <?php if ($aspirante != null): ?>
        <h3 style="margin-top:30px; border-bottom: 2px solid #007bff; padding-bottom:5px;">Datos del Aspirante</h3>
        <table>
            <tr><th>DUI</th><td><?php echo htmlspecialchars($aspirante['dui']); ?></td></tr>
            <tr><th>Nombre Completo</th><td><?php echo htmlspecialchars($aspirante['nombres'] . " " . $aspirante['apellidos']); ?></td></tr>
            <tr><th>Teléfono</th><td><?php echo htmlspecialchars($aspirante['telefono']); ?></td></tr>
            <tr><th>Correo Electrónico</th><td><?php echo htmlspecialchars($aspirante['correo']); ?></td></tr>
            <tr><th>Promedio de Notas</th><td><strong><?php echo htmlspecialchars($aspirante['promedio']); ?></strong></td></tr>
            <tr><th>Tipo de Beca</th><td><span style="color:green; font-weight:bold;"><?php echo htmlspecialchars($aspirante['nombre_beca']); ?></span></td></tr>
        </table>
    <?php endif; ?>
</div>

</body>
</html>