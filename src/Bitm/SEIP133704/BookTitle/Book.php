<?php
namespace App\Bitm\SEIP133704\BookTitle;

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
            $querySelectTable = "SELECT ID FROM $this->tableName";
            $resultSelectTable = mysqli_query($this->conn, $querySelectTable);

            if(empty($resultSelectTable)) {
                $queryCreateTable = "CREATE TABLE BOOK (
                          ID int(11) AUTO_INCREMENT,
                          bookTitle varchar(100) NOT NULL,
                          PRIMARY KEY  (ID)
                          )";
                $resultCreateTable = mysqli_query($this->conn, $queryCreateTable);
            }
            $queryInsert = "INSERT INTO `".$this->dbName."`.`".$this->tableName."` ( `bookTitle`) VALUES ( '".$this->title."')";

            $resultInsert=mysqli_query($this->conn,$queryInsert);
            if($resultInsert){
                echo "Data Has been stored sucessfully";
            }
            else {
                echo "Error";
            }
            
            
        }

        public function index()
        {
            echo "I am listing Data";

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
