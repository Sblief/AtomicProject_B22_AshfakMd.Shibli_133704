<?php
    namespace App\Bitm\SEIP133704\BookTitle;
    use App\Bitm\SEIP133704\BookTitle\Message;
    use App\Bitm\SEIP133704\BookTitle\Utility;

    class Book
    {
        public $id  = "";
        public $title = "";

        public $conn;
        public $dbName = "atomicprojectB22_133704";
        public $user = "root";
        public $host = "localhost";
        public $password = "";
        public $tableName = "book"; //Don't Change this. It will make data missing.
        public $tableColumn1 = "ID";
        public $tableColumn2 = "bookTitle";

        public $created = "";
        public $created_by = "";
        public $modified = "";
        public $modified_by = "";
        public $deleted_at = "";

        public function __construct($book = false)
        {
            $this->link = mysqli_connect($this->host,$this->user,$this->password) or die("Database linking failed");
            $db_select = mysqli_select_db($this->link,$this->dbName);
            if (!$db_select){
                $createDb = "CREATE DATABASE $this->dbName";
                $dbCreate = mysqli_query($this->link,$createDb);
                if (!$dbCreate){
                    echo "Database creation Failed";
                }
            }
            $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->dbName) or die("Database connection failed");
            
        }
        
        public function prepare ($data="")
        {
            if(array_key_exists("title",$data)){
                $this->title = $data['title'];

            }
            if(array_key_exists("id",$data)){
                $this->title = $data['id'];

            }


        }
        public function store()
        {
            $querySelectTable = "SELECT $this->tableColumn1 FROM $this->tableName";
            $resultSelectTable = mysqli_query($this->conn, $querySelectTable);

            if(empty($resultSelectTable)) {
                $queryCreateTable = "CREATE TABLE $this->tableName (
                          $this->tableColumn1 int(11) AUTO_INCREMENT,
                          $this->tableColumn2 varchar(100) NOT NULL,
                          PRIMARY KEY  ($this->tableColumn1)
                          )";
                $resultCreateTable = mysqli_query($this->conn, $queryCreateTable);
            }
            $queryInsert = "INSERT INTO `".$this->dbName."`.`".$this->tableName."` ( `".$this->tableColumn2."`) VALUES ( '".$this->title."')";

            $resultInsert=mysqli_query($this->conn,$queryInsert);
            if($resultInsert){
                echo "Data has been stored successfully";
            }
            else {
                echo "Error";
            }
            
            
        }

        public function index()
        {
            $_bookList =  array();
            $query = "SELECT * FROM $this->tableName ";
            $result =  mysqli_query($this->conn,$query);
            while($row = mysqli_fetch_object($result)){
                $_bookList[]= $row;
            }
            return $_bookList;

        }

        public function create()
        {
            echo "I am create form";

        }
        
        public function edit()
        {
            echo "I am editing data";

        }
        public function view(){
            echo "I am viewing data";

        }
        public function update()
        {
            echo "I am updating data";

        }
        public function delete()
        {
            echo "I delete data";

        }
    }
