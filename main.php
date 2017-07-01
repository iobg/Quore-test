<?php
$servername = '127.0.0.1';
$username = 'root';
$password = 'root';
readFile('index.html');

$conn = new mysqli($servername, $username, $password, 'QuoreTest');
print_r($_POST);
if($_POST["addRegion"] ) {
	$Name = $_POST['Name'];

  $sql = "INSERT INTO Region
				VALUES (Id, '{$Name}')";

	if ($conn->query($sql) === TRUE) {
    echo "Created Succesfully";
	} else {
    echo "Error: " . $conn->error;
	}

  exit();
}

if($_POST["addProperty"] ) {
	$Name = $_POST['Name'];
	$Brand = $_POST['Brand'];
	$Phone = $_POST['Phone'];
	$Url = $_POST['Url'];

	$sql = "INSERT INTO Property
				 VALUES (Id, '{$Name}', '{$Brand}', '{$Phone}', '{$Url}')";

   if ($conn->query($sql) === TRUE) {
    echo "Created Succesfully";
	} else {
    echo "Error: " . $conn->error;
	}
	exit();
 }

$conn->close();
?>
