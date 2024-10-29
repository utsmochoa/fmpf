<?php
class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function registrar($username, $email, $password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO sesiones (usuario, email, clave) 
                 VALUES (?, ?, ?)";
        
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sss", $username, $email, $password_hash);
        
        return $stmt->execute();
    }

    public function login($email, $password) {
        $query = "SELECT * FROM sesiones WHERE email = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    }
}
?>