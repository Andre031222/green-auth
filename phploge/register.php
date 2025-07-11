<?php
require_once 'config.php';
requireGuest(); // Redirige a dashboard si ya está logueado

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = trim($_POST['nombres'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $dni = trim($_POST['dni'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $region = trim($_POST['region'] ?? '');
    $provincia = trim($_POST['provincia'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validaciones
    if (empty($nombres)) $errors[] = "Los nombres son requeridos";
    if (empty($apellidos)) $errors[] = "Los apellidos son requeridos";
    if (empty($dni)) $errors[] = "El DNI es requerido";
    if (empty($telefono)) $errors[] = "El teléfono es requerido";
    if (empty($email)) $errors[] = "El email es requerido";
    if (empty($region)) $errors[] = "La región es requerida";
    if (empty($provincia)) $errors[] = "La provincia es requerida";
    if (empty($username)) $errors[] = "El username es requerido";
    if (empty($password)) $errors[] = "La contraseña es requerida";
    if ($password !== $confirm_password) $errors[] = "Las contraseñas no coinciden";

    // Validar formato de email
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del email no es válido";
    }

    // Validar longitud del DNI
    if (!empty($dni) && strlen($dni) != 8) {
        $errors[] = "El DNI debe tener 8 dígitos";
    }

    // Validar longitud de la contraseña
    if (!empty($password) && strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres";
    }

    // Verificar si el usuario ya existe
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ? OR dni = ?");
            $stmt->execute([$email, $username, $dni]);
            
            if ($stmt->rowCount() > 0) {
                $errors[] = "El email, username o DNI ya están registrados";
            }
        } catch (PDOException $e) {
            $errors[] = "Error al verificar los datos: " . $e->getMessage();
        }
    }

    // Registrar usuario
    if (empty($errors)) {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $pdo->prepare("INSERT INTO users (nombres, apellidos, dni, telefono, email, region, provincia, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombres, $apellidos, $dni, $telefono, $email, $region, $provincia, $username, $hashed_password]);
            
            // Redirigir al login con mensaje de éxito
            $_SESSION['register_success'] = "¡Registro exitoso! Ahora puedes iniciar sesión con tus credenciales.";
            header('Location: login.php');
            exit();
            
        } catch (PDOException $e) {
            $errors[] = "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Green Auth</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #8BC34A;
            --dark-green: #689F38;
            --light-green: #C8E6C9;
            --accent-green: #4CAF50;
            --bg-green: #E8F5E8;
            --text-dark: #2E7D32;
            --text-light: #666666;
            --white: #FFFFFF;
            --shadow: rgba(76, 175, 80, 0.2);
            --error-color: #FF6B6B;
            --success-color: #4CAF50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            /* Opción 1: Imagen de fondo con overlay verde */
            background: 
                linear-gradient(135deg, rgba(139, 195, 74, 0.8), rgba(76, 175, 80, 0.6)),
                url('phploge/assets/images/background.jpg');
            
            /* Opción 2: Solo imagen (descomenta esta línea y comenta la anterior) */
            /* background: url('assets/images/background.jpg'); */
            
            /* Opción 3: Imagen con gradiente sólido (descomenta estas líneas) */
            /* background: 
                linear-gradient(rgba(46, 125, 50, 0.7), rgba(139, 195, 74, 0.7)),
                url('assets/images/background.jpg'); */
            
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Patrón de fondo sutil */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(76, 175, 80, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(139, 195, 74, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(200, 230, 201, 0.1) 0%, transparent 50%);
            z-index: -1;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 45px 55px;
            width: 100%;
            max-width: 900px;
            box-shadow: 
                0 20px 40px rgba(76, 175, 80, 0.15),
                0 8px 16px rgba(46, 125, 50, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(139, 195, 74, 0.3);
            position: relative;
            overflow: hidden;
            animation: slideIn 0.8s ease-out;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--primary-green), var(--accent-green), var(--dark-green));
            border-radius: 24px;
            z-index: -1;
            opacity: 0.2;
        }

        .form-content {
            position: relative;
            z-index: 1;
        }

        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo {
            font-size: 4em;
            margin-bottom: 15px;
            color: var(--primary-green);
            text-shadow: 0 2px 4px rgba(76, 175, 80, 0.3);
            animation: bounce 2s infinite;
        }

        .form-header h1 {
            color: var(--text-dark);
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 4px rgba(46, 125, 50, 0.1);
        }

        .form-header p {
            color: var(--text-light);
            font-size: 1.1em;
            font-weight: 500;
        }

        .step-indicator {
            text-align: center;
            margin-bottom: 25px;
        }

        .step-indicator span {
            color: var(--primary-green);
            font-weight: 600;
            font-size: 14px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: rgba(139, 195, 74, 0.2);
            border-radius: 4px;
            margin-bottom: 30px;
            overflow: hidden;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
            width: 0%;
            transition: width 0.3s ease;
            box-shadow: 0 1px 3px rgba(76, 175, 80, 0.3);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .input-container {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-green);
            font-size: 1.2em;
            transition: all 0.3s ease;
            z-index: 2;
        }

        input, select {
            width: 100%;
            padding: 18px 20px 18px 60px;
            border: 2px solid rgba(139, 195, 74, 0.3);
            border-radius: 16px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            outline: none;
            color: var(--text-dark);
        }

        input:focus, select:focus {
            border-color: var(--primary-green);
            background: var(--white);
            box-shadow: 
                0 0 0 3px rgba(139, 195, 74, 0.2),
                0 4px 12px rgba(76, 175, 80, 0.15);
            transform: translateY(-2px);
        }

        input:focus + .input-icon,
        select:focus + .input-icon {
            color: var(--dark-green);
            transform: translateY(-50%) scale(1.1);
        }

        input:hover, select:hover {
            border-color: rgba(139, 195, 74, 0.5);
            box-shadow: 0 2px 8px rgba(76, 175, 80, 0.1);
        }

        .floating-label {
            position: absolute;
            top: 50%;
            left: 60px;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 16px;
            transition: all 0.3s ease;
            pointer-events: none;
            background: rgba(255, 255, 255, 0.9);
            padding: 0 8px;
            border-radius: 4px;
        }

        input:focus + .input-icon + .floating-label,
        input:valid + .input-icon + .floating-label,
        select:focus + .input-icon + .floating-label,
        select:valid + .input-icon + .floating-label {
            top: 0;
            left: 50px;
            font-size: 13px;
            color: var(--primary-green);
            font-weight: 600;
            background: var(--white);
        }

        .password-strength {
            margin-top: 10px;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            display: none;
            font-weight: 500;
        }

        .password-strength.weak {
            background: linear-gradient(135deg, #ffebee, #ffcdd2);
            color: #c62828;
            border: 1px solid #ffcdd2;
        }

        .password-strength.medium {
            background: linear-gradient(135deg, #fff3e0, #ffe0b2);
            color: #ef6c00;
            border: 1px solid #ffcc02;
        }

        .password-strength.strong {
            background: linear-gradient(135deg, var(--bg-green), var(--light-green));
            color: var(--text-dark);
            border: 1px solid var(--light-green);
        }

        .register-btn {
            width: 100%;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.4);
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--accent-green) 100%);
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn:active {
            transform: translateY(-1px);
        }

        .error {
            background: linear-gradient(135deg, var(--error-color), #ff8e8e);
            color: white;
            padding: 18px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            animation: shake 0.5s ease-in-out;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        .error::before {
            content: '⚠️';
            margin-right: 10px;
            font-size: 1.2em;
        }

        .success {
            background: linear-gradient(135deg, var(--success-color), #81c784);
            color: white;
            padding: 18px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            animation: pulse 0.5s ease-in-out;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .success::before {
            content: '✅';
            margin-right: 10px;
            font-size: 1.2em;
        }

        .login-link {
            text-align: center;
            margin-top: 35px;
            padding-top: 30px;
            border-top: 1px solid rgba(139, 195, 74, 0.3);
        }

        .login-link p {
            color: var(--text-light);
            font-size: 16px;
            margin-bottom: 15px;
        }

        .login-link a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            padding: 12px 30px;
            border: 2px solid var(--primary-green);
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .login-link a:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(139, 195, 74, 0.4);
        }

        /* Animaciones */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-8px);
            }
            60% {
                transform: translateY(-4px);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-5px);
            }
            75% {
                transform: translateX(5px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.02);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Responsive para laptop */
        @media (max-width: 1366px) {
            .register-container {
                max-width: 850px;
                padding: 40px 50px;
            }
            
            .form-header h1 {
                font-size: 2.3em;
            }
            
            .logo {
                font-size: 3.5em;
            }

            .form-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 1024px) {
            .register-container {
                max-width: 750px;
                padding: 35px 40px;
            }
            
            .form-header h1 {
                font-size: 2.1em;
            }
            
            .logo {
                font-size: 3.2em;
            }

            .form-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .register-container {
                margin: 10px;
                padding: 30px 25px;
                max-width: 500px;
            }
            
            .form-header h1 {
                font-size: 1.9em;
            }
            
            .logo {
                font-size: 2.8em;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }

        /* Partículas flotantes */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(139, 195, 74, 0.6);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; animation-delay: 1s; }
        .particle:nth-child(3) { left: 30%; animation-delay: 2s; }
        .particle:nth-child(4) { left: 40%; animation-delay: 3s; }
        .particle:nth-child(5) { left: 50%; animation-delay: 4s; }
        .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
        .particle:nth-child(7) { left: 70%; animation-delay: 0.5s; }
        .particle:nth-child(8) { left: 80%; animation-delay: 1.5s; }
        .particle:nth-child(9) { left: 90%; animation-delay: 2.5s; }
        .particle:nth-child(10) { left: 15%; animation-delay: 3.5s; }

        @keyframes float {
            0%, 100% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Mejoras adicionales */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading .register-btn {
            background: linear-gradient(135deg, #A5D6A7, #81C784);
        }

        /* Validación visual */
        .input-valid {
            border-color: var(--accent-green) !important;
        }

        .input-invalid {
            border-color: var(--error-color) !important;
        }

        .input-valid + .input-icon {
            color: var(--accent-green) !important;
        }

        .input-invalid + .input-icon {
            color: var(--error-color) !important;
        }

        /* Tooltips */
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: var(--text-dark);
            color: white;
            text-align: center;
            border-radius: 6px;
            padding: 8px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -100px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 14px;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="register-container">
        <div class="form-content">
            <div class="form-header">
                <div class="logo">🌱</div>
                <h1>Green Auth</h1>
                <p>Crea tu cuenta para comenzar</p>
            </div>

            <div class="step-indicator">
                <span>Completa todos los campos para registrarte</span>
            </div>

            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>

            <?php if (!empty($errors)): ?>
                <div class="error">
                    <?php foreach ($errors as $error): ?>
                        <div><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="" id="registerForm">
                <div class="form-grid">
                    <div class="form-group">
                        <div class="input-container">
                            <input type="text" id="nombres" name="nombres" value="<?php echo htmlspecialchars($nombres ?? ''); ?>" required>
                            <i class="fas fa-user input-icon"></i>
                            <label class="floating-label">Nombres</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($apellidos ?? ''); ?>" required>
                            <i class="fas fa-user-friends input-icon"></i>
                            <label class="floating-label">Apellidos</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <input type="text" id="dni" name="dni" value="<?php echo htmlspecialchars($dni ?? ''); ?>" maxlength="8" required>
                            <i class="fas fa-id-card input-icon"></i>
                            <label class="floating-label">DNI</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono ?? ''); ?>" required>
                            <i class="fas fa-phone input-icon"></i>
                            <label class="floating-label">Teléfono</label>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <div class="input-container">
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            <i class="fas fa-envelope input-icon"></i>
                            <label class="floating-label">Email</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <select id="region" name="region" required onchange="updateProvincias()">
                                <option value="">Selecciona tu región</option>
                                <option value="Lima" <?php echo (isset($region) && $region == 'Lima') ? 'selected' : ''; ?>>Lima</option>
                                <option value="Arequipa" <?php echo (isset($region) && $region == 'Arequipa') ? 'selected' : ''; ?>>Arequipa</option>
                                <option value="Cusco" <?php echo (isset($region) && $region == 'Cusco') ? 'selected' : ''; ?>>Cusco</option>
                                <option value="Puno" <?php echo (isset($region) && $region == 'Puno') ? 'selected' : ''; ?>>Puno</option>
                                <option value="La Libertad" <?php echo (isset($region) && $region == 'La Libertad') ? 'selected' : ''; ?>>La Libertad</option>
                                <option value="Piura" <?php echo (isset($region) && $region == 'Piura') ? 'selected' : ''; ?>>Piura</option>
                                <option value="Loreto" <?php echo (isset($region) && $region == 'Loreto') ? 'selected' : ''; ?>>Loreto</option>
                                <option value="Junín" <?php echo (isset($region) && $region == 'Junín') ? 'selected' : ''; ?>>Junín</option>
                                <option value="Lambayeque" <?php echo (isset($region) && $region == 'Lambayeque') ? 'selected' : ''; ?>>Lambayeque</option>
                                <option value="Tacna" <?php echo (isset($region) && $region == 'Tacna') ? 'selected' : ''; ?>>Tacna</option>
                            </select>
                            <i class="fas fa-map-marker-alt input-icon"></i>
                            <label class="floating-label">Región</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <select id="provincia" name="provincia" required>
                                <option value="">Selecciona primero una región</option>
                            </select>
                            <i class="fas fa-map-marked-alt input-icon"></i>
                            <label class="floating-label">Provincia</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username ?? ''); ?>" required>
                            <i class="fas fa-at input-icon"></i>
                            <label class="floating-label">Username</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <input type="password" id="password" name="password" required>
                            <i class="fas fa-lock input-icon"></i>
                            <label class="floating-label">Contraseña</label>
                        </div>
                        <div class="password-strength" id="passwordStrength"></div>
                    </div>

                    <div class="form-group">
                        <div class="input-container">
                            <input type="password" id="confirm_password" name="confirm_password" required>
                            <i class="fas fa-lock input-icon"></i>
                            <label class="floating-label">Confirmar Contraseña</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="register-btn">
                    <i class="fas fa-user-plus"></i> Registrarse
                </button>
            </form>

            <div class="login-link">
                <p>¿Ya tienes una cuenta?</p>
                <a href="login.php">
                    <i class="fas fa-sign-in-alt"></i> Inicia sesión aquí
                </a>
            </div>
        </div>
    </div>

    <script>
        // Datos de provincias por región
        const provinciasPorRegion = {
            'Lima': ['Lima', 'Barranca', 'Cajatambo', 'Canta', 'Cañete', 'Huaral', 'Huarochirí', 'Huaura', 'Oyón', 'Yauyos'],
            'Arequipa': ['Arequipa', 'Camaná', 'Caravelí', 'Castilla', 'Caylloma', 'Condesuyos', 'Islay', 'La Unión'],
            'Cusco': ['Cusco', 'Acomayo', 'Anta', 'Calca', 'Canas', 'Canchis', 'Chumbivilcas', 'Espinar', 'La Convención', 'Paruro', 'Paucartambo', 'Quispicanchi', 'Urubamba'],
            'Puno': ['Puno', 'Azángaro', 'Carabaya', 'Chucuito', 'El Collao', 'Huancané', 'Lampa', 'Melgar', 'Moho', 'San Antonio de Putina', 'San Román', 'Sandia', 'Yunguyo'],
            'La Libertad': ['Trujillo', 'Ascope', 'Bolívar', 'Chepén', 'Julcán', 'Otuzco', 'Pacasmayo', 'Pataz', 'Sánchez Carrión', 'Santiago de Chuco', 'Gran Chimú', 'Virú'],
            'Piura': ['Piura', 'Ayabaca', 'Huancabamba', 'Morropón', 'Paita', 'Sechura', 'Sullana', 'Talara'],
            'Loreto': ['Maynas', 'Alto Amazonas', 'Loreto', 'Mariscal Ramón Castilla', 'Requena', 'Ucayali', 'Datem del Marañón', 'Putumayo'],
            'Junín': ['Huancayo', 'Concepción', 'Chanchamayo', 'Jauja', 'Junín', 'Satipo', 'Tarma', 'Yauli', 'Chupaca'],
            'Lambayeque': ['Chiclayo', 'Ferreñafe', 'Lambayeque'],
            'Tacna': ['Tacna', 'Candarave', 'Jorge Basadre', 'Tarata']
        };

        function updateProvincias() {
            const regionSelect = document.getElementById('region');
            const provinciaSelect = document.getElementById('provincia');
            const selectedRegion = regionSelect.value;
            
            // Limpiar opciones de provincia
            provinciaSelect.innerHTML = '<option value="">Selecciona una provincia</option>';
            
            if (selectedRegion && provinciasPorRegion[selectedRegion]) {
                provinciasPorRegion[selectedRegion].forEach(provincia => {
                    const option = document.createElement('option');
                    option.value = provincia;
                    option.textContent = provincia;
                    <?php if (isset($provincia)): ?>
                    if (provincia === '<?php echo $provincia; ?>') {
                        option.selected = true;
                    }
                    <?php endif; ?>
                    provinciaSelect.appendChild(option);
                });
            } else {
                provinciaSelect.innerHTML = '<option value="">Selecciona primero una región</option>';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const inputs = form.querySelectorAll('input, select');
            const progressFill = document.getElementById('progressFill');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const passwordStrength = document.getElementById('passwordStrength');

            // Inicializar provincias si hay una región seleccionada
            updateProvincias();

            // Actualizar barra de progreso
            function updateProgress() {
                const totalFields = inputs.length;
                let filledFields = 0;
                
                inputs.forEach(input => {
                    if (input.value.trim() !== '') {
                        filledFields++;
                    }
                });
                
                const progress = (filledFields / totalFields) * 100;
                progressFill.style.width = progress + '%';
            }

            // Validar fortaleza de contraseña
            function checkPasswordStrength(password) {
                const strength = {
                    weak: /^.{1,5}$/,
                    medium: /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/,
                    strong: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/
                };

                if (password.length === 0) {
                    passwordStrength.style.display = 'none';
                    return;
                }

                passwordStrength.style.display = 'block';

                if (strength.strong.test(password)) {
                    passwordStrength.className = 'password-strength strong';
                    passwordStrength.innerHTML = '✅ Contraseña fuerte';
                } else if (strength.medium.test(password)) {
                    passwordStrength.className = 'password-strength medium';
                    passwordStrength.innerHTML = '⚠️ Contraseña media - Agrega números y símbolos';
                } else {
                    passwordStrength.className = 'password-strength weak';
                    passwordStrength.innerHTML = '❌ Contraseña débil - Mínimo 6 caracteres';
                }
            }

            // Validar campos en tiempo real
            function validateField(input) {
                const value = input.value.trim();
                const type = input.type;
                let isValid = true;

                if (type === 'email') {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    isValid = emailPattern.test(value);
                } else if (input.name === 'dni') {
                    isValid = value.length === 8 && /^\d+$/.test(value);
                } else if (type === 'password') {
                    isValid = value.length >= 6;
                } else {
                    isValid = value.length > 0;
                }

                if (isValid) {
                    input.classList.remove('input-invalid');
                    input.classList.add('input-valid');
                } else {
                    input.classList.remove('input-valid');
                    input.classList.add('input-invalid');
                }

                return isValid;
            }

            // Validar DNI en tiempo real
            document.getElementById('dni').addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
                if (this.value.length > 8) {
                    this.value = this.value.slice(0, 8);
                }
                validateField(this);
            });

            // Validar teléfono
            document.getElementById('telefono').addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9+\-\s]/g, '');
                validateField(this);
            });

            // Eventos para inputs
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    updateProgress();
                    if (this.type !== 'password') {
                        validateField(this);
                    }
                });
                
                input.addEventListener('change', updateProgress);
                
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                    if (this.type !== 'password') {
                        validateField(this);
                    }
                });

                // Efecto hover
                input.addEventListener('mouseenter', function() {
                    if (this !== document.activeElement) {
                        this.style.borderColor = 'rgba(139, 195, 74, 0.5)';
                    }
                });

                input.addEventListener('mouseleave', function() {
                    if (this !== document.activeElement) {
                        this.style.borderColor = 'rgba(139, 195, 74, 0.3)';
                    }
                });
            });

            // Validar contraseña
            passwordInput.addEventListener('input', function() {
                checkPasswordStrength(this.value);
                validateField(this);
            });

            // Validar confirmación de contraseña
            confirmPasswordInput.addEventListener('input', function() {
                if (this.value !== passwordInput.value) {
                    this.setCustomValidity('Las contraseñas no coinciden');
                    this.classList.add('input-invalid');
                    this.classList.remove('input-valid');
                } else {
                    this.setCustomValidity('');
                    this.classList.add('input-valid');
                    this.classList.remove('input-invalid');
                }
            });

            // Animación del botón de submit
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('.register-btn');
                const container = document.querySelector('.register-container');
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Registrando...';
                submitBtn.disabled = true;
                container.classList.add('loading');
                
                // Mensaje de redirección
                setTimeout(() => {
                    submitBtn.innerHTML = '<i class="fas fa-check"></i> Redirigiendo al login...';
                }, 1000);
            });

            // Inicializar progreso
            updateProgress();

            // Efecto de partículas mejorado
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                particle.style.animationDelay = `${index * 0.8}s`;
                particle.style.animationDuration = `${6 + Math.random() * 4}s`;
            });
        });

        // Prevenir doble submit
        let isSubmitting = false;
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            if (isSubmitting) {
                e.preventDefault();
                return false;
            }
            isSubmitting = true;
        });
    </script>
</body>
</html>