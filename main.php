<?php
readFile('index.html');
if( $_POST["regionId"] || $_POST["regionName"] ) {
     echo $_POST["regionId"];
     echo $_POST["regionName"];
     exit();
   }
if( $_POST["propertyId"] || $_POST["propertyName"] || $_POST["propertyBrand"] || $_POST["propertyPhone"] || $_POST["propertyUrl"] ) {
     echo $_POST["propertyId"];
     echo $_POST["propertyName"];
     echo $_POST["propertyBrand"];
     echo $_POST["propertyPhone"];
     echo $_POST["propertyUrl"];

     exit();
   }
?>
