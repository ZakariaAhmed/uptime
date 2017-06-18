<?php include 'sharedViews/head.php'; ?>

<body>
<?php include 'sharedViews/navbar.php'; ?>

<link rel="stylesheet" type="text/css" href="extras/css/app.css">
<script src='indexapp.js'></script>
<main>
	<div class="container">
		<div class="row">
		<div class="input-group">
  			<span class="input-group-addon glyphicon glyphicon-search" id="sizing-addon2"></span>
  			<input type="text" class="form-control" placeholder="Search for Customers" aria-describedby="sizing-addon2" id="myInput" onkeyup="searchFunction()">
		</div>		
	<br />
	<!-- Add Customer Modal -->
	<div class="center"><button id="cButton" data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Add Customer</button></div>
	<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Customer</h3>
		</div>
		<div class="modal-body">
			<!-- Add Customer Content -->
			<form id="customerForm" method="post">
  				<div class="form-group">
    			<input type="text" class="form-control" name="customerName" id="customerName" placeholder="Example Audi">
    			<br />
 				</div>
 				<input type="Submit" class="btn btn-success" value="Submit" id="matbutton" data-dismiss="modal"/>
			</form>
			
			</div>
		<div class="modal-footer">
		
		</div>
	</div>
  </div>
</div>

	<!-- Data Table Search -->
		<table class="table" id="myTable" data-link="row">
		<thead class="thead-inverse">
			<tr class="header">
				<th>Customers</th>
				<th>URL's</th>
				<th>Statuscode 200s</th>
				<th>Statuscode 404s</th>
			</tr>
		</thead>
		<tbody id="status_text" >
		<?php 
		include 'Database/config.php';
			$sql = "SELECT customerId, customerName FROM customers";
			$amountOfUrls = 0;
			$amountOf202 = 0;
			$amountOf404 = 0;
			$result = $conn->query($sql);
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
		</tbody>
    	</table>
	<!-- End of Data Table -->
		<!-- End of Row -->		
		</div>
	</div>
</main>
<?php include 'sharedViews/footer.php'; ?>
</body>
</html>