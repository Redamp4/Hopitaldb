<?php require_once( 'navbar.html');?>

<!DOCTYPE html>

<html>
<head>
    <title>Registeration Page For Doctors</title>
</head>
<body>

    <h2>Registeration Page For Doctors</h2>
    
    <link rel="stylesheet" type="text/css" href="../../public/css/register_style.css">
    <div w3-include-html="navbar.html"></div> 
    

    <form target="_blank" method="post" action="../models/doctor.php">
        

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
            <label for="passwd">Password:</label>
        <input type="passwd" id="passwd" name="passwd"><br><br>
        <span><?php echo $password_err; ?></span>
    </div>

    <div>
        <label>Specialist:</label>
        <select name="specialist">
            <option value="">Choisir la specialite</option>
            <option value="dentiste" <?php if($specialist == "dentiste") echo "selected"; ?>>Dentiste</option>
            <option value="generaliste" <?php if($specialist == "generaliste") echo "selected"; ?>>Généraliste</option>
            <option value="chirurgien" <?php if($specialist == "chirurgien") echo "selected"; ?>>Chirurgien</option>
        </select>
        <span><?php echo $specialist_err; ?></span>
    </div>

    <div>
        
        <input type="radio" name="gender" value="male" <?php if($gender == "male") echo "checked"; ?>>Male
        <input type="radio" name="gender" value="female" <?php if($gender == "female") echo "checked"; ?>>Female
        <span><?php echo $gender_err; ?></span>
    </div>

    <div>
        <input type="submit" onclick="window.location.href='login.php'" value="Register">
    </div>
    <button type="button" onclick="window.location.href='login.php'">Already have an account? Sign in.</button>
</form>

</body>
</html>

<?php header("location:../views/inc/login.php"); ?>