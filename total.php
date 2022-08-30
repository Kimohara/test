<?php 
include("connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>insert product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container" >
	<div class="row">
		<div class="col-md-3">
			<a href="insert.php" class="btn btn-success">cheap</a>
			<a href="expensive.php" class="btn btn-success">expensive</a>
			<a href="total.php" class="btn btn-success">total</a>
			<a href="index.html" class="btn btn-success">UI</a>

			</div>
<br><br><br><br>
		<div class="col-md-4" >
		              	<form method="post" action="">
				<div class="form-group">
					<strong > product name</strong>
				<input type="text" name="name" placeholder="product name" class="form-control" style="border-radius: 5px, 5px"><br>
			</div>
			<div class="form-group">
			<strong > product price</strong>
				<input type="text" name="price" class="form-control" placeholder="product price" ><br>
			</div>
				<input type="submit" name="save" value="save">
			</form>
<?php
if(isset($_POST['save'])){
	$sql="INSERT INTO products(name,price) VALUES('".$_POST['name']."','".$_POST['price']."')";
		$query=mysqli_query($conn,$sql);
		if($query){
			echo "registered";
		}
		else{
			echo "not registered";
		}
	}
?>
		</div>
		
		<div class="col-md-5">
       <table class="table table-border">
       	<thead>
         <th>total price</th>

       	</thead>
       	<?php 
       $sql="SELECT sum(price) as total from products";
       $query=mysqli_query($conn,$sql);
       $i=1;
       while($result=mysqli_fetch_array($query)){
       	?>
       	<tbody>
       		
       				<td><?php echo $result['total'];?><td>
       	</tbody>
       	<?php 
        $i++;
    }
       	?>
       </table>
		</div>
	</div>
</div>
</body>
</html>