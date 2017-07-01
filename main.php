<?php
require('external/simple_html_dom.php');
$servername = '127.0.0.1';
$username = 'root';
$password = 'root';
$html = file_get_html('index.html');
$conn = new mysqli($servername, $username, $password, 'QuoreTest');
//retrive data
$sql = "SELECT * FROM Region";
$result = $conn->query($sql);


if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
		$html->find('#regionData',0)->innertext .= 
		"<tr>
		<td> {$row['Id']} </td>
		<td> {$row['Name']}</td>
		<td> {$html->find('#optionsBtn',0)} </td>
		</tr>";
  }
}
$sql = "SELECT * FROM Property";
$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["Name"]. "- Brand:" .$row["Brand"]. "- Phone:" . $row["Phone"]. "- Url:" . $row["Url"] . "<br>";
    $html->find('#propertyData',0)->innertext .= 
		"<tr>
		<td> {$row['Id']} </td>
		<td> {$row['Name']}</td>
		<td> {$row['Brand']}</td>
		<td> {$row['Phone']}</td>
		<td> {$row['URL']}</td>
		<td> {$html->find('#optionsBtn',0)} </td>
		</tr>";
  }
}

//create new entries
if($_POST["addRegion"] ) {
	$Name = $_POST['Name'];

  $sql = "INSERT INTO Region
				VALUES (Id, '{$Name}')";

	$conn->query($sql);
	header('Location: '. 'main.php');
}

if($_POST["addProperty"] ) {
	$Name = $_POST['Name'];
	$Brand = $_POST['Brand'];
	$Phone = $_POST['Phone'];
	$Url = $_POST['Url'];

	$sql = "INSERT INTO Property
				 VALUES (Id, '{$Name}', '{$Brand}', '{$Phone}', '{$Url}')";

	$conn->query($sql);
	header('Location: '. 'main.php');
 }
echo $html;


$conn->close();
?>
