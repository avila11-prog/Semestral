<?php
// Incluimos el archivo de conexión
include 'conexion.php';

// Crear conexión a la base de datos
$conexion = new Conecta();
$cnn = $conexion->conectarDB();

// HTTPS: Asegúrate de que este script esté bajo HTTPS
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    die("La conexión no es segura. Usa HTTPS.");
}

// Obtener los datos enviados desde el formulario y sanitizarlos
$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
$contactMethod = htmlspecialchars(trim($_POST['contact-method']), ENT_QUOTES, 'UTF-8');
$services = isset($_POST['services']) ? htmlspecialchars(implode(', ', $_POST['services']), ENT_QUOTES, 'UTF-8') : null;

$privacy = isset($_POST['privacy']) ? true : false;

// Validación de datos: Verificar campos requeridos
if (!empty($name) && !empty($email) && !empty($phone) && !empty($address) && $privacy) {
    // Validar formato de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no es válido.");
    }

    // Validar que el teléfono solo contenga números
    if (!is_numeric($phone)) {
        die("El número de teléfono debe contener solo números.");
    }

    // Usar consultas preparadas para insertar datos
    $sql = "INSERT INTO solicitudes 
        (`Nombre`, `Correo`, `Teléfono`, `Direccion`, `Metodo de Contacto`, `Servicio`, `Cita`, `Comentarios`, `Permiso`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar la consulta
    $stmt = $cnn->prepare($sql);
    if ($stmt) {
        // Enlazar parámetros y ejecutar la consulta
        $stmt->bind_param(
            "sssssssss", 
            $name, 
            $email, 
            $phone, 
            $address, 
            $contactMethod, 
            $services, 
            $date, 
            $comments, 
            $privacy
        );

        if ($stmt->execute()) {
            echo "¡Formulario enviado correctamente! Gracias por contactarnos.";
        } else {
            error_log("Error al insertar los datos: " . $stmt->error); // Log de errores para el administrador
            echo "Hubo un problema al enviar el formulario. Por favor, inténtelo de nuevo.";
        }

        $stmt->close();
    } else {
        error_log("Error en la preparación de la consulta: " . $cnn->error);
        die("Hubo un problema técnico. Inténtalo más tarde.");
    }
} else {
    die("Por favor, complete todos los campos obligatorios.");
}

// Cerrar conexión
$cnn->close();
?>
