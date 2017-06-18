<?php 
include 'Database/config.php';
/// ADD'S CUSTOMER AND UPDATES DATABASE TABLE

// WE NEED TO DO SOME CHECKS, SANITIZE URLS ON USERINPUT AND LOWERCASE , 
// CHECK IF USERINPUT ALREADY EXIST IN THE DATABASE, ETC...

$cName = $_POST['customerName'];
$sql = "INSERT INTO customers (customerName) VALUES('".$cName."')";

	if (mysqli_query($conn, $sql)) {
          } else {
      }


 	$sqli = "SELECT customerId, customerName FROM customers";
			$amountOfUrls = 0;
			$amountOf202 = 0;
			$amountOf404 = 0;
			$result = $conn->query($sqli);
			while ($row = $result->fetch_assoc()) {
				$url = $row["customerName"];
				$id = $row["customerId"];
				echo "<tr>
				<td><a href='customers.php?ID={$id}'>{$url}</a></td>
				<td>{$amountOfUrls}</td>
				<td>{$amountOf202}</td>
				<td>{$amountOf404}</td>
				</tr>";
			}
 ?>