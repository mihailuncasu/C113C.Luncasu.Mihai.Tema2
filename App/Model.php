<?php 
namespace App;

    abstract class Model {
        protected $stmt;
        protected $dbh;
        protected $error;
        protected $tableName;
    
        public function __construct() {
            // M: Building up the connection string;
            $connectionString = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
            try {
                $this->dbh = new PDO($connectionString, DB_USER, DB_PASS);
            }
            catch (PDOException $connectionError) {
                $this->error = $connectionError->getMessage();
                echo $this->error;
            }
        }
        
        // M: Preparing the query to be executed;
        public function query($query) {
            $this->stmt = $this->dbh->prepare($query);
        }

        // M: Binding params in order to have a clean sql statement that will be executed;
        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
           }
           $this->stmt->bindValue($param, $value, $type);
       }
       
        // M: Execute the statement;
        public function execute() {
            $this->stmt->execute();
	}
        
        // M: Fetching all the data that has to be returned;
	public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        /* 
         * M: Function used to check the last inserted id. Helpful when we want
         * to check if the last insertion has been successfully executed;
         */
        public function lastInsertId() {
            return $this->dbh->lastInsertId();
        }

        // M: Used to get just a single row;
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>