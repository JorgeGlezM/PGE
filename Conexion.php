<?php
try{
	$conn = new PDO('mysql:host=localhost:3306;dbname=Gestion_Plan_Desarrollo;chartset=gbk',  "root", "root");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "ERROR: " . $e->getMessage();
}

?>