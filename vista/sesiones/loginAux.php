<?php
require_once 'controladores/autenticarControl.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth = new AuthController();
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $resultado = $auth->login($email, $password);

    if (!$resultado) {
        $_SESSION['error'] = "Credenciales inválidas";
        header('Location: ../../index.php');
        exit;
    }
    // Si el login es exitoso, AuthController ya redirige al index
}
?>