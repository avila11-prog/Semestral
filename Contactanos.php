<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zen Interior</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS -->
</head>
<body id="contact-page">
    <!-- Encabezado -->
    <header>
        <div class="logo">ZEN INTERIOR</div>
        <nav>
            <ul>
                <li><a href="Home.php" class="Home-btn">Home</a></li>
                <li><a href="Servicios.php" class="servicios-btn">Servicios</a></li>
                <li><a href="Portafolio.php" class="Portafolio-btm">Nuestro Trabajo</a></li>
                <li><a href="contactanos.php" class="contact-btn">Contáctanos</a></li>
        </nav>
    </header>
    <main id="main">
        <section id="contact-section">
            <div id="contact-form">
                <h2>Ponte en Contacto</h2>
                <h1>¡Estamos aquí para hacer realidad el espacio de tus sueños!</h1>
                <form action="Insertar_Datos.php" method="POST">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nombre *</label>
                        <input type="text" id="name" name="name" placeholder="Andrea Avila" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Correo *</label>
                        <input type="email" id="email" name="email" placeholder="valen@gmail.com" required>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone">Número Telefónico*</label>
                        <input type="tel" id="phone" name="phone" placeholder="555-555-5555" required>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" id="address" name="address" placeholder="Dirección" required>
                    </div>

                    <!-- Contact Method -->
                    <div class="form-group">
                        <label for="contact-method">Método de contacto preferido </label>
                        <select id="contact-method" name="contact-method">
                            <option value="email">Email</option>
                            <option value="phone">Telefono</option>
                        </select>
                    </div>

                    <!-- Services -->
                    <div class="form-group">
                        <label>¿Qué servicios te interesan?</label>
                        <div id="checkbox-group">
                            <input type="checkbox" id="remodeling" name="services[]" value="remodeling">
                            <label for="remodeling">Remodelación completa del hogar</label><br>
                            <input type="checkbox" id="kitchen" name="services[]" value="kitchen">
                            <label for="kitchen">Diseño de cocina</label><br>
                            <input type="checkbox" id="bathroom" name="services[]" value="bathroom">
                            <label for="bathroom">Diseño de cocina</label><br>
                            <input type="checkbox" id="living-room" name="services[]" value="living-room">
                            <label for="living-room">Renovación de la sala de estar</label><br>
                            <input type="checkbox" id="decoration" name="services[]" value="decoration">
                            <label for="decoration">Decoración de interiores</label><br>
                            <input type="checkbox" id="consultation" name="services[]" value="consultation">
                            <label for="consultation">Servicios de consulta</label>
                        </div>
                    </div>

                    <!-- Appointment Date -->
                    <div class="form-group">
                        <label for="date">Agende su Cita </label>
                        <input type="date" id="date" name="date">
                    </div>

                    <!-- Comments -->
                    <div class="form-group">
                        <label for="comments">Comentarios o preguntas adicionales</label>
                        <textarea id="comments" name="comments" placeholder="Comentarios"></textarea>
                    </div>

                    <!-- Checkbox and Submit -->
                    <div class="form-group">
                        <label for="privacy">Permito que este sitio web almacene mi envío para que puedan responder a mi consulta.</label>
                        <input type="checkbox" id="privacy" name="privacy" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>