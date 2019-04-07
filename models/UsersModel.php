<?php

class UsersModel extends Model {
    
    public function __construct() {
        parent::__construct();
        $this->tableName = "adm_users";
    }
    
    public function GetUserAfterEmail ($email) {
        // M: TODO: Sanitize the $email var;
        $this->query("SELECT * FROM " . $this->tableName . " WHERE email = '" . $email . "'");
        return $this->resultSet();
    }
}

