<?php
require_once(__DIR__ . "/conexion.php");

class validarSesion {
    private $conexion;

    public function __construct() {
        try {
            $db = new Conexion();
            $this->conexion = $db->get_conexion();
            error_log("Conexión establecida en validarSesion");
        } catch (Exception $e) {
            error_log("Error en constructor de validarSesion: " . $e->getMessage());
            throw $e;
        }
    }

    public function iniciarSesion($email, $clave) {
        try {
            error_log("Intentando iniciar sesión para el email: " . $email);
            
            //Se valida correo
            $sql = "SELECT * FROM usuarios WHERE Email_Usuario = :email";
            error_log("SQL a ejecutar: " . $sql);
            
            $result = $this->conexion->prepare($sql);
            $result->bindParam(":email", $email);
            $result->execute();

            $f = $result->fetch(PDO::FETCH_ASSOC);
            error_log("Resultado de la consulta: " . ($f ? "Usuario encontrado" : "Usuario no encontrado"));

            if ($f) {
                error_log("Validando contraseña y estado del usuario");
                // Se valida password
                if ($clave == $f['Contraseña']) {
                    // Se comprueba estado
                    if ($f['ID_Estado_Usuario'] == 1) {
                        error_log("Usuario activo, creando variables de sesión");
                        //variables de inicio de sesion
                        if (!isset($_SESSION)) {
                            session_start();
                        }
                        $_SESSION['ID_User'] = $f['ID_User'];
                        $_SESSION['rol'] = $f['ID_Rol'];
                        $_SESSION['autenticacion'] = "SI";
                        $_SESSION['nombre'] = $f['Nombre'];
                        
                        if ($f['ID_Rol'] == 1) {
                            return [
                                'success' => true,
                                'redirect' => 'administrador/homeAdmin.php'
                            ];
                        } else {
                            return [
                                'success' => true,
                                'redirect' => 'operaciones/homeOperador.php'
                            ];
                        }
                    } else if ($f['ID_Estado_Usuario'] == 2){
                        error_log("Usuario inactivo");
                        return [
                            'success' => false,
                            'message' => 'Su cuenta está inactiva, contacte con un administrador para reactivarla.'
                        ];
                    } else if ($f['ID_Estado_Usuario'] == 3){
                        error_log("Usuario bloqueado");
                        return [
                            'success' => false,
                            'message' => 'Su cuenta está bloqueada, contacte con un administrador para desbloquearla.'
                        ];
                    } else if ($f['ID_Estado_Usuario'] == 4){
                        error_log("Usuario en estado 4");
                        return [
                            'success' => false,
                            'message' => 'Contacte con un administrador.'
                        ];
                    } 
                } else {
                    error_log("Contraseña incorrecta");
                    return [
                        'success' => false,
                        'message' => 'La contraseña es incorrecta, por favor verifíquela.'
                    ];
                }
            } else {
                error_log("Usuario no encontrado en la base de datos");
                return [
                    'success' => false,
                    'message' => 'Usuario no encontrado.'
                ];
            }
        } catch (Exception $e) {
            error_log("Error en iniciarSesion: " . $e->getMessage());
            throw new Exception("Error al intentar iniciar sesión: " . $e->getMessage());
        }
    }
}
?>