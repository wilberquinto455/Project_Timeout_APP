<?php

class User {
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $role;
    private $created_at;

    public function __construct($data = []) {
        $this->id = $data['ID_User'] ?? null;
        $this->firstName = $data['Nombre'] ?? null;
        $this->lastName = $data['Apellido'] ?? null;
        $this->email = $data['Usuario'] ?? null;
        $this->role = $data['ID_Rol'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
    }

    public static function getById($userId) {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE ID_User = ?");
            $stmt->execute([$userId]);
            
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return new User($row);
            }
            
            return null;
        } catch (PDOException $e) {
            error_log("Error getting user: " . $e->getMessage());
            return null;
        }
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName ?? 'Usuario';
    }

    public function getLastName() {
        return $this->lastName ?? '';
    }

    public function getFullName() {
        $firstName = $this->getFirstName();
        $lastName = $this->getLastName();
        return trim($firstName . ' ' . $lastName);
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    // Verificar si el usuario es administrador
    public function isAdmin() {
        return $this->role === 1;
    }

    // Verificar si el usuario es invitado
    public function isGuest() {
        return false;
    }
}
