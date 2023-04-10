<?php  
require_once("../libraries/database.php");

function isLoggedin()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) 
    {
       
        header('Location: /home.php');
        return true;
      }
    else{
        return false;
    } ;
}


//Page de connexion.

$this->data= new Database();

// On cree une session pour l'utilisateur.
session_start();

//Logins pour la base de donnee MariaDB.
//Gestion d'erreur si la connexion a la BDD echoue.
if ($this->data->_connection->connect_error) 
{
 die("Connection failed: " . $this->data->_connection->connect_error);
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
  $result = $this->data->_connection->query($query);
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


?>
    
   
    




















?>

