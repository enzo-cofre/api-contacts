<?php 
require_once 'Dbh.php';

class Contact extends Dbh {

    public function getAllContacts() {
        $sql = "SELECT * FROM contacts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }

    public function getContact($id) {
        $sql = "SELECT * FROM contacts WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        return $res;
    }

    public function createContact($username, $email) {
        $sql = "INSERT INTO contacts(username, email) VALUES(?, ?)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $email]);
    
        $id = $conn->lastInsertId();
        return ['id' => $id, 'username' => $username, 'email' => $email];
    }

    public function updateContact($id, $username, $email) {
        $sql = "UPDATE contacts SET username = ?, email = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $id]);
        return ['id' => $id, 'username' => $username, 'email' => $email];
    }

    public function deleteContact($id) {
        $sql = "DELETE FROM contacts WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $id;
    }
}