<?php 

class ProductsModel extends Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = "adm_products";
    }
    
    public function GetPromotions() {
        $this->query("SELECT * FROM ".$this->tableName." WHERE promotion = '1'");
        return $this->resultSet();
    }
    
    public function GetProductById($id) {
        $this->query("SELECT * FROM ".$this->tableName." WHERE id = '".$id."'");
        return $this->resultSet()[0];
    }
}