<?php
require_once("../config/config.php");
class Database {
  private $servername = DB_HOST;
  private $username = DB_USER;
  private $password = DB_PASS;
  private $dbname = DB_NAME;
  private $_connection = null;
  private $connect_error = "";
  private $query = "";
    public function __construct()
    {
        
            try {
              $this->_connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            } catch (PDOException $exception) 
            {
                echo "Erreur de connexion : " . $exception->getMessage();
            }
    }
    
    public function query($query) {
      
      $this->query = $this->_connection->prepare($query);
       
      
        if ($this->_connection->connect_error) {
          die("Connection failed: " . $this->_connection->connect_error);
        
        }
        return $this->query;
      }

    
      
      Public function execute(){
        return $this->query->execute();
      }
    
      public function single(){
        $this->execute();
        return $this->query->fetch();
      }

      public function rowcount(){
        return $this->query->rowCount();
      }

      public function resultSet(){
        $this->execute();
        $this->query->fetchAll();

      }
      
    }


$d = new Database();




session_start();

//Logins pour la base de donnee MariaDB.
//Gestion d'erreur si la connexion a la BDD echoue.
if ($this->d->_connection->connect_error) 
{
 die("Connection failed: " . $this->d->_connection->connect_error);
}

//Si un email et un mot de passe est entre par l'utilisateur.
if (isset($_POST['submit'])) 
{
  $email = $_POST['email'];
  $passwd = $_POST['passwd'];
echo $email;
echo $passwd;

//les logins des utilisateurs qui ont acces au serveur sont dans la table 'users' de la base de donnee 'mylogin_page' de mon localhost server. On cherche si ces logins sont identiques a une entite du tableau. 

  $query = "SELECT * FROM doctor WHERE email=\"$email\" AND passwd=\"$passwd\"";
  echo $query;
  $result = $this->d->_connection->query($query);
  echo $result;

  //Si les logins existent on cree une session pour l'utilisateur et on utilise un header pour le renvoyer vers la page home.
  if ($result->num_rows > 0) 
  {
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    header('Location: ../views/inc/home.php');
  } 
  else 
  { // mauvais logins.
    echo "\t \t \t Invalid email or password";
  }
}




//On verifie si l'utilisateur a deja une session en cours, si oui on le redirige vers la page home.
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  header('Location: ../views/inc/home.php');
}

