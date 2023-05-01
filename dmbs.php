<?php

class Database{
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $dbname="jiwaji";
    private $conn="false";
    private $mysqli="";
    private $result=array(); 

    // public function __contruct(){
    //     if(!$this->$conn){
    //         $this->mysqli=new mysqli($this->servernsme,$this->username,$this->password,$this->dbname);
    //         if($this->mysqli->connect_error){
    //            array_push($this->result,$this->mysqli->connect_error);
    //            return false;
    //         }
    //     }
    //     else{
    //         return true;
    //     }
    // }
    // public function insert($table,$params=array()){
        if(this->tableExists($table)){
            $column_table=implode(',',array_keys($params));
            $column_value=implode("','",$params);
            $sql="insert into $table ($column_table) values ('$column_value')";
            if($this->mysqli->query($sql)){
                array_push($this->result,$this->mysqli->insert_id);
                return true;
            }
            else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
        }
        else{
             return false;
        }
    }
    public function update(){
        }

    
    public function delete(){
    
    }
    public function select(){

    }
    private function tableExists($table){
        $sql="show tables from $this->dbname like '$table'";
        $tableindb=this->mysqli->query($sql);
        if($tableindb){
        if($tableindb->mysqli_num_row==1){
            return true;
        }
        else{
            array_push($this->result,$table." does not exists");
            return false;}
         }   

    }
     public function getresult(){
        $val=$this->result;
        $this->result=array();
        return $val;
    }
    public function __destruct(){
        if($this->$conn){
            if(this->mysqli->close()){
                $this->$conn=false;  
            }
            else{
                return true;
            }
        }
        else{
            return true;
        }

    }
    
}

?>