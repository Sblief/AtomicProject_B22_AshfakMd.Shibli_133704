<?php
namespace App\Bitm\SEIP133704\Hobby;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;

class Hobby
{
    public $id  = "";
    public $title = "";

    public $conn;
    public $dbName = "atomicprojectB22_133704";
    public $user = "root";
    public $host = "localhost";
    public $password = "";
    public $tableName = "hobbies"; //Don't Change this. It will make data missing.
    public $tableColumn1 = "ID";
    public $tableColumn2 = "hobby_list";
    public $tableColumn3 = "deleted_at";
    public $tableColumn3Input = NULL;

    public $created = "";
    public $created_by = "";
    public $modified = "";
    public $modified_by = "";


    public function __construct($hobby = false)
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

        $data = explode(",",$data);
        if(array_key_exists("hobby",$data)){
            $this->title = $data['hobby'];
            

        }
        if(array_key_exists("id",$data)){
            $this->id = $data['id'];

        }


    }
    public function store()
    {
        $querySelectTable = "SELECT $this->tableColumn1 FROM $this->tableName";
        $resultSelectTable = mysqli_query($this->conn, $querySelectTable);

        if(empty($resultSelectTable)) {
            $queryCreateTable = "CREATE TABLE $this->tableName (
                          $this->tableColumn1 int(11) AUTO_INCREMENT,
                          $this->tableColumn2 varchar(255) NOT NULL,
                          $this->tableColumn3 varchar(255) NULL,
                          PRIMARY KEY  ($this->tableColumn1)
                          )";
            $resultCreateTable = mysqli_query($this->conn, $queryCreateTable);
        }
        $queryInsert = "INSERT INTO `".$this->dbName."`.`".$this->tableName."` ( `".$this->tableColumn2."`) VALUES ( '".$this->title."')";

        $resultInsert=mysqli_query($this->conn,$queryInsert);
        if($resultInsert){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been stored  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been stored successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }


    }

    public function index()
    {
        $_list =  array();
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn3` IS NULL ";
        $result =  mysqli_query($this->conn,$query);
        while($row = mysqli_fetch_object($result)){
            $_list[]= $row;
        }
        return $_list;

    }


    public function view(){
        $query="SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn1."`=".$this->id;
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row;
    }
    public function update()
    {
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn2."` = '".$this->title."' WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
        echo $query;
        die();

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been updated  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been updated  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
    }
    public function delete()
    {

        $query="DELETE FROM `".$this->dbName."`.`".$this->tableName."` WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
        //echo $query;

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }



    }

    public function trash()
    {
        $this->tableColumn3Input = time();
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn3."` = ".$this->tableColumn3Input." WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
        echo $query;

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been trashed  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been trashed.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
    }
    public function trashed()
    {
        $_list =  array();
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn3` IS NOT NULL ";
        $result =  mysqli_query($this->conn,$query);
        while($row = mysqli_fetch_object($result)){
            $_list[]= $row;
        }
        return $_list;

    }
    public function recover()
    {
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn3."` = NULL WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been recovered  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been recovered  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php");
        }
    }

    public function recoverSelected($IDs= Array() )
    {
        if (is_array($IDs) && count($IDs) > 0) {
            $ids = implode(",",$IDs);
            $query = "UPDATE `" . $this->dbName . "`.`" . $this->tableName . "` SET `" . $this->tableColumn3 . "` = NULL WHERE `" . $this->tableName . "`.`" . $this->tableColumn1 . "` IN (" . $ids. ")";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been recovered  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
                Utility::redirect("index.php");
            } else {
                Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been recovered  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
                Utility::redirect("index.php");
            }
        }
    }

    public function deleteSelected($IDs= Array() )
    {
        if (is_array($IDs) && count($IDs) > 0) {
            $ids = implode(",",$IDs);
            $query = "DELETE FROM `".$this->dbName."`.`".$this->tableName."` WHERE `".$this->tableName."`.`".$this->tableColumn1."` IN (" . $ids. ")";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
                Utility::redirect("index.php");
            } else {
                Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
                Utility::redirect("index.php");
            }
        }
    }

    public static function checked ($data = "", $array = Array()){
        
        $hobbyArray = $array;
        if(in_array($data,$hobbyArray)){
            echo "checked";
        }
        else echo "";


    }





}
