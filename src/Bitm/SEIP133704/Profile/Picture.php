<?php
namespace App\Bitm\SEIP133704\Profile; //Declared project namespace
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\Profile\Uses;

class Picture
{
    public $id  = "";
    public $name = "";
    public $image_name = "";
    public $pageNumber;
    public $fromtrash = false;

    public $nameFilter = "";
    public $resourceFilter = "";
    public $search = "";

    public $conn;
    public $dbName = "shibli_atomicprojectB22_133704";
    public $user = "shibli_atomic";
    public $host = "localhost";
    public $password = "atomic744254";
    public $tableName = "profilepicture"; //Don't Change this. It will make data missing.
    public $tableColumn1 = "id";
    public $tableColumn2 = "name";
    public $tableColumn3 = "images";
    public $tableColumn4 = "deleted_at";
    public $tableColumn5 = "active";
    public $tableColumn4Input = NULL;



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

    } //Runs this magic method every time class is used. Database linked, Created if there is no database. Connect to database.

    public function prepare ($data="")
    {
        if(isset($data['nameFilter']) && array_key_exists("nameFilter",$data)){
            $this->nameFilter = $data['nameFilter'];

        }
        if(isset($data['resourceFilter']) && array_key_exists("resourceFilter",$data)){
            $this->resourceFilter = $data['resourceFilter'];

        }
        if(array_key_exists("search",$data)){
            $this->search = $data['search'];

        }

        if (array_key_exists("name", $data)) {
            $this->name = $data['name'];
        }
        if (array_key_exists("image", $data)) {
            $this->image_name = $data['image'];
        }
        if (array_key_exists("id", $data)) {
            $this->id = $data['id'];
        }
        if(array_key_exists("bringBackPage",$data)){
            $this->pageNumber = $data['bringBackPage'];

        }
        if(array_key_exists("fromtrash",$data)){
            $this->fromtrash = $data['fromtrash'];
        }

        return  $this;


    } //Prepare data arived as array. Matched the index and assigned in variables to use in sql.
    public function store()
    {
        $querySelectTable = "SELECT $this->tableColumn1 FROM $this->tableName";
        $resultSelectTable = mysqli_query($this->conn, $querySelectTable);

        if(empty($resultSelectTable)) {
            $queryCreateTable = "CREATE TABLE $this->tableName (
                          $this->tableColumn1 int(11) AUTO_INCREMENT,
                          $this->tableColumn2 varchar(255) ,
                          $this->tableColumn3 varchar(255) ,
                          $this->tableColumn4 varchar(255) NULL,
                          $this->tableColumn5 varchar(255) NULL,
                          PRIMARY KEY  ($this->tableColumn1)
                          )";
            $resultCreateTable = mysqli_query($this->conn, $queryCreateTable);
        }
        $queryInsert = "INSERT INTO `".$this->dbName."`.`".$this->tableName."` ( `".$this->tableColumn2."`, `".$this->tableColumn3."`) VALUES ( '".$this->name."','".$this->image_name."')";

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


    } //Creates a table if there is no table. Then stored data in the table.

    public function index()
    {
        $andSql  = "AND 1=1 ";
        if(!empty($this->resourceFilter)){
            $andSql .= " AND  $this->tableColumn4 LIKE '%".$this->search."%'";
        }
        if(!empty($this->nameFilter)){
            $andSql .= " AND  $this->tableColumn2 LIKE '%".$this->search."%'";
        }
        if(!empty($this->resourceFilter) && !empty($this->nameFilter )) {
            $andSql .= " AND  $this->tableColumn4 LIKE '%".$this->search."%' OR $this->tableColumn2 LIKE '%".$this->search."%'";
        }
        if (empty($this->resourceFilter) && empty($this->nameFilter )) {
            $andSql .= " AND  $this->tableColumn4 LIKE '%".$this->search."%' OR $this->tableColumn2 LIKE '%".$this->search."%'";
        }


        $_list =  array();
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn4` IS NULL  ".$andSql;
        $result =  mysqli_query($this->conn,$query);
        if($result){
            while($row = mysqli_fetch_object($result)){
                $_list[]= $row;
            }
        }
        return $_list;

    } //Returns array of data from database.


    public function view(){
        $query="SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn1."`=".$this->id;
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_object($result);
        return $row;
    }//Return data array of selected id.

    public function update()
    {
        if(!empty($this->image_name)){
            $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn2."` = '".$this->name."',`".$this->tableColumn3."` = '".$this->image_name."' WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;

        }
        else{
            $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn2."` = '".$this->name."' WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;

        }

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been updated  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            if(!empty($this->pageNumber))   Utility::redirect("index.php?pageNumber=$this->pageNumber"); else Utility::redirect("index.php");
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
    } //Update data in the database.

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
            if($this->fromtrash==true) Utility::redirect("trashed.php");
            else {
                if(!empty($this->pageNumber))   Utility::redirect("index.php?pageNumber=$this->pageNumber"); else Utility::redirect("index.php");
            }
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



    } //Delete data from the database.

    public function trash()
    {
        $this->tableColumn4Input = time();
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn4."` = ".$this->tableColumn4Input." WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;


        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Data has been trashed  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            if(!empty($this->pageNumber))   Utility::redirect("index.php?pageNumber=$this->pageNumber"); else Utility::redirect("index.php");
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
    } //Trash data by setting deleted_at field some value.

    public function trashed()
    {
        $_list =  array();
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn4` IS NOT NULL ";
        $result =  mysqli_query($this->conn,$query);
        if($result){
            while($row = mysqli_fetch_object($result)){
                $_list[]= $row;
            }
        }
        return $_list;

    }//Returns data array which deleted_at field have some value. i.e. Trashed data.

    public function recover()
    {
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn4."` = NULL WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-warning\">
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
    } //Recover data means making the deleted_at field updated null.

    public function recoverSelected($IDs= Array() )
    {
        if (is_array($IDs) && count($IDs) > 0) {
            $ids = implode(",",$IDs);
            $query = "UPDATE `" . $this->dbName . "`.`" . $this->tableName . "` SET `" . $this->tableColumn4 . "` = NULL WHERE `" . $this->tableName . "`.`" . $this->tableColumn1 . "` IN (" . $ids. ")";
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
    } //Multiple ID proceesed and updated deleted_at field set NULL.

    public function deleteSelected($IDs= Array() )
    {
        if (is_array($IDs) && count($IDs) > 0) {
            $ids = implode(",",$IDs);
            $query = "DELETE FROM `".$this->dbName."`.`".$this->tableName."` WHERE `".$this->tableName."`.`".$this->tableColumn1."` IN (" . $ids. ")";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("
                        <div id=\"message\" class=\"alert alert-danger\">
                                <strong>Success!</strong> Data has been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
                Utility::redirect("trashed.php");
            } else {
                Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Failure!</strong> Data has not been deleted  successfully.
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
                Utility::redirect("trashed.php");
            }
        }
    } //Deleted data fully from database.

    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `".$this->dbName."`.`".$this->tableName."` WHERE `".$this->tableColumn4."` is NULL";
        $result=mysqli_query($this->conn,$query);
        if($result)  $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function countTrash(){
        $query="SELECT COUNT(*) AS totalItem FROM `".$this->dbName."`.`".$this->tableName."` WHERE `".$this->tableColumn4."` is NOT NULL";
        $result=mysqli_query($this->conn,$query);
        if($result)  $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$limit=5){
        $_list = array();
        $query="SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn4."` is NULL ORDER BY `".$this->tableColumn1."` ASC LIMIT ".$pageStartFrom.", ".$limit ;
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
        $query="SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn4."` is NOT NULL ORDER BY `".$this->tableColumn1."` ASC LIMIT ".$pageStartFrom.", ".$limit ;
        $result = mysqli_query($this->conn, $query);
        if ($result){
            while ($row = mysqli_fetch_object($result)) {
                $_list[] = $row;
            }
        }


        return $_list;

    }

    public function dataselected($IDs = "")
    {
        $_list = array();
        $ids = implode(",",$IDs);
        $query = "SELECT * FROM `".$this->tableName."` WHERE `".$this->tableColumn1."` IN (".$ids.")";
        $result = mysqli_query($this->conn,$query);
        if($result){
            while ($row = mysqli_fetch_object($result)){
                $_list[] = $row;
            }
        }
        return $_list;

    }


    public function active()
    {
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn5."` = NULL ";
        $result = mysqli_query($this->conn,$query);

        $active = time();
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn5."` = '".$active."' WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;


        $result = mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Success!</strong> Activated Profile Picture 
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            if(!empty($this->pageNumber))   Utility::redirect("index.php?pageNumber=$this->pageNumber"); else Utility::redirect("index.php");
        }
    }

    public function deactive()
    {
        $query="UPDATE `".$this->dbName."`.`".$this->tableName."` SET `".$this->tableColumn5."` = NULL WHERE `".$this->tableName."`.`".$this->tableColumn1."` = ".$this->id;

        $result = mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong></strong> Deactivated Profile Picture 
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
            if(!empty($this->pageNumber))   Utility::redirect("index.php?pageNumber=$this->pageNumber"); else Utility::redirect("index.php");
        }
    }

    public function getActive()
    {
        $row = "";
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn5` IS NOT NULL  ";
        $result = mysqli_query($this->conn,$query);
        if($result) {
            $row = mysqli_fetch_object($result);
        }
        return $row;
    }

    public function getAllFirstSearch()
    {

        $_all = array();
        $query = "SELECT * FROM $this->tableName WHERE `$this->tableColumn4` IS NULL";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            if(!empty($this->resourceFilter)){
                $_all[] = $row["$this->tableColumn3"];
            }
            if(!empty($this->nameFilter)){
                $_all[] = $row["$this->tableColumn2"];

            }
            if(!empty($this->search)){
                $_all[] .= $row["$this->tableColumn2"];
                $_all[] .= $row["$this->tableColumn3"];

            }
            $_all[] = $row["$this->tableColumn3"];
            $_all[] = $row["$this->tableColumn2"];


        }

        return $_all;


    }



}
