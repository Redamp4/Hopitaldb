<?php
    require_once ('../libraries/database.php');
    

    class Doctor{
    private $db;
    private $table ="doctor";
    private $id;
    private $email;
    private $name;
    private $passwd;
    private $gender;
    private $specialist;

  

    public function __construct()
    {
        $this->db = new Database();
    }
    public function findDoctorByEmail($email)
    {   
        $sql = "SELECT * FROM " . $this->table . " where email=" . $email;
        echo '2';
        $query = $this->db->prepare($sql);
        echo '3';
        $query->bindParam(":email", $email);
        echo '0';
        $query->execute();
        echo '1';
        return $query->fetch();

    }
    public function create($name, $email, $passwd, $specialist, $gender)
    {   
       
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // validate name
            if(empty(trim($_POST["name"]))){
                $name_err = "Please enter your name.";
            } else{
                $name = trim($_POST["name"]);
            }
            
            // validate email
            if(empty(trim($_POST["email"]))){
                $email_err = "Please enter your email.";
            } else{
                $email = trim($_POST["email"]);
            }
            
            // validate password
            if(empty(trim($_POST["passwd"]))){
                $password_err = "Please enter a password.";
            } else{
                $passwd = trim($_POST["passwd"]);
            }
        
            // validate specialist
            if(empty($_POST["specialist"])){
                $specialist_err = "Please select your specialist.";
            } else{
                $specialist = $_POST["specialist"];
            }
        
            // validate gender
            if(empty($_POST["gender"])){
                $gender_err = "Please select your gender.";
            } else{
                $gender = $_POST["gender"];
            }}

              //INSERT INTO doctor (name, email, passwd, specialist, gender) VALUES ('gis','gis@toto.com', 'password123', 'dentiste', 'Male');

        $sql = "INSERT INTO doctor (name, email, passwd, specialist, gender) VALUES ( \"$name\", \"$email\", \"$passwd\", \"$specialist\", \"$gender\");"; 
        $this->db->query($sql);
        $this->db->execute();
        header("location:../views/inc/login.php");
    
    }

    function redirect(){
        header("location:../views/inc/login.php");
    }

}


    $c = new Doctor();
    $c->create($name, $email, $passwd, $specialist, $gender);
    header("location:../views/inc/login.php");
















/*
$doctor = new Doctor();
echo "Création doctor";
$doctor->create('momo', 'momo@toto.com', 'password123', 'dentiste', 'Male');
$result = $doctor->findDoctorByEmail('gis@toto.com');
echo "Voici l'email:\n";
echo ($result); */


    
/* 
// pverification des donnees rentrees
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        $name = trim($_POST["name"]);
    }
    

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["passwd"]))){
        $password_err = "Please enter a password.";
    } else{
        $passwd = trim($_POST["passwd"]);
    }

    if(empty($_POST["specialist"])){
        $specialist_err = "Please select your specialist.";
    } else{
        $specialist = $_POST["specialist"];
    }

    if(empty($_POST["gender"])){
        $gender_err = "Please select your gender.";
    } else{
        $gender = $_POST["gender"];
    }

}*/
