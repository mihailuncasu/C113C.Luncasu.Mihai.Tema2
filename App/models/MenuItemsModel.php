<?php //models;

class MenuItemsModel extends Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = "sys_menu_items";
    }
    
    public function GetItems() {
        $this->query("SELECT * FROM ".$this->tableName);
        return $this->resultSet();        
    }
}