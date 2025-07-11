<?php
// config.php - Configuración de la base de datos
$host = 'localhost';
$dbname = 'green_auth';
$username = 'root'; // Cambia por tu usuario de MySQL
$password = ''; // Cambia por tu contraseña de MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Iniciar sesión
session_start();

// Función para verificar si el usuario está logueado
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Función para redirigir si no está logueado
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

// Función para redirigir si ya está logueado
function requireGuest() {
    if (isLoggedIn()) {
        header('Location: dashboard.php');
        exit();
    }
}
?>