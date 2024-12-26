<?php

class Guest {
    public function getId() {
        return null;
    }

    public function getFirstName() {
        return 'Invitado';
    }

    public function getLastName() {
        return '';
    }

    public function getFullName() {
        return 'Invitado';
    }

    public function getEmail() {
        return null;
    }

    public function getRole() {
        return null;
    }

    public function getCreatedAt() {
        return null;
    }

    public function isAdmin() {
        return false;
    }

    public function isGuest() {
        return true;
    }
}
