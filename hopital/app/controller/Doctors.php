<?php
require_once("../helpers/session_helpers.php");
require_once("../models/doctor.php");
require_once("../libraries/database.php");
require_once("/pages.php");


class Doctors extends AbstractController {

    private $email;
    private $name_err;
    private $passwd;
    private $gender_err;
    private $specialist_err;
       

    private $data=[
            "email"=>"",
            "passwd"=>"",
            "email_error"=>"",
            "passwd_error"=>""
        ];

    public function __construct() {
        $this->UserModel = $this->load("Doctor");
    }



    /*
    public function login() {
        // Vérifier si l'utilisateur a soumis le formulaire de connexion
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $data = ["email"=>$_POST['email'],"passwd" =>$_POST['passwd'], "email_error"=>[''], "passwd_error"=>['']];
           
    
            // Vérifier si l'utilisateur existe dans la base de données
            $user = $this->UserModel->findDoctorByEmail($email);
    
            if (!$user) {
                // L'utilisateur n'existe pas, afficher un message d'erreur
                $this->set("error", "L'utilisateur n'existe pas");
            } else {
                // Vérifier si le mot de passe est correct
                if (passwd_verify($passwd, $user->passwd)) {
                    // Le mot de passe est correct, connecter l'utilisateur
                    $_SESSION["user"] = $user;
                    $this->redirect("/dashboard");
                } else {
                    // Le mot de passe est incorrect, afficher un message d'erreur
                    $this->set("error", "Le mot de passe est incorrect");
                }
            }
            $this->render("/doctors/login.php", $data);
        } */
        
        public function login() {
            session_start();
            if (isset($_POST['submit'])) 
            {
            $email = $_POST['email'];
            $passwd = $_POST['passwd'];
           

            //les logins des utilisateurs qui ont acces au serveur sont dans la table 'users' de la base de donnee 'mylogin_page' de mon localhost server. On cherche si ces logins sont identiques a une entite du tableau. 

            $query = "SELECT * FROM doctor WHERE email=\"$email\" AND passwd=\"$passwd\"";
            $result = $conn->query($query);

            //Si les logins existent on cree une session pour l'utilisateur et on utilise un header pour le renvoyer vers la page home.
            if ($result->num_rows > 0) 
            {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header('Location: ../views/views.php');
            } 
            else 
            { // mauvais logins.
                echo "\t \t \t Invalid email or password";
            }
            }




            //On verifie si l'utilisateur a deja une session en cours, si oui on le redirige vers la page home.
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            header('Location: ../views/views.php');
            }}

        // Afficher le formulaire de connexion
       // $this->render("/doctors/login.php", $data);
    
    
    public function registerDoctor($c)
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
            }
            echo "var";
            $c = new Doctor();
            echo "instance";
            $c->create($name, $email, $passwd, $specialist, $gender);
            echo "create";
            
    }}
    
    public function createDoctorSession($doctor){
        $_SESSION['doctor_id']=$doctor->id;
        $_SESSION['doctor_name']=$doctor->name;
        $_SESSION['doctor_email']=$doctor->email;
        
        direct('patients');
    }
}
    





$db->login();
