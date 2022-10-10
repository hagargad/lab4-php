<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You are Now Registered</title>
</head>
<body>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'emp';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$query = "SELECT * FROM register";

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> #id </td> 
          <td> Username </td> 
          <td> Password </td> 
          <td> Options </td> 
      </tr>';

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row["id"];
            $username = $row["username"];
            $passwd = $row["password"];
          
            echo '<tr> 
                      <td>'.$id.'</td> 
                      <td>'.$username.'</td> 
                      <td>'.$passwd.'</td> 
                      <td> 
                      <a href="./check">Check</a> 
                      <a href="./edit">Edit</a> 
                      <a href="./delete">Delete</a> 
                      
                      </td> 
                   
                  </tr>
                  </table>'
                  ;
        }
     
  

?>
</body>
</html>