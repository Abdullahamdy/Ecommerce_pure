	

<a class="btn btn-primary" href="?action=add">Add product</a> <br><br>

<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>price</th>
			<th>sale</th>
			<th>Image</th>
			<th>category</th>
			<th>controls</th>
		</tr>
	</thead>
	<tbody>
<?php 
	require "functions/connect.php";
	$selPro = "SELECT * FROM products";
	$query = $conn -> query($selPro);
	foreach ($query as $pro){


?>
		<tr>
			<td><?= $pro['id'] ?> </td>
			<td ><?= $pro['name'] ?></td>
			<td><?= $pro['price'] ?></td>
			<td><?= $pro['sale'] ?></td>
			<td><img style="width: 60px;height: 60px;border-radius: 50%" src="images/<?= $pro['img'] ?>" alt=""></td>
			<td><?php

			$cat_id = $pro['cat_id'];
			$selectCat = "SELECT name FROM category WHERE id = '$cat_id' ";
			$query = $conn -> query($selectCat);
			$cat = $query -> fetch_assoc();
			echo $cat['name'];




			 ?></td>
			<td>
				<a class="btn btn-primary" href="">edit</a>
				<a class="btn btn-danger" href="">delete</a>
			</td>
		</tr>
	<?php 	} ?>
	</tbody>
</table>
		
