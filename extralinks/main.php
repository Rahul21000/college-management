<?php
class Person{
    public $sname;
    public $lname;
    public $age;
    public $gender;
    public $phone;
    public $email;
    public $password;
    public $address;
}
class User extends Person{
    public $uid;
    public $applica;
    public $role;
    function login($enrole,$passwd){

    }
    function logout($enrole,$passwd){

    }
}
class Admin extends User{
    function addCource($id,$details){}
    function removeCource($id){}
    function addFaculty($id,$name,$details){}
    function addStudent($applica,$field){}
    function removeFaculty($id){}
    function modifyStudent($id,$details,$newvalue){}
    function removeStudent($applica){}
    function manageAttenance(){}
}
class Student extends User{
    public $grade;
    function checkattendance($date){}
    function checkTimeTable(){}
    function internalMarks(){}
    function raiseIssue(){}

}
class Faculty extends User{
    function addAttendance($studentId,$studentNAME,$ispresent,$date){}
    function addTimeTable(){}
    function addmarks($studentId,$subjectId,$marks){}
    function generateReports($studentId){}

}
class Issues{
    public $issuesId;
    public $type;
    public $description;
    function resolveIssue(){}

}


?>