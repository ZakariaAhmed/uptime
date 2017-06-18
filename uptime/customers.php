<?php 
require_once 'Database/config.php';
$ID  = mysqli_real_escape_string($conn, $_GET['ID']);
$sql = "SELECT * FROM Customers where customerId = {$ID}";
$result = mysqli_query($conn, $sql) or die ("Bad query : $sql");
$row = mysqli_fetch_array($result);
// 
$customer = $row['customerName'];
?>

<?php include 'sharedViews/head.php'; ?>
<body>
<?php include 'sharedViews/navbar.php'; ?>	

<main>
<div class="container">
<div class="row">
	<h1 class="text-center"><?php echo $customer; ?></h1>
		<div class="container">
		<div class="row">
		<div class="input-group">
  			<span class="input-group-addon glyphicon glyphicon-search" id="sizing-addon2"></span>
  			<input type="text" class="form-control" placeholder="Search for Customers" aria-describedby="sizing-addon2" id="myInput" onkeyup="searchFunction()">
		</div>		
	<br />
	<!-- Add Customer Modal -->
	<div class="center"><button id="cButton" data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Add URL to <?php echo $customer ?></button></div>
	<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add URL</h3>
		</div>
		<div class="modal-body">
			<!-- Add Customer Content -->
			<form id="myForm" method="post">
  				<div class="form-group">
    			<input type="text" class="form-control" name="customerURL" id="customerURL" placeholder="Example www.audi.dk">
    			<br />

 				 <div class="form-group" id="list">
			    <label for="selected">Update Status Code</label>
			    <select class="form-control" name="cronTimer"></select>
  			</div>		
  			</div>
			<input type="Submit" class="btn btn-success" value="Submit" id="btnSubmit" data-dismiss="modal"/> 
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
				<p id="postData"></p>
				<th><?php echo $customer; ?> URLs</th>
				<th>Statuscode 200</th>
				<th>Statuscode 404</th>
			</tr>
		</thead>
		<tbody id="status_text" >
		<?php 
		include 'Database/config.php';
			$sql = "SELECT customers.customername, urlcustomers.urlLink, urlcustomers.urlId FROM customers LEFT join urlcustomers on customers.customerId = urlcustomers.customerId";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				$url = $row["urlLink"];
				$id = $row["urlId"];
				$urlStatus = $row['urlStatus'];
				$urlRedirect = $row['urlRedirect'];
				echo "<tr>
				<td><a href='autocronurl.php?ID={$id}'>{$url}</a></td>
				<td>{$urlStatus}</td>
				<td>{$urlRedirect}</td>
				</tr>";
			}
			?>
		</tbody>
    	</table>
	<!-- End of Data Table -->
		<!-- End of Row -->		
		</div>
	</div>
</div>
</div>
</main>
<?php include 'sharedViews/footer.php'; ?>
</body>
