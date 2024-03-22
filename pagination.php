
<?php 
	include 'connection.php';
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM emp LIMIT $start, $limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM emp");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Learn  > Pagination in PHP and MySQL </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container well">
		<h1 class="text-center">Bootstrap Pagination in PHP and MySQL</h1>
		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
				    <li>
				      <a href="pagination.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; Previous</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li><a href="pagination.php?page=<?= $i; ?>"><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li>
				      <a href="pagination.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true">Next &raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
			<div class="text-center" style="margin-top: 20px; " class="col-md-2">
				<form method="post" action="#">
						<select name="limit-records" id="limit-records">
							<option disabled="disabled" selected="selected">---Limit Records---</option>
							<?php foreach([10,100,500,1000,5000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		</div>
		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mob</th>
                    <th>Password</th>
                    <th>Confirm pass</th>
                    <th>Operations</th>
	              	</tr>
	          	</thead>    
	        	<tbody>
	        		<?php foreach($customers as $customer) :  ?>
		        		<tr>
		        			<td><?= $customer['id']; ?></td>
		        			
                            <td><img src=<?= $customer['images']; ?> width='70px' height='70px'/></td>
		        			<td><?= $customer['fname']; ?></td>
		        			<td><?= $customer['lname']; ?></td>
		        			<td><?= $customer['email']; ?></td>
                            <td><?= $customer['mob']; ?></td>
                            <td><?= $customer['pass']; ?></td>
                            <td><?= $customer['cpass']; ?></td>
                            <td><a href='update.php?id=<?= $customer['id']; ?>'>Update</a>
                            <a href='delete.php?id=<?= $customer['id']; ?>'>Delete</a>
           
                            </td>
		        		</tr>
	        		<?php endforeach; ?>
	        	</tbody>
      		</table>

      		
		</div>

<div style="position: fixed; bottom: 10px; right: 10px; color: green;">
        <strong>
            Learn Pagination
        </strong>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	})
</script>
</body>
</html>
