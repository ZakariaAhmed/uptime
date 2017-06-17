<?php 
include 'Database/config.php';


// DO SOME CHECKS, ON USERINPUT AND LOWERCASE, 
//  IF IT ALREADY EXIST IN THE DATABASE, DONT ADD IT

$cName = $_POST['customer_name'];

$sql = "INSERT INTO customers (customerName) VALUES('".$cName."')";

	if (mysqli_query($conn, $sql)) {
          } else {
      }


$sql = "SELECT * FROM Customers";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
				$amountOfUrls = 0;
				$amountOf202 = 0;
				$amountOf404 =0;
				$url = $row["customerName"];
				echo '<tr>
				<td>'.$url.'</td>
				<td>'.$amountOfUrls.'</td>
				<td>'.$amountOf202.'</td>
				<td>'.$amountOf404.'</td>
				</tr>';
			}

 ?>