<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
if(!isset($RT)) {
	$RT=0;

}
//including the database connection file
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$totalpaid = $_POST['totalpaid'];
	




		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)|| empty($totalpaid)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($totalpaid)) {
			echo "<font color='red'>totalpaid field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(name, age, email, totalpaid, RT) VALUES(:name, :age, :email,:totalpaid, :RT)";



		$query = $dbConn->prepare($sql);


		$query->bindparam(':name', $name);
		$query->bindparam(':age', $age);
		$query->bindparam(':email', $email);
		$query->bindparam(':totalpaid', $totalpaid);
		$query->bindparam(':RT',$RT);




		$query->execute();

      


// $sth = $dbConn->prepare("SELECT sum(totalpaid)  FROM users");
// $sth->execute([$RT, $age]);

// print("Fetch all of the remaining rows in the result set:\n");

// $result = $sth->fetchAll();
// print_r( $sth);








		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>