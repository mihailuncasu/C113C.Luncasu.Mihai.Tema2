<?php //models;

class MainPageAdsModel extends Model {
    
    public function __construct() {
        parent::__construct();
        $this->tableName = "sys_ads";
    }
    
    public function GetImages() {
        $this->query("SELECT * FROM ".$this->tableName);
        return $this->resultSet();     
    }
}
