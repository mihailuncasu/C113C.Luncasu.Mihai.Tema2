<?php

class TransactionModel extends Model {
    
    public function __construct() {
        parent::__construct();
        $this->tableName = "shp_transactions";
    }
    
    public function Insert($id_user, $id_product, $quantity) {
        $this->query("INSERT INTO $this->tableName (id_user, id_product, quantity) VALUES ('$id_user', '$id_product', '$quantity')");
        $this->execute();
    }
    
    public function GetTransactionsById($id) {
        $this->query("SELECT * FROM $this->tableName WHERE id_user = '$id'");
        return $this->resultSet();
    }
}
