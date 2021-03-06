<?php //namespace models;

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
        $dataSet = $this->resultSet();
        if ($dataSet) {
            return $dataSet[0];
        } else {
            return ;
        }
    }
    
    public function GetProductsByCategory($category) {
        $this->query("SELECT * FROM ".$this->tableName." WHERE category = '". $category ."'");
        return $this->resultSet();
    }
    
    public function GetLikeName($name) {
        $this->query("SELECT * FROM $this->tableName WHERE name LIKE '%$name%'");
        return $this->single();
    }
}