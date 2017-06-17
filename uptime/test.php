	<?php  
		include 'Database/config.php';
			
			$sql = "SELECT customerName FROM customers";
			$amountOfUrls = 0;
			$amountOf202 = 0;
			$amountOf404 = 0;
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				
				$url = $row["customerName"];
				echo '<tr>
				<td>'.$url.'</td>
				<td>'.$amountOfUrls.'</td>
				<td>'.$amountOf202.'</td>
				<td>'.$amountOf404.'</td>
				</tr>';
			}
			?>
