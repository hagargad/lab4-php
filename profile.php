<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" /> <!-- favicon -->
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
$result = mysqli_query($link,$query);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
echo '<border="1px" style="width:600px; line-height:40px;">
      <tr>
          <td> #id </td>
          <td> Username </td>
          <td> Password </td>
          <td> Options </td>
      </tr>';
      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)) {
            // $id = $row["id"];
            // $username = $row["username"];
            // $passwd = $row["password"];
        
            echo '<tbody>
            
                          <tr>
                        
                              <td>'. $row['id'] . '</td>
                              <td>' . $row['username'] . '</td>
                              <td>' . $row['password'] . '</td>
                              <td>
                              <a href="./check">Check</a>
                              <a href="./edit">Edit</a>
                              <a href="./delete">Delete</a>
        
                              </td>
        
                          </tr>
                          </tbody>'
                        
            ;
        }
        echo '</table>';
      }
else {
    echo "0 results";
}
mysqli_close($link);
?>
</body>
</html>