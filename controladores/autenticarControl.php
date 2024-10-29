<?php
define('BASE_PATH', dirname(dirname(__FILE__)));


require_once(BASE_PATH . '/modelos/usuarios.php');
require_once(BASE_PATH . '/modelos/configlogin.php');
// require_once '../modelos/configlogin.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->usuarioModel = new Usuario($conexion);
    }

    public function login($email, $password) {
        $usuario = $this->usuarioModel->login($email, $password);
        
        if ($usuario) {
            session_start();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['usuario'] = $usuario['username'];
            header('Location: ../vista/app/index.php');
            exit;
        }
        return false;
    }

    public function register($username, $email, $password, $confirm_password) {
        if ($password !== $confirm_password) {
            return ['error' => 'Las contraseñas no coinciden'];
        }

        if ($this->usuarioModel->registrar($username, $email, $password)) {
            header('Location: ../index.php');
            exit;
        }
        return ['error' => 'Error al registrar usuario'];
    }
}
?>