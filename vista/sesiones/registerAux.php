<?php
require_once '../../controladores/autenticarControl.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth = new AuthController();
    
    // Sanitizar entradas
    $username = $_POST(INPUT_POST, 'username');
    $email = $_POST(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validaciones básicas
    $errors = [];

    if (strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres";
    }

    if (!filter_var($email)) {
        $errors[] = "Email inválido";
    }

    if (empty($errors)) {
        $resultado = $auth->register($username, $email, $password, $confirm_password);
        
        if (isset($resultado['error'])) {
            $_SESSION['error'] = $resultado['error'];
             header('Location: ../../index.php');
            exit;
        }
        
        // Si el registro es exitoso, AuthController ya redirige al login
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: ../errores/error.php');
        exit;
    }
    
}
?>