

<a class="btn btn-primary" href="?action=add">Add user</a> <br><br>
<table class="table table-bordered table-hover table-striped">
<thead>
   <tr>
      <th>id</th> 
      <th>username</th>
      <th>email</th>
      <th>address</th>
      <th>gender</th>
      <th>priv</th>
      <th>Controlls</th>
	</tr>
</thead>
    <tbody>

	<?php 
    
    include "functions/connect.php";
    $selectUser = "SELECT * FROM users";
    $query = $conn -> query($selectUser);
    $id = 0 ;
    foreach($query as $user){
    	
	?>
	<tr>
	<td><?= ++$id ?></td>
	<td><?= $user['name'] ?></td>
	<td><?=  $user['email'] ?></td>
	<td><?= $user['address'] ?></td>
	<td><?php
if($user['gender'] == 0 ) {echo "Male";
} else {
echo "Female";
}
?></td>
<td><?= 
$user['priv'] == 0 ? 'Admin' : 'User'?></td>
<td>
<a class="btn btn-primary" href="?action=edit&id=<?= $user['id'] ?>">Edit</a>
<!-- modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?= $user['id'] ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       are you sure you want to delete user : <?= $user['name'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="functions/delUser.php?id=<?= $user['id'] ?>" class="btn btn-danger">confirm</a>
      </div>
    </div>
  </div>
</div>
</td>
</tr>

	<?php   }   ?>
</tbody>
</table>