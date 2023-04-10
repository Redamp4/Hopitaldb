


<?php require_once( 'navbar.html');?>
<div w3-include-html="navbar.html"></div> 


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../public/css/login_style.css">

	<title>Patient Management System</title>
</head>
<body>
	<h1>Patient Management System</h1>
	
	<!-- Add Patient Form -->
    <h2>Patient Database</h2>
    
    <link rel="stylesheet" type="text/css" href="../../public/css/register_style.css">
    <div w3-include-html="navbar.html"></div> 
    

    <form method="post" action="../models/patient.php">
        

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span><?php echo $name_err; ?></span>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <span><?php echo $email_err; ?></span>
        </div>

        <div>
            <label for="phone">Phone:</label>
        <input type="phone" id="phone" name="phone"><br><br>
        <span><?php echo $phone_err; ?></span>
    </div>

    <div>
        <label>Health Condition:</label>
        <select name="health_condition">
            <option value="">Health Condition</option>
            <option value="simple" <?php if($health_condition == "simple") echo "selected"; ?>>Simple</option>
            <option value="generaliste" <?php if($health_condition == "modere") echo "selected"; ?>>Modere</option>
            <option value="critique" <?php if($health_condition == "critique") echo "selected"; ?>>Critique</option>
        </select>
        <span><?php echo $health_err; ?></span>
    </div>



    <div>
        <input type="submit" value="Register">
    </div>

</form>

	
	<hr>
	
	<!-- Delete Patient Form -->
	<h2>Delete Patient</h2>
	<form action="../models/patient.php" method="post">
		<label for="id_patient">Patient ID:</label>
		<input type="text" name="id_patient" id="id_patient"><br><br>
		<input type="hidden" name="action" value="delete">
		<input type="submit" value="Submit">
	</form>
	
	<hr>
	
	<!-- Show All Patients -->
	<h2>All Patients</h2>
	
	
	<hr>
	
	<!-- Show Patient by ID -->
	<h2>Show Patient by ID</h2>
	<form action="../models/patient.php" method="post">
		<label for="id_patient">Patient ID:</label>
		<input type="text" name="id_patient" id="id_patient"><br><br>
		<input type="hidden" name="action" value="show">
		<input type="submit" value="Submit">
	</form>
	
	<hr>
	
	<!-- Update Patient Form -->
	<h2>Update Patient</h2>
	<form action="../models/patient.php" method="post">
		<label for="id_patient">Patient ID:</label>
		<input type="text" name="id_patient" id="id_patient"><br><br>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name"><br><br>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email"><br><br>
		<label for="phone">Phone:</label>
		<input type="tel" name="phone" id="phone"><br><br>
		<label for="health_condition">Health Condition:</label>
		<input type="text" name="health_condition" id="health_condition"><br><br>
		<input type="hidden" name="action" value="update">
		<input type="submit" value="Submit">
	</form>
</body>
</html>
