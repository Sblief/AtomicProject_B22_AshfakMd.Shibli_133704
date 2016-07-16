<?php
namespace App\Bitm\SEIP133704\OrganizationSummary;

use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

class Summary
{
    public $id  = "";
    public $summary = "";
    public $summaryNoTag = "";
    public $name = "";
    public $pageNumber;
    public $fromtrash = false;

    public $conn;
    public $dbName = "shibli_atomicprojectB22_133704";
    public $user = "shibli_atomic";
    public $host = "localhost";
    public $password = "atomic744254";
    public $tableName = "orgsummary"; //Don't Change this. It will make data missing.
    public $tableColumn1 = "id";
    public $tableColumn2 = "name";
    public $tableColumn3 = "summary";
    public $tableColumn4 = "summaryTagRemoved";
    public $tableColumn5 = "deleted_at";
    public $tableColumn5Input = NULL;

    public $created = "";
    public $created_by = "";
    public $modified = "";
    public $modified_by = "";


    public function __construct()
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
        if(array_key_exists("summary",$data)){
            $this->summary = $data['summary'];
            $this->summaryNoTag = strip_tags($this->summary);

        }
        if(array_key_exists("name",$data)){
            $this->name = $data['name'];

        }
        if(array_key_exists("id",$data)){
            $this->id = $data['id'];

        }
        if(array_key_exists("bringBackPage",$data)){
            $this->pageNumber = $data['bringBackPage'];

        }
        if(array_key_exists("fromtrash",$data)){
            $this->fromtrash = $data['fromtrash'];
        }


    }
    public function store()
    {
        $querySelectTable = "SELECT $this->tableColumn1 FROM $this->tableName";
        $resultSelectTable = mysqli_query($this->conn, $querySelectTable);

        if(empty($resultSelectTable)) {
            $queryCreateTable = "CREATE TABLE $this->tableName (
                          $this->tableColumn1 int(11) AUTO_INCREMENT,
                          $this->tableColumn2 varchar(255),
                          $this->tableColumn3 text,
                          $this->tableColumn4 text,
                          $this->tableColumn5 varchar(255) NULL,
                          PRIMARY KEY  ($this->tableColumn1)
                          )";
            $resultCreateTable = mysqli_query($this->conn, $queryCreateTable);
        }

        $queryInsert = "INSERT INTO `".$this->dbName."`.`".$this->tableName."` ( `".$this->tableColumn2."`,`".$this->tableColumn3."` ,`".$this->tableColumn4."`) VALUES ( '".$this->name."','".$this->summary."' ,'".$this->summaryNoTag."')";
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
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn5` IS NULL ";
        $result =  mysqli_query($this->conn,$query);
        if($result){
            while($row = mysqli_fetch_object($result)){
                $_list[]= $row;
            }
        }
        return $_list;

    }


    public function view(){
        $query="SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn1."`=".$this->id;
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_object($result);
        return $row;
    }
    public function update()
    {
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn2."` = '".$this->name."',`".$this->tableColumn3."` = '".$this->summary."' ,`".$this->tableColumn4."` = '".$this->summaryNoTag."' WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
      
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been updated  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php?pageNumber=$this->pageNumber");
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

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            if($this->fromtrash==true) Utility::redirect("trashed.php");
            else Utility::redirect("index.php?pageNumber=$this->pageNumber");
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
        $this->tableColumn5Input = time();
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn5."` = ".$this->tableColumn5Input." WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
       

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been trashed  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            Utility::redirect("index.php?pageNumber=$this->pageNumber");
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
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn5` IS NOT NULL ";
        $result =  mysqli_query($this->conn,$query);
        if($result){
            while($row = mysqli_fetch_object($result)){
                $_list[]= $row;
            }
        }
        return $_list;

    }
    public function recover()
    {
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn5."` = NULL WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
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
            $query = "UPDATE `" . $this->dbName . "`.`" . $this->tableName . "` SET `" . $this->tableColumn5 . "` = NULL WHERE `" . $this->tableName . "`.`" . $this->tableColumn1 . "` IN (" . $ids. ")";
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
                Utility::redirect("trashed.php");
            } else {
                Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Failure!</strong> Data has not been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
                Utility::redirect("trashed.php");
            }
        }
    }
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `".$this->dbName."`.`".$this->tableName."` WHERE `".$this->tableColumn5."` is NULL";
        $result=mysqli_query($this->conn,$query);
        if($result)  $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function countTrash(){
        $query="SELECT COUNT(*) AS totalItem FROM `".$this->dbName."`.`".$this->tableName."` WHERE `".$this->tableColumn5."` is NOT NULL";
        $result=mysqli_query($this->conn,$query);
        if($result)  $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$limit=5){
        $_list = array();
        $query="SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn5."` is NULL ORDER BY `".$this->tableColumn1."` ASC LIMIT ".$pageStartFrom.", ".$limit ;
        $result = mysqli_query($this->conn, $query);
        if ($result){
            while ($row = mysqli_fetch_object($result)) {
                $_list[] = $row;
            }
        }


        return $_list;

    }
    public function paginatorTrash($pageStartFrom=0,$limit=5){
        $_list = array();
        $query="SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn5."` is NOT NULL ORDER BY `".$this->tableColumn1."` ASC LIMIT ".$pageStartFrom.", ".$limit ;
        $result = mysqli_query($this->conn, $query);
        if ($result){
            while ($row = mysqli_fetch_object($result)) {
                $_list[] = $row;
            }
        }


        return $_list;

    }





}
