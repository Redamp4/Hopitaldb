


<?php
require_once ('../libraries/database.php');
require_once ('../config/config.php');

class Patient{
    private $db;
    private $table ="patient";
    private $id_patient;
    private $email;
    private $name;
    private $phone;
    private $health_condition;
    private $updated_at;

    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPatient($name, $email, $phone, $health_condition, $updated_at)
    {   


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
    if(empty(trim($_POST["health_condition"]))){
        $password_err = "Please enter a password.";
    } else{
        $health_condition = trim($_POST["health_condition"]);
    }

    if(empty(trim($_POST["phone"]))){
        $password_err = "Please enter a password.";
    } else{
        $phone = trim($_POST["phone"]);
    }
        $sql = "INSERT INTO patient (name, email, phone, health_condition, updated_at) VALUES ( \"$name\", \"$email\", \"$phone\", \"$health_condition\", \"$updated_at\");"; 
        $this->db->query($sql);
        $this->db->execute();
        header("location:../views/patients.php");
    }

    public function deletePatient($id_patient){
        $sql = "DELETE FROM " . $this->table . " where id_patient=" . $id_patient;
        $this->db->query($sql);
        $this->db->execute();
        header("location:../views/patients.php");
    }

   

    public function showAllPatients()
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->query($sql);
    
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>Health Condition</th>";
            echo "<th>Updated At</th>";
            echo "</tr>";
    
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_patient'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['health_condition'] . "</td>";
                echo "<td>" . $row['updated_at'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
    

    public function showPatients($id_patient){
        $sql = "SELECT * FROM $this->table WHERE id_patient=$id_patient";
        $result = $this->db->query($sql);
    
        // Print the row
        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            foreach($row as $key => $value) {
                echo $key . ": " . $value . "<br>";
            }
        } else {
            echo "0 results";
        }
    }


}

$patient = new Patient();
$patient->showAllPatients();
$patient->addPatient($name, $email, $phone, $health_condition, $updated_at);
    
