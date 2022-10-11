<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'emp';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// mysqli_close($link);

if (isset($_POST['register_Btn'])) {

    $username = $_POST['username'];
    $passwd = $_POST['password'];
    $gender = $_POST['gender'];
}

if ($username != "" && $password != "" && $gender != "") {

    $error_msg = 'Please fill out the required fields.';
}

// checking double usernames
$query = mysqli_query($link, "SELECT * FROM register WHERE username='{$username}'");
if (mysqli_num_rows($query) == 0){
 
    $id = '';
    $passwd = md5($passwd);
}
else{
    $error_msg = 'The username <i>'.$username.'</i> is already taken. Please use another.';
}
   

// inserting....

$sql ="INSERT INTO register (`username`,`password`,`gender`)
VALUES ('$username','$passwd','$gender') ";

$retval=mysqli_query($link,$sql);

// verify the user's account was created
$query = mysqli_query($link, "SELECT * FROM register WHERE username='{$username}'");
if (mysqli_num_rows($query) == 1){
    $success = true;
}
else
    $error_msg = 'An error occurred and your account was not created.';    


    mysqli_close($link);
?>

<!-- The Design  -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST">
<?php

if (isset($success) && $success == true) {
    echo '<p color="green">Your account has been created.<p>';
}

else if (isset($error_msg)) {
    echo '<p color="red">' . $error_msg . '</p>';
}

?>

<label  for='username'>username</label>
<input  type="text" name="username" id="username" placeholder="username" required>
<br>
<label for='username'>password</label>
<input type='password' name="password" id="password" placeholder="password" required>
<br>
<label for='gender'>Gender</label>
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female
   <br>
   <input type="submit" name="register_Btn" value="Register" />
</form>
</body>
</html>