<?php
session_start();

// Se validan dependencias y las consulta usuario.
require_once('../model/conexion.php');
require_once('../model/validarSesion.php');

try {
    error_log("Iniciando proceso de login");
    
    $email = $_POST['Correo'] ?? '';
    $clave = isset($_POST['Password']) ? md5($_POST['Password']) : '';

    error_log("Datos recibidos - Email: " . $email);

    if (empty($email) || empty($clave)) {
        error_log("Datos de login incompletos");
        $_SESSION['titulo'] = "Oops!";
        $_SESSION['msj'] = "Por favor ingrese sus datos para iniciar sesión.";
        $_SESSION['icono'] = "info";
        echo "<script> window.history.back(); </script>";
        exit;
    }

    error_log("Creando instancia de validarSesion");
    $Consultar = new validarSesion();
    
    error_log("Llamando a iniciarSesion");
    $result = $Consultar->iniciarSesion($email, $clave);

    if ($result['success']) {
        error_log("Login exitoso, redirigiendo a: " . $result['redirect']);
        echo "<script> location.href='../view/" . $result['redirect'] . "' </script>";
    } else {
        error_log("Login fallido: " . $result['message']);
        $_SESSION['titulo'] = "Oops!";
        $_SESSION['msj'] = $result['message'];
        $_SESSION['icono'] = "error";
        echo "<script> window.history.back(); </script>";
    }
} catch (Exception $e) {
    $errorMessage = "Error en LoginUser.php: " . $e->getMessage();
    error_log($errorMessage);
    
    $_SESSION['titulo'] = "Error";
    $_SESSION['msj'] = $errorMessage;
    $_SESSION['icono'] = "error";
    echo "<script> window.history.back(); </script>";
}
?>