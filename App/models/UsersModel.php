<?php //namespace models;

class UsersModel extends Model {
    
    public function __construct() {
        parent::__construct();
        $this->tableName = "adm_users";
    }
    
    public function GetUserAfterEmail ($email) {
        // M: TODO: Sanitize the $email var;
        $this->query("SELECT * FROM " . $this->tableName . " WHERE email = '" . $email . "'");
        return $this->single();
    }
    
    public function GetUserAfterId ($id) {
        $this->query("SELECT * FROM " . $this->tableName . " WHERE id = '" . $id . "'");
        return $this->single();
    }
    
    public function Activate($id) {
        $token = rand();
        $this->query('UPDATE ' . $this->tableName . ' SET active = "1", token = "' . $token . '" WHERE id = ' . $id);
        return $this->resultSet();
    }

    public function InsertUser($firstName, $lastName, $email, $encrPass, $token) {
        $idBefore = $this->lastInsertId();
        $this->query("INSERT INTO " . $this->tableName 
                . " (password, firstname, lastname, email, active, token, role) VALUES ('" . 
                $encrPass ."','". $firstName ."','" . $lastName . "','" . $email . "','0','" . $token . "', 'power_user')");
        $this->execute();
        if ($idBefore == $this->lastInsertId()) {
            return false;
        } else {
            return $this->lastInsertId();
        } 
    }
    
    public function UpdateUser($firstName, $lastName, $pwd, $id) {
        $this->query("UPDATE " . $this->tableName . " SET firstname = '" . $firstName . "', lastname = '" . $lastName . "', password = '" . $pwd . "' WHERE id = '" . $id . "'");
        $this->execute();
        $this->query("SELECT * FROM " . $this->tableName . " WHERE id = '" . $id . "'");
        return $this->single();
    }
}

