<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<style>
    body{background:#f0f0f0;font-family:Arial;}
    .container{width:40%;margin:auto;background:white;padding:20px;
               border-radius:10px;box-shadow:0 0 10px gray;}
    input{padding:8px;margin:8px 0;width:95%;}
    .error{color:red;font-weight:bold;}
    .alert{background:#ffdddd;border-left:5px solid red;padding:10px;margin-bottom:15px;}
</style>
</head>
<body>

<div class="container">
<h2>Registration Form</h2>
<form method="post">
    Name:<br>
    <input type="text" name="name" value="<?= $name ?>">
    <br>

    Email:<br>
    <input type="text" name="email" value="<?= $email ?>" autocomplete="off">
    <br>

    Password:<br>
    <input type="password" name="password">
    <br>

    Phone:<br>
    <input type="text" name="phone" value="<?= $phone ?>">
    <br>

    <input type="submit" value="Register">
</form>

<?php
$name = $email = $password = $phone = "";
$nameErr = $emailErr = $passErr = $phoneErr = "";
$errorBox = "";

function clean($data){
    return trim($data);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    // NAME
    $name = clean($_POST["name"]);
    if($name=="") $nameErr="Name is required";
    elseif(!preg_match("/^[a-zA-Z ]+$/",$name)) $nameErr="Only letters allowed";

    // EMAIL
    $email = clean($_POST["email"]);
    if($email=="") $emailErr="Email is required";
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) $emailErr="Invalid email";

    // PASSWORD
    $password = clean($_POST["password"]);
    if($password=="") $passErr="Password is required";
    elseif(strlen($password)<6) $passErr="Minimum 6 characters";

    // PHONE
    $phone = clean($_POST["phone"]);
    if($phone=="") $phoneErr="Phone number is required";
    elseif(!preg_match("/^[0-9]{10}$/",$phone)) $phoneErr="Phone must be 10 digits";

    // Show alert box if any error exists
    if($nameErr || $emailErr || $passErr || $phoneErr){
        echo "<div class='alert'>
                <b>Please fix the following errors:</b><br>
                $nameErr<br>
                $emailErr<br>
                $passErr<br>
                $phoneErr
              </div>";
    }
    else{
        echo "<h3 style='color:green;'>Registration Successful!</h3>";
        echo "Name: $name<br>Email: $email<br>Phone: $phone<br>";
    }
}
?>

</div>
</body>
</html>

