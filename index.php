<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
	<style>
		.got {
			background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 10px;

		}
	</style>
<a class = "got" href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
	    <td>Total Paid($)</td>
	     <td>Update</td>
	     <td>Running Total($)</td>

	    







	</tr>
	<?php 	
	$total=0;
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['age']."</td>";
		echo "<td>".$row['email']."</td>";	
	    echo "<td>".$row['totalpaid']."</td>";	



	$sth = $dbConn->query('SELECT SUM(totalpaid) FROM users') ;
$RT = $sth->fetch(PDO::FETCH_ASSOC);

echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
//$sth->bindparam(':RT', $RT);
if(!isset($i)) {
	$i=0;
}   

if($i==0) {
$sk = $RT['SUM(totalpaid)'];
//$sth->bindparam(':RT', $sk);

   
	    echo "<td>".$sk."</td>";
	    echo "<br>";
	    $i = $i + 1;	

}

			
		//$total = $total + $row['totalpaid'];	


	}
	?>
	<?php 
	//echo $total;



//echo $RT('SUM(totalpaid)');

	    	    

	?>

    
	</table>
</body>
</html>