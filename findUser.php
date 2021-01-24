<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE ssingh59_1;";
if ($conn->query($sql) === TRUE) {
   echo "Using Database ssingh59_1";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['UserId'];
$pwd = $_POST['Password'];
$dob = $_POST['DOB'];
$sql = "SELECT * FROM Users where UserId = $id, Password = $pwd, DOB = $dob;";

$result = $conn->query($sql);
$row = mysql_fetch_row($result);

if($result->num_rows == 1 && $row['AdminId'] != NULL){
 
?>
   <table class="table table-striped">
      <tr>
         <th>UserId</th>
         <th>UserName</th>
         <th>Country</th>
      </tr>
      <tr>
          <td><?php echo $row['UserId']?></td>
          <td><?php echo $row['UserName']?></td>
          <td><?php echo $row['Country']?></td>
      </tr>
    </table>
<?php
}

elseif($row['AdminId'] == NULL){
echo "If you are an admin, use Admin Login!";
}

else {
echo "User account not found!";
echo '<a href="newUser.html">First time user? Register here!</a>';
}
?>


<?php
$conn->close();
?>  

</body>
</html>
