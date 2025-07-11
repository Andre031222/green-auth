<?php
require_once 'config.php';
requireGuest(); // Redirige a dashboard si ya está logueado

$errors = [];

// Verificar si viene del registro exitoso
$register_success = '';
if (isset($_SESSION['register_success'])) {
    $register_success = $_SESSION['register_success'];
    unset($_SESSION['register_success']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $identifier = trim($_POST['identifier'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validaciones básicas
    if (empty($identifier)) {
        $errors[] = "El username, email o DNI es requerido";
    }
    if (empty($password)) {
        $errors[] = "La contraseña es requerida";
    }

    // Verificar credenciales
    if (empty($errors)) {
        try {
            // Buscar usuario por username, email o DNI
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ? OR dni = ?");
            $stmt->execute([$identifier, $identifier, $identifier]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Login exitoso
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['nombres'] = $user['nombres'];
                $_SESSION['apellidos'] = $user['apellidos'];
                $_SESSION['email'] = $user['email'];
                
                header('Location: dashboard.php');
                exit();

            } else {
                $errors[] = "Credenciales incorrectas";
            }
        } catch (PDOException $e) {
            $errors[] = "Error al verificar credenciales: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Green Auth</title>
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
                url('assets/images/background.jpg');
            
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

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 50px 60px;
            width: 100%;
            max-width: 520px;
            box-shadow: 
                0 20px 40px rgba(76, 175, 80, 0.15),
                0 8px 16px rgba(46, 125, 50, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(139, 195, 74, 0.3);
            position: relative;
            overflow: hidden;
            animation: slideIn 0.8s ease-out;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--primary-green), var(--accent-green), var(--dark-green));
            border-radius: 24px;
            z-index: -1;
            opacity: 0.3;
        }

        .form-content {
            position: relative;
            z-index: 1;
        }

        .form-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .logo {
            font-size: 4.5em;
            margin-bottom: 15px;
            color: var(--primary-green);
            text-shadow: 0 2px 4px rgba(76, 175, 80, 0.3);
            animation: bounce 2s infinite;
        }

        .form-header h1 {
            color: var(--text-dark);
            font-size: 2.8em;
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

        .form-group {
            position: relative;
            margin-bottom: 28px;
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

        input {
            width: 100%;
            padding: 20px 20px 20px 60px;
            border: 2px solid rgba(139, 195, 74, 0.3);
            border-radius: 16px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            outline: none;
            color: var(--text-dark);
        }

        input:focus {
            border-color: var(--primary-green);
            background: var(--white);
            box-shadow: 
                0 0 0 3px rgba(139, 195, 74, 0.2),
                0 4px 12px rgba(76, 175, 80, 0.15);
            transform: translateY(-2px);
        }

        input:focus + .input-icon {
            color: var(--dark-green);
            transform: translateY(-50%) scale(1.1);
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
        input:valid + .input-icon + .floating-label {
            top: 0;
            left: 50px;
            font-size: 13px;
            color: var(--primary-green);
            font-weight: 600;
            background: var(--white);
        }

        .login-btn {
            width: 100%;
            padding: 18px;
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
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.4);
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--accent-green) 100%);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: translateY(-1px);
        }

        .success {
            background: linear-gradient(135deg, var(--success-color), #81c784);
            color: white;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            animation: pulse 0.5s ease-in-out;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .success::before {
            content: '✅';
            margin-right: 10px;
            font-size: 1.2em;
        }
            background: linear-gradient(135deg, var(--error-color), #ff8e8e);
            color: white;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            border: none;
            animation: shake 0.5s ease-in-out;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        .error::before {
            content: '⚠️';
            margin-right: 10px;
            font-size: 1.2em;
        }

        .register-link {
            text-align: center;
            margin-top: 35px;
            padding-top: 30px;
            border-top: 1px solid rgba(139, 195, 74, 0.3);
        }

        .register-link p {
            color: var(--text-light);
            font-size: 16px;
            margin-bottom: 15px;
        }

        .register-link a {
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

        .register-link a:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(139, 195, 74, 0.4);
        }

        .login-options {
            margin-top: 30px;
            text-align: center;
        }

        .login-options p {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 15px;
        }

        .option-badges {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .option-badge {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 8px rgba(139, 195, 74, 0.3);
            transition: all 0.3s ease;
        }

        .option-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 195, 74, 0.4);
        }

        .features {
            margin-top: 35px;
            padding: 25px;
            background: linear-gradient(135deg, rgba(139, 195, 74, 0.1), rgba(76, 175, 80, 0.1));
            border-radius: 16px;
            border: 1px solid rgba(139, 195, 74, 0.3);
        }

        .features h3 {
            color: var(--text-dark);
            margin-bottom: 20px;
            font-size: 1.3em;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            color: var(--text-light);
            font-size: 14px;
            padding: 8px;
        }

        .feature-item i {
            color: var(--accent-green);
            margin-right: 10px;
            font-size: 1.1em;
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

        /* Responsive para laptop */
        @media (max-width: 1366px) {
            .login-container {
                max-width: 480px;
                padding: 45px 50px;
            }
            
            .form-header h1 {
                font-size: 2.5em;
            }
            
            .logo {
                font-size: 4em;
            }
        }

        @media (max-width: 1024px) {
            .login-container {
                max-width: 450px;
                padding: 40px 45px;
            }
            
            .form-header h1 {
                font-size: 2.2em;
            }
            
            .logo {
                font-size: 3.5em;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 10px;
                padding: 35px 25px;
                max-width: 400px;
            }
            
            .form-header h1 {
                font-size: 2em;
            }
            
            .logo {
                font-size: 3em;
            }
            
            .option-badges {
                flex-direction: column;
                align-items: center;
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

        /* Mejoras adicionales para laptop */
        .login-container {
            min-height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Efecto hover mejorado para inputs */
        input:hover {
            border-color: rgba(139, 195, 74, 0.5);
            box-shadow: 0 2px 8px rgba(76, 175, 80, 0.1);
        }

        /* Indicador de carga */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading .login-btn {
            background: linear-gradient(135deg, #A5D6A7, #81C784);
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
    </div>

    <div class="login-container">
        <div class="form-content">
            <div class="form-header">
                <div class="logo">🌱</div>
                <h1>Green Auth</h1>
                <p>Inicia sesión en tu cuenta</p>
            </div>

            <?php if (!empty($register_success)): ?>
                <div class="success">
                    <?php echo htmlspecialchars($register_success); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="error">
                    <?php foreach ($errors as $error): ?>
                        <div><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="" id="loginForm">
                <div class="form-group">
                    <div class="input-container">
                        <input type="text" id="identifier" name="identifier" value="<?php echo htmlspecialchars($identifier ?? ''); ?>" required>
                        <i class="fas fa-user input-icon"></i>
                        <label class="floating-label">Username, Email o DNI</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <input type="password" id="password" name="password" required>
                        <i class="fas fa-lock input-icon"></i>
                        <label class="floating-label">Contraseña</label>
                    </div>
                </div>

                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </button>
            </form>

            <div class="login-options">
                <p>Puedes iniciar sesión con:</p>
                <div class="option-badges">
                    <div class="option-badge">
                        <i class="fas fa-user"></i> Username
                    </div>
                    <div class="option-badge">
                        <i class="fas fa-envelope"></i> Email
                    </div>
                    <div class="option-badge">
                        <i class="fas fa-id-card"></i> DNI
                    </div>
                </div>
            </div>

            <div class="register-link">
                <p>¿No tienes una cuenta?</p>
                <a href="register.php">
                    <i class="fas fa-user-plus"></i> Regístrate aquí
                </a>
            </div>
        </div>
    </div>

    <script>
        // Animación de typing para el título
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const inputs = form.querySelectorAll('input');
            
            // Efecto de focus en inputs
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
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

            // Validación en tiempo real
            const identifierInput = document.getElementById('identifier');
            const passwordInput = document.getElementById('password');
            
            identifierInput.addEventListener('input', function() {
                const value = this.value;
                const icon = this.nextElementSibling;
                
                if (value.includes('@')) {
                    icon.className = 'fas fa-envelope input-icon';
                } else if (/^\d+$/.test(value)) {
                    icon.className = 'fas fa-id-card input-icon';
                } else {
                    icon.className = 'fas fa-user input-icon';
                }
            });

            // Animación del botón de submit
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('.login-btn');
                const container = document.querySelector('.login-container');
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Iniciando sesión...';
                submitBtn.disabled = true;
                container.classList.add('loading');
                
                // Simular delay para mejor UX
                setTimeout(() => {
                    // El form se enviará normalmente
                }, 500);
            });

            // Efecto de partículas mejorado
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                particle.style.animationDelay = `${index * 0.8}s`;
                particle.style.animationDuration = `${6 + Math.random() * 4}s`;
            });
        });

        // Prevenir doble submit
        let isSubmitting = false;
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            if (isSubmitting) {
                e.preventDefault();
                return false;
            }
            isSubmitting = true;
        });
    </script>
</body>
</html>