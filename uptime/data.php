<?php 
include 'Database/config.php';


// DO SOME CHECKS, ON USERINPUT AND LOWERCASE, 
//  IF IT ALREADY EXIST IN THE DATABASE, DONT ADD IT

$cName = $_POST['customer_name'];

$sql = "INSERT INTO customers (customerName) VALUES('".$cName."')";

	if (mysqli_query($conn, $sql)) {
          } else {
      }


 	$sqli = "SELECT customerId, customerName FROM customers GROUP BY customerName";
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