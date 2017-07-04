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
		"<tr class='regionRow'>
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
    $html->find('#propertyData',0)->innertext .= 
		"<tr class='propertyRow'>
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
	header("Location: /");
	
}

if($_POST["addProperty"] ) {
	$Name = $_POST['Name'];
	$Brand = $_POST['Brand'];
	$Phone = $_POST['Phone'];
	$Url = $_POST['Url'];
	$FullService = (int)$_POST['isFullService'];
	$sql = "INSERT INTO Property
				 VALUES (Id, '{$Name}', '{$Brand}', '{$Phone}', '{$Url}', {$FullService})";

		$conn->query($sql);
	  header("Location: /");


}
 //update entries
 if($_POST["updateRegion"] ) {
	$Name = $_POST['Name'];
	$Id = $_POST['Id'];
  $sql = "UPDATE Region
				 SET Name ='{$Name}'
				 WHERE Id = {$Id} ";

	$conn->query($sql);
	header("Location: /");

}

if($_POST["updateProperty"] ) {
	$Name = $_POST['Name'];
	$Brand = $_POST['Brand'];
	$Phone = $_POST['Phone'];
	$Url = $_POST['Url'];
	$Id = $_POST['Id'];
	$FullService = (int)$_POST['isFullService'];
  $sql = "UPDATE Property
				 SET Name ='{$Name}', Brand = '{$Brand}', Phone = '{$Phone}', URL = '{$Url}', Service={$FullService}
				 WHERE Id = {$Id}";


	$conn->query($sql);
	header("Location: /");

}

if($_POST['deleteType'] && $_POST['deleteType']== 'property'){
	$Id = $_POST['idToDelete'];
	$sql = "DELETE FROM Property
					WHERE Id = {$Id}";
	$conn->query($sql);
	header("Location: /");


}

if($_POST['deleteType'] && $_POST['deleteType']== 'region'){
	$Id = $_POST['idToDelete'];
	$sql = "DELETE FROM Region
					WHERE Id = {$Id}";

	$conn->query($sql);
	header("Location: /");
}

echo $html;


$conn->close();
?>
